<x-app-layout>
    <section class="post">
        <div class="container-fluid">
            <div class="row">

                <!-- dashboard sidebar -->
                @include('home.sections.dashboard_sidebar')

                <!-- Content -->
                <div class="col-lg-9 mt-5">
                    <div class="tab-content bg-white rounded mt-3 p-md-5 p-3">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel"  style="min-height: 500px;">
                            <div class="myaccount-content">
                                <h3>پست های لایک شده</h3>
                                <hr />
                                <div class="account-details-form">
                                    @foreach ($likes as $like)
                                    <div>

                                        <div class="comment d-flex align-items-start">
                                            <a href="{{route('post.show',$like->id)}}">
                                                <img src="{{$like->getBannerPost()}}"
                                                alt="" class="img-fluid me-4" width="80" height="80">
                                            </a>
                                            <div class="w-100">
                                                <div class="mb-3">
                                                    <span class="fw-bold me-2">برای پوست : </span>
                                                    <span class="fw-bold">{{$like->title}}</span>
                                                </div>

                                                <p class="lh-lg">{{$like->preview}}</p>
                                                <span>{{verta($like->created_at)->format('%d/%B/%Y')}}</span>

                                            </div>

                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    @endforeach
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
