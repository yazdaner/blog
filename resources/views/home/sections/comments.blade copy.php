
<div class="" x-data="{ open: false }">

    <div class="comment d-flex align-items-start">
        <img src="{{$comment->user->getUserProfile()}}" alt="" class="img-fluid rounded-circle me-4" style="max-width: 80px;">
        <div class="">
            <div class="mb-3">
            <span class="fw-bold">{{$comment->user->name}}</span>
            <span>در</span>
            <span>{{$comment->created_at->diffForHumans()}}</span>
            </div>
            <p class="lh-lg">{{$comment->content}}</p>
            <div class="d-flex align-items-start justify-content-between">
                <button class="btn btn-primary">پاسخ</button>
                @if ($comment->replies->count() > 0)
                    <button class="btn btn-outline-secondary" x-on:click="open = ! open">نمایش پاسخ ها</button>
                @endif
            </div>
        </div>

    </div>

    @if ($comment->replies->count() > 0)
        @foreach ($comment->replies as $reply)
            @include('home.sections.comments',['comment'=>$reply])
        @endforeach

    @endif


</div>
<hr class="my-4">
