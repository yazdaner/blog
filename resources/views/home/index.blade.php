<x-app-layout>

    <section class="info">
        <div>
            <h1>محمد رضا یزدان پناه</h1>
            <h2>برنامه نویس و طراح سایت</h2>
        </div>
    </section>

    <section class="blogs">
        <h2 class="head-line">مقالات</h2>
        <div class="row container-fluid mt-3 gy-5">
            @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="post-category">
                            <a href="">{{ $post->category->name }}</a>
                        </div>
                        <div class="img-card">
                            <a href="{{ route('post.show', $post->id) }}">
                                <img alt="code" class="card-img-top" src="{{ $post->getBannerPost() }}" />
                            </a>
                        </div>
                        <div class="card-body p-md-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <i class="bi bi-calendar text-danger"></i>
                                    <span>{{ verta($post->created_at)->format('%d %B %Y') }}</span>
                                </div>
                                <div class="">
                                    <button class="bookmark-btn">
                                        <i class="bi bi-bookmark fs-5 @if ($post->is_user_bookmarked) active @endif"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="{{ route('post.show', $post->id) }}">
                                <h4 class="card-title fw-bold my-4 text-dark">
                                    {{ $post->title }}
                                </h4>
                            </a>
                            <p class="card-text text-muted">
                                {{ Str::limit($post->preview, 255, ' ...') }}
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div class="">
                                <a href="">
                                    <img src="{{ $post->user->getUserProfile() }}" alt="user"
                                        class="img-fluid rounded-circle shadow me-1" width="40" />
                                    <span>{{ $post->user->name }}</span>
                                </a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="like me-3 inline-block">
                                    <span class="bookmark-btn">
                                        <i class="bi bi-heart text-danger @if ($post->is_user_liked) active  @endif"></i>
                                    </span>
                                    <span>{{$post->getPostLikeCount()}}</span>
                                </div>
                                <div class="comment">
                                    <i class="bi bi-chat text-danger"></i>
                                    <span>{{ $post->getCommentsCount() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="my-5">
            {{ $posts->links() }}
        </div>
    </section>

</x-app-layout>
