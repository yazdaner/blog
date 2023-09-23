<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>yazdansite.ir</title>
    <!-- font awesome -->
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

    @include('home.sections.loading')

    @include('home.sections.header')

    {{$slot}}

    @include('home.sections.footer')

    @include('home.sections.whatsup')


    @include('home.sections.search')


    <!-- JQuery -->

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous">
    </script>

    <!-- Script -->

    <script
      defer
      src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
    <script src="{{asset('blog/js/script.js')}}"></script>

    {{$script ?? ''}}

<!-- sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (Session::has('error'))
    <script>
        Swal.fire({
            title: 'خطا !',
            text: '{{session('error')}}',
            icon: 'error',
            confirmButtonText: 'اوکی'
        })
    </script>
@endif
@if (Session::has('success'))
    <script>
        Swal.fire({
            title: 'با موفقیت',
            text: "{{session('success')}}",
            icon: 'success',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif
@if (Session::has('warning'))
    <script>
        Swal.fire({
            title: 'دقت کنید !',
            text: '{{session('warning')}}',
            icon: 'warning',
            confirmButtonText: 'اوکی'
        })
    </script>
@endif
  </body>
</html>
