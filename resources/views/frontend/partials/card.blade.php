<section class="ftco-section bg-light">
  <div class="container">
    <div class="row mb-5">
      @foreach ($tanah as $tanahs)
      <a href="{{url('room', $tanahs->slug)}}">
        <div class="col-md-4 col-sm-4 col-12">
          <div class="card shadow">
            <img class="card-img-top" src="{{asset('bg_foto/' .$tanahs->bg_foto)}}" alt="Card image cap">
            <div class="card-body">
              <div class="d-flex-justify-content-between">
                <span class="badge badge-light">{{$tanahs->jenis_tanah}}</span>
                <span class="badge badge-info">Tersisa {{$tanahs->sisa_tanah}} tanah</span>
              </div>
              <span class="card-text"><a href="{{url('room', $tanahs->slug)}}" style="color: black;">{{$tanahs->nama_tanah}}</a></span> <br>
              <span style="font-size:13px; color:black"> <i class="fa fa-map-marker-alt"></i> {{$tanahs->provinsi->nama}} </span>
              <div class="d-flex justify-content-between">
                <p style="font-size: 12px; color:black">
                  {{rupiah($tanahs->harga_tanah)}} / Bulan
                </p>
                <p style="font-size: 12px; color:black">Bisa Booking</p>
              </div>

            </div>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>