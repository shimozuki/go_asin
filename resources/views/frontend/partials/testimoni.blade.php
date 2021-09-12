<section class="ftco-section testimony-section" style="background-image: url('images/bg_2.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-center pb-5 mb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2>Testimony</h2>
      </div>
    </div>
    @foreach ($Testimoni as $testimonis)
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel ftco-owl">
          <div class="item">
            <div class="testimony-wrap py-4">
              <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
              <div class="text">
                <p class="mb-4"></p>
                <div class="d-flex align-items-center">
                  <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                  <div class="pl-3">
                    <p class="name"><b>{{$testimonis->user->name}}</b></p>
                    <span class="position">{{$testimonis->testimoni}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>