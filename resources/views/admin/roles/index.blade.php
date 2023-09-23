<x-panel-layout>
    <div class="col-12">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست نقش ها</li>
          </ol>
        </nav>

        <div class="p-0">
          <div class="bg-white p-4 rounded">
           <div class="mb-4 text-end">
              <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="bi bi-funnel-fill"></i>
                  فیلتر
                </button>
                <a href="{{route('admin.roles.create')}}" class="btn btn-primary">
                    ایجاد
                </a>
           </div>
           <div class="table-responsive">
              <table class="table table-hover align-middle">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">نام</th>
                      <th scope="col">نام فارسی</th>
                      <th scope="col">عملیات</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($roles as $key => $role)
                    <tr>
                        <th scope="row">{{$roles->firstItem() + $key}}</th>
                        <td class="text-muted">{{$role->name}}</td>
                        <td class="text-muted">{{$role->display_name}}</td>
                        <td>
                           <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    عملیات
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('admin.roles.show',$role->id)}}">نمایش</a></li>
                                    <li><a class="dropdown-item" href="{{route('admin.roles.edit',$role->id)}}">ویرایش</a></li>
                                    <li>
                                        <a class="dropdown-item" href="" onclick="destroyItem(event,{{$role->id}})">حذف</a>
                                        <form class="d-inline" action="{{route('admin.roles.destroy',$role)}}" method="POST" id="delete-form-{{$role->id}}">
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
                {{$roles->links()}}
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
          <form action="">
            <div class="mb-4">
                <label for="" class="form-label">نام محصول</label>
                <input type="text" name="" id="" class="form-control">
            </div>
            <div class="mb-4">
                <label for="" class="form-label">وضعیت محصول</label>
                <select name="" id="" class="form-select">
                    <option value="">فعال</option>
                    <option value="">غیر فعال</option>
                </select>
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کنسل</button>
          <button type="button" class="btn btn-primary">فیلتر</button>
        </div>
      </div>
    </div>
  </div>

</x-panel-layout>
