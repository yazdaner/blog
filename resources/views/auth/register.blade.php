<x-app-layout>
    <section class="login">


        <div class="d-flex my-4">
          <a href=""><h2 class="head-line active">عضویت</h2></a>
          <a href="{{route('login')}}"><h2 class="head-line">ورود</h2></a>
        </div>
           <div class="container">
            <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="card d-flex align-items-start mb-5 align-items-start" style="text-align: right;">
              <div class="row gy-3">

                <div class="col-12">
                    <label class="form-label fw-bold">نام : </label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
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
                <div class="col-12">
                  <label class="form-label fw-bold" for="name">تکرار رمز عبور :</label>
                  <input type="password" class="form-control" name="password_confirmation">
                </div>
                <div class="d-flex justify-content-between">
                <button class="btn btn-primary mt-5" type="submit">عضویت</button>
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
