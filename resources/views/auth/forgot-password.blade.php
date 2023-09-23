<x-app-layout>
    <section class="login">

        <div class="d-flex my-4">
            <a href="{{route('register')}}"><h2 class="head-line">عضویت</h2></a>
            <a href="{{route('login')}}"><h2 class="head-line">ورود</h2></a>
          </div>
        <div class="container">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="card d-flex align-items-start my-5" style="text-align: right;">
                    <div class="row gy-3">

                        <div class="col-12">
                            <p>رمز عبور خود را فراموش کرده اید؟ مشکلی نیست فقط آدرس ایمیل خود را به ما اطلاع دهید و ما یک لینک بازیابی رمز عبور را برای شما ایمیل می کنیم که به شما امکان می دهد رمز جدیدی را انتخاب کنید.</p>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold">ایمیل :</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror @if(Session::has('status')) is-valid @endif">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                            @if (Session::has('status'))
                                <div class="valid-feedback">
                                    {{Session::get('status')}}
                                </div>
                            @endif
                        </div>

                    <div class="d-flex justify-content-between">
                    <button class="btn btn-primary mt-5" type="submit">ارسال لینک بازیابی رمز عبور</button>

                    </div>
                    </div>
                </div>

            </form>

          </div>

        </div>

    </section>

</x-app-layout>
