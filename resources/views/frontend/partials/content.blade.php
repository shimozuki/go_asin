<div class="container">
    <!-- begin Rekomendasi -->
    <div class="row">
        <div class="col-md-2" style="margin-bottom:1%">
            <label style="color:black; font-weight:bold; font-size:14px;">Cari Kategori</label>
            <div class="row" style="margin-left:0%">
                <button class="btn btn-info btn-sm">Kost</button>
                <button class="btn btn-default btn-sm">Apartemen</button>
            </div>
        </div>

        <div class="col-md-3" style="margin-bottom:1%">
            <label style="color:black; font-weight:bold; font-size:14px;">Tipe Kost</label>
            <select name="" class="form-control">
                <option value="">Semua</option>
                <option value="">Khusus Putra</option>
                <option value="">Khusus Putri</option>
                <option value="">Putra dan Campur</option>
                <option value="">Putri dan Campur</option>
                <option value="">Campur</option>
            </select>
        </div>

        <div class="col-md-3" style="margin-bottom:1%">
            <label style="color:black; font-weight:bold; font-size:14px;">Urut Berdasarkan</label>
            <select name="" class="form-control">
                <option value="">Rekomendasi</option>
                <option value="">Harga Termurah</option>
                <option value="">Harga Tertinggi</option>
                <option value="">Update Terbaru</option>
            </select>
        </div>

        <div class="col-md-4" style="margin-bottom:1%">
            <label style="color:black; font-weight:bold; font-size:14px;">Rentan harga</label>
            <div class="row">
                <div class="col-md-5">
                    <input type="number" name="" placeholder="RP. 0" class="form-control">
                </div>
                <div class="col-md-5">
                    <input type="number" name="" placeholder="Rp. 10.000.000" class="form-control">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary btn-sm">Set</button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @if ($kos->count() < 1)
        <div class="main">
            <div class="card">
            <h3 class="text-center">Data Kosan Masih Kosong !</h3>
            </div>
        </div>
    @else
        @include('frontend.partials.content.rekomendasi')
    @endif
    <!-- end Rekomendasi -->

    <!-- begin panel-forum -->
    <div class="panel panel-forum promo">
        <div class="panel-heading">
            <h4 class="panel-title" style="font-weight:bold; font-size:15px">
                Promo
            </h4>
        </div>
    </div>
    @include('frontend.partials.content.promo')
    <!-- end panel-forum -->

    <!-- begin panel-forum -->
    <div class="panel panel-forum testimoni">
        <div class="panel-heading">
            <h4 class="panel-title" style="font-weight:bold; font-size:15px">
                Testimoni
            </h4>
        </div>
    </div>
    @include('frontend.partials.content.testimoni')
    <!-- end panel-forum -->
</div>