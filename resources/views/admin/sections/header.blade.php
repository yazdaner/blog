<header class="d-flex align-items-center justify-content-between">
    <div>
        <i class="bi bi-justify fs-3 cursor-pointer toggle-sidebar-icon" @click="toggle"></i>
    </div>
    <div class="d-flex align-items-center">
        <div class="dropdown">
            <div class="cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-red">
                    9
                  </span>
                <i class="bi bi-envelope fs-4">
                </i>
            </div>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"> لورم ایپسوم </a></li>
              <li><a class="dropdown-item" href="#"> لورم ایپسوم </a></li>
              <li><a class="dropdown-item" href="#"> لورم ایپسوم </a></li>
            </ul>
        </div>
        <div class="dropdown  mx-4">
            <div class="cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-bell fs-4"></i>
            </div>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"> لورم ایپسوم </a></li>
              <li><a class="dropdown-item" href="#"> لورم ایپسوم </a></li>
              <li><a class="dropdown-item" href="#"> لورم ایپسوم </a></li>
            </ul>
        </div>
        <div class="dropdown">
            <div class="profile d-flex align-items-center" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img width="45" class="img-fluid rounded-circle me-2" src="./images/7.jpg" alt="">
                <div>
                    <h6 class="fs-6 fw-bold text-gray-600 mb-0">یزدان</h6>
                    <p class="fs-8 text-gray-600 mb-0">سوپر ادمین</p>
                </div>
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="dropdown-item fs-7" href="#">
                        <i class="bi bi-person fs-5 me-1"></i>
                        پروفایل
                    </a>
                </li>
                <li>
                    <a class="dropdown-item fs-7" href="#">
                        <i class="bi bi-gear fs-6 me-1"></i>
                        تنظیمات
                    </a>
                </li>
                <li>
                    <a class="dropdown-item fs-7" href="#">
                        <i class="bi bi-wallet fs-6 me-1"></i>
                        حساب کاربری
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item fs-7" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-left fs-5 me-1"></i>
                        خروج
                    </a>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
