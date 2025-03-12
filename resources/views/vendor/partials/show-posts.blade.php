<div class="ibox-content forum-post-container">
    @foreach($userItems as $items)
        @php
            if(isset($items->author)) $category = 'book';
            else $category = 'blog';
         @endphp
        <div class="forum-post-info">
            <h4><span class="text-navy"><i class="fa fa-globe"></i> Your {{$category}}</span> -  <span class="text-muted">Free talks</span></h4>
        </div>
        <div class="media">
            <a class="forum-avatar" href="#">
                <img src="frontend_resources/img/a1.jpg" class="img-circle" alt="image">
                <div class="author-info">
                    <strong>Posts:</strong> 542<br/>
                    <strong>Joined:</strong> April 11.2015<br/>
                </div>
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $items->title }}</h4>
                <h4 class="media-heading">{!! $items->content  !!}</h4>
                - Uploaded by {{$items->uploader->name}}
                <br>
                @if(isset($items->author))
                    - Written by {{$items->author->name}}
                @endif
            </div>
            @if($userId == $items->uploader->id)
            <div class="ibox-tools">
                <p></p>
                <a class="collapse-link removeItem" href="{{route("deleteBooksRequest",$items->id)}}">
                    <i class="fa fa-remove"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('editBooks', $items) }}">
                    <i class="fa fa-wrench"></i>
                </a>
            </div>
            @endif
        </div>
    @endforeach
    {{ $userItems->links('pagination::default') }}
</div>
