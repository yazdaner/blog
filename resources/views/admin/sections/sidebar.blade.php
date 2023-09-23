<section x-cloak class="sidebar scroller" :class="open || 'inactive'">
    <div class="d-flex align-items-center justify-content-between justify-content-lg-center">
        <h4 class="fw-bold">yazdansite.ir</h4>
        <i class="bi bi-x fs-1 d-lg-none cursor-pointer" @click="toggle"></i>
    </div>
    <div class="mt-4">
        <ul class="list-unstyled p-0">

            <li class="sidebar-item {{ request()->is('admin-panel/dashboard*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('admin.dashboard')}}">
                    <i class="me-2 bi bi-grid-fill"></i>
                    <span>داشبورد</span>
                </a>
            </li>
            @php
                $toggle = request()->is('admin-panel/management/users*') || request()->is('admin-panel/management/roles*') || request()->is('admin-panel/management/permissions*') ;
            @endphp
            <li x-data="{{ $toggle ? '{ open: true }' : 'toggleSubmenu' }}" class="sidebar-item {{ $toggle ? 'active' : '' }}">
                <div @click="toggle" class="sidebar-link">
                    <i class="me-2 bi bi-people-fill"></i>
                    <span>کاربران</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </div>
                <ul x-show="open" x-transition class="submenu list-unstyled mt-1">
                    <li class="submenu-item {{ request()->is('admin-panel/management/users*') ? 'active' : '' }}"><a href="{{route('admin.users.index')}}">لیست کاربران</a></li>
                    <li class="submenu-item {{ request()->is('admin-panel/management/roles*') ? 'active' : ''}}"><a href="{{route('admin.roles.index')}}">نقش ها</a></li>
                    <li class="submenu-item {{ request()->is('admin-panel/management/permissions*') ? 'active' : '' }}"><a href="{{route('admin.permissions.index')}}">مجوز ها</a></li>
                </ul>
            </li>

            <li class="sidebar-item {{ request()->is('admin-panel/management/categories*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('admin.categories.index')}}">
                    <i class="me-2 bi bi-book-half"></i>
                    <span>دسته بندی</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('admin-panel/management/posts*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('admin.posts.index')}}">
                    <i class="me-2 bi bi-file-earmark-post"></i>
                    <span>مقالات</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('admin-panel/management/comments*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('admin.comments.index')}}">
                    <i class="me-2 bi bi-chat-left-text-fill"></i>
                    <span>کامنت ها</span>
                </a>
            </li>


        </ul>
    </div>
</section>
