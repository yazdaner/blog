<x-panel-layout>
    <div class="col-12">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست مقالات</li>
          </ol>
        </nav>

        <div class="p-0">
          <div class="bg-white p-4 rounded">
           <div class="mb-4 text-end">
              <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="bi bi-funnel-fill"></i>
                  فیلتر
                </button>
                <a href="{{route('admin.posts.create')}}" class="btn btn-primary">
                    ایجاد
                </a>
           </div>
           <div class="table-responsive">
              <table class="table table-hover align-middle">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">عنوان</th>
                      <th scope="col">دسته بندی</th>
                      <th scope="col">نویسنده</th>
                      <th scope="col">تاریخ ایجاد</th>
                      <th scope="col">بنر</th>
                      <th scope="col">عملیات</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($posts as $key => $post)
                    <tr>
                        <th scope="row">{{$posts->firstItem() + $key}}</th>
                        <td class="text-muted">{{$post->title}}</td>
                        <td class="text-muted">{{$post->category->name}}</td>
                        <td class="text-muted">{{$post->user->name}}</td>
                        <td class="text-muted">{{verta($post->created_at)->format('Y/m/d')}}</td>
                        <td class="text-muted"><img  width="80" src="{{asset(env('BANNER_IMAGES_PATH').$post->banner)}}" alt=""></td>

                        <td>
                           <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    عملیات
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('admin.posts.edit',$post->id)}}">ویرایش</a></li>
                                    <li>
                                        <a class="dropdown-item" href="" onclick="destroyItem(event,{{$post->id}})">حذف</a>
                                        <form class="d-inline" action="{{route('admin.posts.destroy',$post)}}" method="POST" id="delete-form-{{$post->id}}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
           </div>
           <div class="pagination justify-content-center mt-4">
                {{$posts->appends(request()->query())->links()}}
           </div>
       </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">فیلتر محصولات</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.posts.index')}}">

            <div class="mb-4">
                <label class="form-label">نام مقاله</label>
                <input type="text" name="search" class="form-control" value="{{request()->search}}">
            </div>
            <div class="mb-4">
                <label for="" class="form-label">وضعیت مقاله</label>
                <select name="" id="" class="form-select">
                    <option value="">فعال</option>
                </select>
            </div>
        </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کنسل</button>
            <button type="submit" class="btn btn-primary">فیلتر</button>
            </div>
        </form>

      </div>
    </div>
  </div>

</x-panel-layout>
