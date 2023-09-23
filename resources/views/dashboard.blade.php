<x-app-layout>
    <x-slot name="script">
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src)
                }
            };
        </script>
    </x-slot>
    <section class="post">
        <div class="container-fluid">
            <div class="row">

                <!-- dashboard sidebar -->
                @include('home.sections.dashboard_sidebar')

                <!-- Content -->
                <div class="col-lg-9 mt-5">
                    <div class="tab-content bg-white rounded mt-3 p-md-5 p-3">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>پروفایل</h3>
                                <hr />
                                <div class="account-details-form">
                                    <form action="{{ route('dashboard.update',auth()->user()->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        آپلود تصویر پروفایل : (بر روی تصویر کلیک کنید)
                                        <div class="text-center col-md-12 my-4">
                                            <label for="file" class="cursor-pointer">
                                                <img id="output"
                                                    src="{{auth()->user()->getUserProfile()}}"
                                                    width="120" height="120" class="rounded-circle border" />
                                            </label>
                                            <input accept="image/*" onchange="loadFile(event)" id="file"
                                                name="profile" type="file"
                                                class="d-none  @error('profile') is-invalid @enderror" />
                                            @error('profile')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-input-item">
                                                    <label class="form-label mt-3" for="last-name">
                                                        نام و نام خانوادگی
                                                    </label>
                                                    <input class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ auth()->user()->name }}" type="text"
                                                        id="last-name" />
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="single-input-item col-md-6">
                                                <label class="form-label mt-3"> ایمیل </label>
                                                <input class="form-control" value="{{ auth()->user()->email }}"
                                                    type="text" disabled="" />
                                            </div>
                                            <div class="col-12">
                                                <div class="single-input-item">
                                                    <label class="form-label mt-3">
                                                        نام کاربری
                                                    </label>
                                                    <input class="form-control @error('user_name') is-invalid @enderror"
                                                        name="user_name" value="{{ auth()->user()->user_name }}" type="text"/>
                                                    @error('user_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="single-input-item mt-4">
                                                <button class="btn btn-primary" type="submit">ثبت تغییرات</button>
                                            </div>
                                        </div>
                                    </form>
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
