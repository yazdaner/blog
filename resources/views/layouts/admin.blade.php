<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('panel/css/main.css')}}">
    {{ $style ?? '' }}
    <!-- Styles -->

</head>
<body>


    <section x-data="toggleSidebar">

        @include('admin.sections.sidebar')

        <section class="main" :class="open || 'active'">

            @include('admin.sections.header')

            <div class="content p-2 p-lg-4">
                <div class="container-fluid">
                    <div class="row gy-4">

                        {{$slot}}

                    </div>
                </div>
            </div>
        </section>
    </section>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- alpine -->
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <script src="{{asset('panel/js/alpineComponent.js')}}"></script>

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

    <script>
        function destroyItem(event,id){
            event.preventDefault();
            Swal.fire({
                title: 'آیا مطمئن هستی؟',
                text: "میخواهید این آیتم را حذف کنید",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذف کن !',
                cancelButtonText: 'خیر'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            })
        }
    </script>

</body>
</html>
