@foreach ($comments as $comment)

<div x-data="{ open{{$comment->id}}: false }">

    <div class="comment d-flex align-items-start">
        <img src="{{$comment->user->getUserProfile()}}" alt="" class="img-fluid rounded-circle me-4" style="max-width: 80px;">
        <div class="w-100">
            <div class="mb-3">
                <span class="fw-bold me-3">{{$comment->user->name}}</span>
                <span>{{$comment->created_at->diffForHumans()}}</span>
            </div>
            <p class="lh-lg">{{$comment->content}}</p>
            <div class="d-flex align-items-start justify-content-between ">
                <a class="btn btn-primary" onclick="setReplyValue({{$comment->id}},'{{$comment->user->name}}')" href="#response">پاسخ</a>
                @if ($comment->approvedReplies->count() > 0)
                    <button class="btn btn-outline-secondary" x-on:click="open{{$comment->id}} = ! open{{$comment->id}}">نمایش پاسخ ها</button>
                @endif
            </div>
        </div>

    </div>

    @if ($comment->approvedReplies->count() > 0)

        @foreach ($comment->approvedReplies as $reply)

            @include('home.sections.replyComments',['reply'=>$reply])

        @endforeach

    @endif


</div>
<hr class="my-4">

@endforeach
<div class="pagination justify-content-center mt-4">
    {{$comments->links()}}
</div>
