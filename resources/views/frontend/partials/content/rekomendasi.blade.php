<div class="main">
    <div class="cards">
        @foreach ($kos as $item)
        <div class="cards_item">
          <div class="card">
            <a href="{{url('detail-kamar-kos', $item->id)}}" style="text-decoration: none;">
            <div class="card_image"><img src="{{asset('bg_foto/' . $item->bg_foto)}}" style="min-height:200px; max-height:200px">
            </div>
              <div class="card_content" style="margin-top:2%">
                    @if ($item->book == 1)
                      <label class="label label-info" style="font-size:12px;">Bisa Booking</label>
                    @elseif($item->book == 0)
                      <label class="label label-warning" style="font-size:8px;">Belum Bisa Booking</label>
                    @endif
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
                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <h6 style="color:black; font-weight:bold;">@currency($item->harga_kamar) / bulan</h6>
                    </div>
                    <div class="col-lg-6 col-12">
                      <h6 style="color:green; font-weight:bold; float:right">{{$item->provinsi_nama}}</h6>
                    </div>
                  </div>
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
  