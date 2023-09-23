<x-panel-layout>
    <div class="col-12">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">لیست نقش ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش نقش</li>
          </ol>
        </nav>

        <div class="p-0">
            <div class="bg-white p-4 rounded">

                <form action="{{route('admin.roles.update',$role->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="FormControlInput1" class="form-label">نام</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="FormControlInput1" value="{{$role->name}}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="FormControlInput2" class="form-label">نام فارسی</label>
                                <input type="text" name="display_name" class="form-control @error('display_name') is-invalid @enderror" id="FormControlInput2" value="{{$role->display_name}}">
                                @error('display_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
                                            <input class="form-check-input" type="checkbox" name="{{$permission->name}}" value="{{$permission->name}}" id="permission_{{$permission->id}}" {{ in_array($permission->id,$role->permissions->pluck('id')->toArray()) ? 'checked':''; }}>
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
