<div class="ibox-content forum-post-container">
    @foreach($userItems as $items)
        @php
            if(isset($items->author)) $category = 'Book';
            else $category = 'Blog';

            if(!function_exists('truncateHtml')) {
                function truncateHtml(string $html, int $charLimit): string
                {
                    $plainText = strip_tags($html);
                    $truncatedText = Str::limit($plainText, $charLimit, '...');
                    return $truncatedText;
                }
            }
         @endphp
        <a href="{{route('viewPosts',[$category,$items->id])}}">
            <div class="forum-post-info">
                <h4><span class="text-navy"><i class="fa fa-globe"></i>  Category: {{$category}}</span></h4>
            </div>
            <div class="media">
                <a class="forum-avatar" href="#">
                    <img src="{{asset('img/a1.jpg')}}" class="img-circle" alt="image">
                    <div class="author-info">
                        <strong>Posts:</strong> 542<br/>
                        <strong>Joined:</strong> April 11.2015<br/>
                    </div>
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Title: {{ $items->title }}</h4>
                    <h4 class="media-heading">{!!truncateHtml($items->content, 200, '...')!!}</h4>
                    - Uploaded by {{$items->uploader->name}}
                    <br>
                    @if(isset($items->author))
                        - Written by {{$items->author->name}}
                    @endif
                </div>
                @if($userId == $items->uploader->id)
                    <div class="ibox-tools">
                    @if(isset($items->author))
                        <a class="collapse-link removeItem" href="{{route("deleteBooksRequest",$items->id)}}">
                            <i class="fa fa-remove"></i>
                        </a>
                        <a class="" data-toggle="" href="{{ route('editBooks', $items) }}">
                            <i class="fa fa-wrench"></i>
                        </a>
                    @else
                        <a class="collapse-link removeItem" href="{{route("deleteBlogsRequest",$items->id)}}">
                            <i class="fa fa-remove"></i>
                        </a>
                        <a class="" data-toggle="" href="{{ route('editBlogs', $items) }}">
                            <i class="fa fa-wrench"></i>
                        </a>
                    @endif
                    </div>
                @endif
            </div>
        </a>
    @endforeach
    {{ $userItems->links('pagination::default') }}
</div>
<script>
    Array.from(document.getElementsByClassName('removeItem')).forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Custom confirmation dialog (can be styled)
            const confirmDialog = document.createElement('div');
            confirmDialog.innerHTML = `
                <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                            background: white; border: 2px solid black; padding: 20px;
                            text-align: center; z-index: 1000;">
                    <p>You are about to delete this post, are you sure?</p>
                    <button id="confirmBtn">Yes</button>
                    <button id="cancelBtn">Cancel</button>
                </div>
            `;
            document.body.appendChild(confirmDialog);

            const confirmBtn = confirmDialog.querySelector('#confirmBtn');
            const cancelBtn = confirmDialog.querySelector('#cancelBtn');

            confirmBtn.addEventListener('click', () => {
                window.location.href = this.href;
            });

            cancelBtn.addEventListener('click', () => {
                document.body.removeChild(confirmDialog);
            });
        });
    });
</script>
