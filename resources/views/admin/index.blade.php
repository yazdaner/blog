<x-panel-layout>
    <x-slot name="script">
        <!-- chart -->
        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
        <script src="{{asset('panel/js/chart/chart1.js')}}"></script>
        <script src="{{asset('panel/js/chart/chart2.js')}}"></script>
    </x-slot>

    <div class="col-lg-9">
        <!-- Stats -->
        <div class="row g-3">
            <div class="col-6 col-lg-3">
                <div class="bg-white p-3 d-flex align-items-center justify-content-center rounded">
                    <div class="stats-icon bg-purple me-3">
                        <i class="bi bi-eye-fill lh-0"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title fs-7 text-muted">کاربران</h5>
                        <p class="card-text fw-bold mt-2">{{$users_count}}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="bg-white p-3 d-flex align-items-center justify-content-center rounded">
                    <div class="stats-icon bg-blue me-3">
                        <i class="bi bi-person-fill lh-0"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title fs-7 text-muted">پست ها</h5>
                        <p class="card-text fw-bold mt-2">{{$posts_count}}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="bg-white p-3 d-flex align-items-center justify-content-center rounded">
                    <div class="stats-icon bg-green me-3">
                        <i class="bi bi-person-plus-fill lh-0"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title fs-7 text-muted">نظرات</h5>
                        <p class="card-text fw-bold mt-2">{{$comments_count}}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="bg-white p-3 d-flex align-items-center justify-content-center rounded">
                    <div class="stats-icon bg-red me-3">
                        <i class="bi bi-bookmark-dash-fill lh-0"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title fs-7 text-muted">دسته بندی ها</h5>
                        <p class="card-text fw-bold mt-2">{{$categories_count}}</p>
                    </div>
                </div>
            </div>


        </div>

        <!-- Chart -->

        <div class="row w-100 m-0">
            <div class="col-12 bg-white rounded mt-4 p-4">
                <div class="">لورم ایپسوم</div>
                <div class="">
                <div id="chartdiv" style="height: 500px;"></div>
                </div>
            </div>
        </div>

        <!-- Progress & Comments -->

        <div class="row w-100 m-0 g-4">

        <!-- Progress -->
            <div class="col-lg-4 p-0 px-2">
               <div class="bg-white p-4 rounded">
                <div class="mb-4">
                    <h5 class="fw-bold">لورم ایپسوم متن</h5>
                </div>
                <div>
                    <div class="progress">
                        <div class="progress-bar bg-blue" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                    <p class="fs-7 text-muted mt-2">لورم ایپسوم متن ساختگی</p>
                    <hr>
                </div>
                <div>
                    <div class="progress">
                        <div class="progress-bar bg-green" style="width: 33%" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">33%</div>
                    </div>
                    <p class="fs-7 text-muted mt-2">لورم ایپسوم متن ساختگی</p>
                    <hr>
                </div>
                <div>
                    <div class="progress">
                        <div class="progress-bar bg-purple" style="width: 85%" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                    </div>
                    <p class="fs-7 text-muted mt-2">لورم ایپسوم متن ساختگی</p>
                    <hr>
                </div>
                <div>
                    <div class="progress">
                        <div class="progress-bar bg-red" style="width: 77%" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100">77%</div>
                    </div>
                    <p class="fs-7 text-muted mt-2">لورم ایپسوم متن ساختگی</p>
                </div>
               </div>
            </div>

        <!-- Comments -->
            <div class="col-lg-8 p-0">
               <div class="bg-white p-4 rounded">
                <div class="mb-4">
                    <h5 class="fw-bold">آخرین کامنت ها</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>نام کاربری</th>
                                <th>کامنت</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img width="50" class="img-fluid rounded-circle" src="./images/4.jpg">
                                </td>
                                <td class="text-muted">
                                    لورم ایپسوم
                                </td>
                                <td class="text-muted">
                                    لورم ایپسوم متن ساختگی با تولید سادگی
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img width="50" class="img-fluid rounded-circle" src="./images/5.jpg">
                                </td>
                                <td class="text-muted">
                                    لورم ایپسوم
                                </td>
                                <td class="text-muted">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img width="50" class="img-fluid rounded-circle" src="./images/7.jpg">
                                </td>
                                <td class="text-muted">
                                    لورم ایپسوم
                                </td>
                                <td class="text-muted">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت.
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                </div>
            </div>

        </div>


    </div>

    <div class="col-lg-3">

        <!-- Profile -->
        <div class="bg-white p-3 d-flex align-items-center justify-content-lg-center justify-content-start rounded">
            <img width="70" class="img-fluid rounded-circle me-4" src="{{auth()->user()->getUserProfile()}}" alt="">
            <div class="">
                <p class="card-text fw-bold mb-1 fs-5">{{auth()->user()->name}}</p>
                <h5 class="card-title fs-6 text-muted dir-ltr">@ {{auth()->user()->user_name}}</h5>
            </div>
        </div>

        <!-- Users -->

        <div class="bg-white mt-4 p-4 rounded">

            <div class="mb-4">
                <h5 class="fw-bold">لورم ایپسوم متن</h5>
            </div>

            <div class="py-2 d-flex align-items-center justify-content-start rounded">
                <img width="55" class="img-fluid rounded-circle me-4" src="./images/7.jpg" alt="">
                <div class="">
                    <p class="card-text fw-bold mb-1 fs-6">یزدان</p>
                    <h5 class="card-title fs-7 text-muted dir-ltr">@yazdan</h5>
                </div>
            </div>
            <div class="py-2 d-flex align-items-center justify-content-start rounded">
                <img width="55" class="img-fluid rounded-circle me-4" src="./images/7.jpg" alt="">
                <div class="">
                    <p class="card-text fw-bold mb-1 fs-6">یزدان</p>
                    <h5 class="card-title fs-7 text-muted dir-ltr">@yazdan</h5>
                </div>
            </div>
            <div class="py-2 d-flex align-items-center justify-content-start rounded">
                <img width="55" class="img-fluid rounded-circle me-4" src="./images/7.jpg" alt="">
                <div class="">
                    <p class="card-text fw-bold mb-1 fs-6">یزدان</p>
                    <h5 class="card-title fs-7 text-muted dir-ltr">@yazdan</h5>
                </div>
            </div>
            <div class="py-2 d-flex align-items-center justify-content-start rounded">
                <img width="55" class="img-fluid rounded-circle me-4" src="./images/7.jpg" alt="">
                <div class="">
                    <p class="card-text fw-bold mb-1 fs-6">یزدان</p>
                    <h5 class="card-title fs-7 text-muted dir-ltr">@yazdan</h5>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-outline-primary mt-3" type="button">نمایش کاربران</button>
            </div>

        </div>

        <!-- Chart2 -->

        <div class="bg-white mt-4 p-4 rounded">

            <div class="mb-4">
                <h5 class="fw-bold">لورم ایپسوم متن</h5>
            </div>

            <div id="chartdiv2" style="height: 300px;"></div>

        </div>



    </div>
</x-panel-layout>
