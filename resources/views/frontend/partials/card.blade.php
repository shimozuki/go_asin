{{-- <section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center pb-5 mb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2>Pilih Kamar Favoritmu</h2>
      </div>
    </div>
    <div class="row d-flex">
      @foreach ($kamar as $kamars)
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="" class="block-20 rounded" style="background-image: url({{asset('bg_foto/' .$kamars->bg_foto)}});">
            </a>
            <div class="text p-4">
              <div class="meta mb-2">
                <div><a href="#">April 07, 2020</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="#">{{$kamars->nama_kamar}}</a></h3>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section> --}}

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      @foreach ($kamar as $kamars)
        <div class="col-md-4 col-sm-4 col-12">
          <div class="card shadow">
            <img class="card-img-top" src="{{asset('bg_foto/' .$kamars->bg_foto)}}" alt="Card image cap">
            <div class="card-body">
              <p class="card-text"><a href=" {{$kamars->slug}} ">{{$kamars->nama_kamar}}</a></p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>