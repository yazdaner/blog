<x-app-layout>
    <section class="login">


        <div class="d-flex my-4">
          <a href="{{route('register')}}"><h2 class="head-line">عضویت</h2></a>
          <a href=""><h2 class="head-line active">ورود</h2></a>
        </div>
        <div class="container">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="card d-flex align-items-start mb-5" style="text-align: right;">
                    <div class="row gy-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">ایمیل :</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">رمز عبور :</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    <div class="d-flex justify-content-between mt-5">
                        <div>
                        <input type="checkbox" class="form-check-input me-2" name="remember" id="remember">
                        <label class="form-check-label" for="remember"> مرا بخاطر بسپار </label>
                        </div>

                        @if (Route::has('password.request'))
                        <a  href="{{ route('password.request') }}">فراموشی رمز عبور !</a>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between">
                    <button class="btn btn-primary mt-5" type="submit">ورود</button>
                    <button class="btn btn-danger mt-5" type="submit">
                        <i class="bi bi-google"></i>
                        ایجاد اکانت با گوگل
                    </button>
                    </div>
                    </div>
                </div>

            </form>

          </div>

        </div>

    </section>

</x-app-layout>
