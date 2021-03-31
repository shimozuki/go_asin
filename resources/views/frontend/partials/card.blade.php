<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      @foreach ($kamar as $kamars)
        <div class="col-md-4 col-sm-4 col-12">
          <div class="card shadow">
            <img class="card-img-top" src="{{asset('bg_foto/' .$kamars->bg_foto)}}" alt="Card image cap">
            <div class="card-body">
              <p class="card-text"><a href="{{url('room', $kamars->slug)}}">{{$kamars->nama_kamar}}</a></p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>