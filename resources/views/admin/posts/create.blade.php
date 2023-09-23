
<x-panel-layout>
    <x-slot name="style">
        <style>
                        .custom-file-input {
                position: relative;
                z-index: 2;
                width: 100%;
                height: calc(1.5em + 0.75rem + 2px);
                margin: 0;
                opacity: 0;
            }


            .custom-file-label {
                position: absolute;
                top: 0;
                right: 0;
                left: 0;
                z-index: 1;
                height: calc(1.5em + 0.75rem + 2px);
                padding: 0.375rem 0.75rem;
                font-weight: 400;
                line-height: 1.5;
                color: #6e707e;
                background-color: #fff;
                border: 1px solid #d1d3e2;
                border-radius: 0.35rem;
            }
            .custom-file-label::after {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                z-index: 3;
                display: block;
                height: calc(1.5em + 0.75rem);
                padding: 0.375rem 0.75rem;
                line-height: 1.5;
                color: #6e707e;
                content: "فایل";
                background-color: #eaecf4;
                border-right: inherit;
                border-radius: 0.35rem 0 0 0.35rem;
            }


            .custom-file {
                position: relative;
                display: inline-block;
                width: 100%;
                height: calc(1.5em + 0.75rem + 2px);
                margin-bottom: 0;
            }

        </style>
    </x-slot>
    <x-slot name="script">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous">
    </script>


    <script>

            // name

            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            // size

            document.addEventListener('DOMContentLoaded', function () {
                    // Query the elements
                    const fileEle = document.getElementById('image');
                    const sizeEle = document.getElementById('size');

                    // Convert the file size to a readable format
                    const formatFileSize = function (bytes) {
                        const sufixes = ['B', 'kB', 'MB', 'GB', 'TB'];
                        const i = Math.floor(Math.log(bytes) / Math.log(1024));
                        return `${(bytes / Math.pow(1024, i)).toFixed(2)} ${sufixes[i]}`;
                    };

                    fileEle.addEventListener('change', function (e) {
                        const files = e.target.files;
                        if (files.length === 0) {
                            // Hide the size element if user doesn't choose any file
                            sizeEle.innerHTML = '';
                            sizeEle.style.display = 'none';
                        } else {
                            // File size in bytes
                            const size = files[0].size;

                            // Convert it to a readable format
                            sizeEle.innerHTML = formatFileSize(size);

                            // Display it
                            sizeEle.style.display = 'block';
                        }
                    });
                });




    </script>


    {{-- CKeditor --}}
    <script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <script>
         CKEDITOR.replace( 'content' ,{
            language : 'fa',
            filebrowserUploadUrl: '{{route("admin.editor-upload",["_token" => csrf_token()])}}',
            filebrowserUploadMethod : 'form'

         });
    </script>




        </x-slot>
    <div class="col-12">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">لیست مقالات</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد مقاله</li>
          </ol>
        </nav>

        <div class="p-0">
            <div class="bg-white p-4 rounded">

                <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">عنوان</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{old('title') ?? ''}}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">دسته بندی</label>
                                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                    <option value="">انتخاب دسته بندی ...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">بنر مقاله</label>
                            <div class="custom-file">
                                <input type="file" name="banner" id="image" class="custom-file-input @error('banner') is-invalid @enderror">
                                <label for="image" class="custom-file-label">انتخاب فایل</label>
                                <div id="size" dir="ltr" class="mt-2"></div>
                                @error('banner')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-3">
                                <label for="preview" class="form-label">متن پیش نمایش</label>
                                    <textarea name="preview" id="preview" rows="5" class="form-control @error('preview') is-invalid @enderror">{{old('preview') ?? ''}}</textarea>
                                    @error('preview')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="my-3">
                            <label for="content" class="form-label">محتوا</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control  @error('content') is-invalid @enderror">{{old('content') ?? ''}}</textarea>
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">تایید</button>

                </form>

            </div>
        </div>

</x-panel-layout>

