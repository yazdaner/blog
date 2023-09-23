<x-app-layout>

    <section class="login">
      <div class="container">
        <div class="row mt-5">
          <div class="col-lg-6">
            <div class="contact-info-area mt-5">
              <h2 class="text-white fw-bold">ارتباط با یزدان وب</h2>
              <p class="text-white mb-5">
                در این بخش شما میتوانید راه های ارتباطی را مشاهده کنید
              </p>
              <div class="contact-info-wrap">
                <div class="single-contact-info">
                  <div class="d-flex align-items-end">
                    <i class="bi bi-geo-alt text-white fs-1 me-3"></i>
                    <p class="text-white">لورم متن ساختگی با تولید سادگی</p>
                  </div>
                  <div class="d-flex align-items-end my-2">
                    <i class="bi bi-envelope text-white fs-1 me-3"></i>
                    <p class="text-white">info@gmail.com</p>
                  </div>
                  <div class="d-flex align-items-end">
                    <i class="bi bi-phone text-white fs-1 me-3"></i>
                    <p class="text-white">091200000000 / 091200000000</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <p class="text-start text-white">
              ارسال پیشنهادات , انتقادات و شکایات :
            </p>

            <div class="card m-0 mb-5">
              <div class="row gy-3">
                <div class="col-md-6">
                  <label class="form-label fw-bold" for="name">نام : </label>
                  <input
                    type="text"
                    name="name"
                    class="form-control"
                    id="name"
                    required=""
                  />
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-bold" for="name">ایمیل :</label>
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    required=""
                  />
                </div>

                <div class="mt-3">
                  <label class="form-label fw-bold" for="name">موضوع :</label>
                  <input
                    type="text"
                    class="form-control"
                    name="subject"
                    id="subject"
                    required=""
                  />
                </div>

                <div class="mt-3">
                  <label class="form-label fw-bold" for="name"
                    >متن پیام :
                  </label>
                  <textarea
                    class="form-control"
                    name="message"
                    rows="10"
                    required=""
                  ></textarea>
                </div>

                <div class="d-grid gap-2">
                  <button class="btn btn-primary mt-5" type="submit">
                    ارسال پیام
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</x-app-layout>
