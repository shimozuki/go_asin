<div class="main">
    <div class="cards">
        @foreach ($kos as $item)
        <div class="cards_item">
          <div class="card">
            <a href="{{url('detail-kamar-kos', $item->id)}}" style="text-decoration: none;">
            <div class="card_image"><img src="{{asset('home/img/kos/sample.jpg')}}">
            </div>
              <div class="card_content" style="margin-top:2%">
                  <label class="label label-info" style="font-size:12px;">Bisa Booking</label>
                    @if ($item->jenis_kamar == "Putra")
                        <span style="color:black">Kost {{$item->jenis_kamar}}</span>
                    @elseif($item->jenis_kamar == "Putri")
                        <span style="color:red">Kost {{$item->jenis_kamar}}</span>
                    @elseif($item->jenis_kamar == "Campur")
                        <span style="color:purple">Kost {{$item->jenis_kamar}}</span>
                    @endif
                  <span style="float:right; color:darkgoldenrod; font-size:12px; font-weight:bold">
                      Kamar Tersedia {{$item->sisa_kamar}}
                  </span>
                  <h6 style="color:black">@currency($item->harga_kamar)</h6>
                  <h5 style="color:black">{{$item->nama_kamar}}</h5>
                  <h6>Diperbarui {{$item->updated_at->format('d F Y')}}</h6>
                </div>
            </a>
          </div>
        </div>
        @endforeach
        <div class="col-md-12 text-center" style="margin-bottom:2%">
          @if ($kos->count() > 6)
          <button type="submit" class="btn btn-default btn-sm">Lihat Semua</button>
          @endif
        </div>
    </div>
  </div>
  