<x-panel-layout>
    <div class="col-12">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}">لیست مجوز ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد مجوز</li>
          </ol>
        </nav>

        <div class="p-0">
            <div class="bg-white p-4 rounded">

                <form action="{{route('admin.permissions.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="FormControlInput1" class="form-label">نام</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="FormControlInput1">
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
                                <input type="text" name="display_name" class="form-control @error('display_name') is-invalid @enderror" id="FormControlInput2">
                                @error('display_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">تایید</button>

                </form>

            </div>
        </div>

</x-panel-layout>
