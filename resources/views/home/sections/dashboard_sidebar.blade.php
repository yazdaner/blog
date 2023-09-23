<div class="col-lg-3 mt-3">
    <ul class="list-group mt-5">
      <a href="{{route('profile.show')}}">
        <li class="list-group-item align-items-center d-flex {{request()->is('profile') ? 'active' : '' }}">
          <i class="bi bi-person-fill lh-0 me-2 text-primary fs-5"></i>
          پروفایل
        </li>
      </a>
      <a href="{{route('profile.posts-liked')}}">
        <li class="list-group-item align-items-center d-flex {{request()->is('profile/posts-liked') ? 'active' : '' }}">
          <i class="bi bi-heart-fill lh-0 me-2 text-primary fs-5"></i>
          پست های لایک شده
        </li>
      </a>
      <a href="{{route('profile.comments')}}">
        <li class="list-group-item align-items-center d-flex {{request()->is('profile/comments') ? 'active' : '' }}">
          <i class="bi bi-chat-fill lh-0 me-2 text-primary fs-5"></i>
          نظرات
        </li>
      </a>
      <a href="{{route('profile.bookmarks')}}">
        <li class="list-group-item align-items-center d-flex {{request()->is('profile/bookmarks') ? 'active' : '' }}">
          <i
            class="bi bi-bookmark-fill lh-0 me-2 text-primary fs-5"
          ></i>
          پست های ذخیره شده
        </li>
      </a>
      <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <li class="list-group-item align-items-center d-flex">
          <i
            class="bi bi-door-open-fill lh-0 me-2 text-primary fs-5"
          ></i>
          خروج
        </li>
      </a>
      <form method="POST" action="{{ route('logout') }}" id="logout-form">
        @csrf
      </form>
    </ul>
  </div>
