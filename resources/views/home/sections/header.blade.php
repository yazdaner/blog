<section x-data="toggleSidebar">
    <section x-cloak class="sidebar scroller" :class="open || 'inactive'">
        <div class="d-flex align-items-center justify-content-between justify-content-lg-center">
            <h4 class="fw-bold text-white">yazdansite.ir</h4>
            <i class="bi bi-x fs-1 d-lg-none cursor-pointer text-white" @click="toggle"></i>
        </div>
        <div class="mt-4">
            <div class="search mb-4">
            <form action="{{route('search')}}" id="search">
                <div class="input-group">
                    <input value="{{request()->search ?? ''}}" name="search" class="form-control" type="text" placeholder="جستجو..."/>
                    <i onclick="document.getElementById('search').submit()" class="search-icon fs-6 bi bi-search cursor-pointer"></i>
                </div>
            </form>
            </div>
            <ul class="list-unstyled p-0">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('home') }}">
                        <i class="me-2 bi bi-house"></i>
                        <span>خانه</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="">
                        <i class="me-2 bi bi-file-earmark-person"></i>
                        <span>درباره من</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="">
                        <i class="me-2 bi bi-card-checklist"></i>
                        <span>نمونه کار</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('contact-us') }}">
                        <i class="me-2 bi bi-telephone"></i>
                        <span>تماس با من</span>
                    </a>
                </li>
                <li x-data="toggleSubmenu" class="sidebar-item">
                    <div @click="toggle" class="sidebar-link">
                        <i class="me-2 bi bi-grid-fill"></i>
                        <span>بلاگ</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </div>
                    <ul x-show="open" x-transition class="submenu list-unstyled mt-1">
                        @foreach ($categories as $category)

                            <li x-data="toggleSubmenu" class="sidebar-item ms-3">
                                <div @click="toggle" class="sidebar-link">
                                    <span>{{$category->name}}</span>
                                    <i class="bi bi-chevron-down ms-auto"></i>
                                </div>
                                <ul x-show="open" x-transition class="submenu list-unstyled mt-1">
                                    @foreach ($category->children as $subCategory)
                                        <li class="submenu-item"><a href="{{ route('category.show', $subCategory->slug) }}">{{$subCategory->name}}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                        @endforeach

                    </ul>
                </li>
            </ul>
            <div>
                <div class="socials">
                    <div class="col-12 social-links mt-5">
                        <a href="#"><i class="lh-0 bi bi-twitter"></i></a>
                        <a href="#"><i class="lh-0 bi bi-facebook"></i></a>
                        <a href="#"><i class="lh-0 bi bi-instagram"></i></a>
                        <a href="#"><i class="lh-0 bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <header x-data="{ navShow: false }" @scroll.window="navShow = window.scrollY > 70 ? true : false">
        <nav class="navbar navbar-expand-lg navbar-dark" :class="{ 'scrolled': navShow }">
            <div class="container-fluid">
                <button @click="toggle" class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">خانه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">درباره من</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">نمونه کار</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('contact-us') }}">تماس با من</a>
                        </li>
                        <li class="nav-item dropdown has-megamenu">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                بلاگ
                            </a>
                            <div class="dropdown-menu megamenu" role="menu">
                                <div class="row g-3">

                                    @foreach ($categories as $category)
                                        <div class="col-lg-3 col-6">
                                            <div class="col-megamenu">
                                                <h6 class="title fw-bold">{{ $category->name }}</h6>
                                                <ul class="list-unstyled lh-lg">
                                                    @foreach ($category->children as $subCategory)
                                                        <li><a
                                                                href="{{ route('category.show', $subCategory->slug) }}">{{ $subCategory->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <!-- col-megamenu.// -->
                                        </div>
                                        <!-- end col-3 -->
                                    @endforeach


                                </div>
                            </div>
                            <!-- dropdown-mega-menu.// -->
                        </li>
                    </ul>
                    <div class="auth d-flex align-items-center justify-content-center">
                        <i class="search-icon fs-6 me-4 bi bi-search cursor-pointer" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"></i>
                    </div>
                </div>

                @auth
                    <div class="auth d-flex align-items-center justify-content-center">
                        <a href="{{ route('dashboard') }}">پروفایل</a>
                        <a href=""
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">خروج</a>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="auth d-flex align-items-center justify-content-center">
                        <a href="{{ route('login') }}">ورود</a>
                        <a href="{{ route('register') }}">ثبت نام</a>
                    </div>
                @endauth

            </div>
        </nav>
    </header>
</section>
