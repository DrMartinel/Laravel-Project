FROM php:8.3-fpm AS base

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd zip pdo_mysql mbstring exif pcntl bcmath

# Install setuptools (this is the fix)
RUN apt-get update && apt-get install -y --no-install-recommends python3-setuptools

# Get composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Clear Cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www

# --- Development Stage ---
FROM base AS development
COPY . /var/www
RUN composer install --optimize-autoloader --no-dev
COPY package*.json ./
WORKDIR /var/www
RUN npm install && npm run build  # Build assets for production
COPY .env .env
EXPOSE 9000
CMD ["php-fpm"]


# --- Production Stage ---
FROM base AS production
COPY . /var/www
RUN composer install --optimize-autoloader --no-dev
COPY package*.json ./
WORKDIR /var/www
RUN npm install && npm run build  # Build assets for production
COPY .env .env
EXPOSE 9000
CMD ["php-fpm"]
