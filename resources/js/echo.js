import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

const reverbAppKey = import.meta.env.VITE_REVERB_APP_KEY;
const reverbHost = import.meta.env.VITE_REVERB_HOST;
const reverbPort = import.meta.env.VITE_REVERB_PORT ?? 80;
const reverbScheme = import.meta.env.VITE_REVERB_SCHEME ?? 'http';

if (!reverbAppKey || !reverbHost) {
    console.error('Reverb environment variables (VITE_REVERB_APP_KEY, VITE_REVERB_HOST) are missing!');
} else {
        // Add these lines just before window.Echo = new Echo({...
    console.log("Echo Config - Key:", reverbAppKey);
    console.log("Echo Config - Host:", reverbHost);
    console.log("Echo Config - Port:", reverbPort);
    console.log("Echo Config - Scheme:", reverbScheme);
    console.log("Echo Config - forceTLS:", reverbScheme === 'https');
    window.Echo = new Echo({
        broadcaster: 'reverb',
        key: reverbAppKey,
        wsHost: reverbHost,
        wsPort: reverbPort,
        wssPort: reverbPort,
        forceTLS: reverbScheme === 'https',
        enabledTransports: ['ws', 'wss'],
    });
}
