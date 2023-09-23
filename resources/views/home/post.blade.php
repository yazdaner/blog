<x-app-layout>

    <section class="post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="content-post bg-white mt-5 p-md-5 p-3 py-5">

                        <div class="image-post">
                            <div class="post-category">
                                <a href="">{{ $post->category->name }}</a>
                            </div>
                            <img class="img-fluid" src="{{ $post->getBannerPost() }}" alt=""
                                style="max-height: 450px ; min-width:100%;">
                        </div>
                        <div class="post-datails my-5 d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-md-block d-none">
                                    <i class="bi bi-calendar text-danger"></i>
                                    <span>{{ verta($post->created_at)->format('%d %B %Y') }}</span>
                                </div>
                                <div class="mx-4">
                                    <button class="bookmark-btn like-btn p-0" @auth onclick="likePost()" @endauth>
                                        <i
                                            class="bi text-danger bi-heart @if ($post->is_user_liked) active @endif"></i>
                                        <span id="like-count">{{ $post->getPostLikeCount() }}</span>
                                    </button>
                                </div>
                                <div>
                                    <a href="#response"><i class="bi bi-chat text-danger"></i></a>
                                    <span>{{ $comments_count }}</span>
                                </div>
                            </div>
                            <div class="">
                                <button class="bookmark-btn bookmark-click" onclick="bookmarkPost()"><i class="bi bi-bookmark fs-5 @if ($post->is_user_bookmarked) active @endif"></i></button>
                            </div>
                        </div>

                        <div class="main-content-post">

                            <div class="text">
                                <div class="">
                                    {!! $post->content !!}

                                </div>
                            </div>

                            <hr class="my-5">
                            <div class="share-post d-flex align-items-center">
                                <div class="">
                                    <h3 class="fw-bold mb-0">انتشار مقاله : </h3>
                                </div>
                                <div class="social-share ms-5">
                                    <a href="#"><i class="lh-0 bi bi-twitter"></i></a>
                                    <a href="#"><i class="lh-0 bi bi-facebook"></i></a>
                                    <a href="#"><i class="lh-0 bi bi-instagram"></i></a>
                                    <a href="#"><i class="lh-0 bi bi-linkedin"></i></a>
                                </div>

                            </div>
                            <div class="tags mt-5 d-flex align-items-center">
                                <i class="bi bi-tag text-danger fs-4 lh-0 me-2"></i>
                                <div class="">
                                    <a href="">بازاریابی</a>,
                                    <a href="">بازاریابی</a>,
                                    <a href="">بازاریابی</a>,
                                    <a href="">بازاریابی</a>,
                                    <a href="">بازاریابی</a>,
                                    <a href="">بازاریابی</a>,
                                    <a href="">بازاریابی</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="content-post bg-white mt-5 p-md-5 p-3 py-4" id="response">
                        <h4 class="fw-bold">{{ $comments_count }} نظر</h4>
                        <hr>


                        @auth
                            <div class="mb-5">
                                <div class="d-flex align-items-start justify-content-between">

                                    <p class="fw-bold fs-5">نوشتن دیدگاه : </p>
                                    <p class="fw-bold text-danger" id="userNameReply"></p>
                                </div>
                                <form action="{{ route('comment.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="hidden" name="comment_id" value="" id="reply_id">
                                    <textarea name="content" class="form-control my-4" rows="5" placeholder="نظر"></textarea>
                                    <button class="btn btn-primary">ارسال</button>
                                    <button class="btn btn-danger"
                                        onclick="event.preventDefault(); setNull()">انصراف</button>
                                </form>
                                <hr class="my-4">

                            </div>
                        @else
                            <div class="alert alert-secondary" role="alert">
                                برای ارسال نظر لطفا <a href="{{ route('login') }}">وارد سایت</a> شوید !
                            </div>
                        @endauth

                        <div class="comments">
                            @include('home.sections.comments')
                        </div>


                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="info-post bg-white mt-5">
                        <p class="text-muted">گردآوری و تالیف : </p>

                        <div class="d-flex align-items-center justify-content-start">
                            <div class="me-3">
                                <img src="{{ $post->user->getUserProfile() }}" alt=""
                                    class="img-fluid rounded-circle" style="max-width: 80px;">
                            </div>
                            <div class="">
                                <h5 class="fw-bold">{{ $post->user->name }}</h5>
                                <p>{{ $post->user->getUserRole('display_name') }}</p>
                            </div>
                        </div>
                        <hr>
                        <span class="text-muted">
                            <i class="bi bi-calendar"></i>
                            تاریخ انتشار :
                        </span>
                        <span>{{ verta($post->created_at)->format('%d %B %Y') }}</span>

                    </div>
                </div>
            </div>
    </section>
    <x-slot name="script">
        <script>
            function setReplyValue(id, userName) {
                console.log(userName);
                document.getElementById('reply_id').value = id;
                document.getElementById('userNameReply').innerHTML = 'پاسخ به کاربر : ' + userName;
            }

            function setNull() {
                document.getElementById('reply_id').value = '';
                document.getElementById('userNameReply').innerHTML = '';
            }

            @auth

            function likePost() {

                fetch('{{ route('like.store', $post->slug) }}', {
                    method: 'post',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    }
                }).then(() => {
                    $('.like-btn').children('.bi-heart').toggleClass('active');
                })
            }

            function bookmarkPost() {

                fetch('{{ route("bookmark.store", $post->slug) }}', {
                    method: 'post',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    }
                }).then(() => {
                    $('.bookmark-click').children('.bi-bookmark').toggleClass('active');
                })
            }
            @endauth
        </script>
    </x-slot>

</x-app-layout>
