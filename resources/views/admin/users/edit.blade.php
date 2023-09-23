<x-panel-layout>
    <div class="col-12">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">لیست کاربر ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش کاربر</li>
          </ol>
        </nav>

        <div class="p-0">
            <div class="bg-white p-4 rounded">

                <form action="{{route('admin.users.update',$user->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">نام</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">نقش</label>
                                <select name="role" class="form-select">
                                    <option value="0">کاربر عادی</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}" {{in_array($role->id,$user->roles->pluck('id')->toArray()) ? 'selected' : ''}}>{{$role->display_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p>
                            <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                             مجوز های دسترسی
                            </a>
                        </p>
                          <div class="collapse mb-3 show" id="collapseExample">
                            <div class="card card-body">
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="form-check col-md-3">
                                            <input class="form-check-input" type="checkbox" name="{{$permission->name}}" value="{{$permission->name}}" id="permission_{{$permission->id}}" {{in_array($permission->id,$user->permissions->pluck('id')->toArray())?'checked':''}}>
                                            <label class="form-check-label" for="permission_{{$permission->id}}">
                                            {{$permission->display_name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                          </div>
                    </div>
                    <button type="submit" class="btn btn-primary">تایید</button>

                </form>

            </div>
        </div>

</x-panel-layout>
