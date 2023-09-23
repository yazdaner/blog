<div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5">
        <div class="modal-content">
            <p class="text-white text-center fw-bold mb-4">
                برای بستن ESC را بزنید
            </p>
            <form action="{{route('search')}}" id="search">
                <div class="input-group">
                    <input value="{{request()->search ?? ''}}" class="form-control" type="text" name="search" placeholder="چیزی برای جستجو بنویسید..." />
                    <i onclick="document.getElementById('search').submit()" class="search-icon fs-6 bi bi-search cursor-pointer" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"></i>
                </div>
            </form>

        </div>
    </div>
</div>
