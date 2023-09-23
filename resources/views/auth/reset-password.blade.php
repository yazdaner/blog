<x-app-layout>
    <section class="login">

        <div class="d-flex my-4">
          </div>
        <div class="container">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="card d-flex align-items-start my-5" style="text-align: right;">
                    <div class="row gy-3">

                        <div class="col-12">
                            <label class="form-label fw-bold">ایمیل :</label>
                            <input value="{{old('email', $request->email)}}" type="email" name="email" class="form-control @error('email') is-invalid @enderror">
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
                    <button class="btn btn-primary mt-5" type="submit">بازیابی رمز عبور</button>

                    </div>
                    </div>
                </div>

            </form>

          </div>

        </div>

    </section>

</x-app-layout>
