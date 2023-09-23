<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
  />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-+4j30LffJ4tgIMrq9CwHvn0NjEvmuDCOfk6Rpg2xg7zgOxWWtLtozDEEVvBPgHqE"
    crossorigin="anonymous"
  />
  <link href="{{asset('blog/css/style.css')}}" rel="stylesheet" />
</head>
<body>
    <section class="login" style="height: 100vh">


        <div class="d-flex my-5">

        </div>
        <div class="container">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="card d-flex align-items-start mb-5" style="text-align: right;">
                    <div class="row gy-3">
                    <div class="col-12">
                        <p>از ثبت نام شما سپاسگزاریم! قبل از شروع، آیا می توانید آدرس ایمیل خود را با کلیک بر روی لینکی که برای شما فرستادیم، تأیید کنید؟ اگر ایمیل را دریافت نکردید ، ما با کمال میل ایمیل دیگری را برای شما ارسال خواهیم کرد.</p>
                    </div>
                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 fw-bold text-sm text-success">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                    @endif
                    <div class="d-flex justify-content-between">
                    <button class="btn btn-primary mt-5" type="submit">ارسال دوباره تایید ایمیل</button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger mt-5">خروج</button>
                    </form>
                    </div>
                    </div>
                </div>


          </div>

        </div>

    </section>
</body>
</html>



