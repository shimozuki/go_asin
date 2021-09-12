<?php

namespace App\Http\Controllers\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{DataUser,tanah,fbangunan,fkamar_mandi,fbersama,fparkir,area,fotokamar,provinsi};
use Auth;
use Session;

class TanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tanah = tanah::where('user_id',auth::user()->id)->get();
      return view('pemilik.tanah.index', compact('tanah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $provinsi = provinsi::select('kode','nama')->get();
      // Cek data bank
      if ($this->databank()) {
        Session::flash('error','Data Akun Belum Lengkap !');
        return redirect('/home');
      }
      return view('pemilik.tanah.create', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $foto = $request->file('bg_foto');
      $nama_foto = time()."_".$foto->getClientOriginalName();
      // isi dengan nama folder tempat kemana file diupload
      $tujuan_upload = 'bg_foto';
      $foto->move($tujuan_upload,$nama_foto);

      $slug = \Str::slug($request->nama_tanah) . "-" . \Str::random(6);
      $tanah = new tanah;
      $tanah->id = $request->id;
      $tanah->user_id = auth::id();
      $tanah->slug = $slug;
      $tanah->nama = $request->nama;
      $tanah->luas= $request->luas;
      $tanah->stok = $request->stok;
      $tanah->sisa = $tanah->stok;
      $tanah->harga_sewa = $request->harga_sewa;
      $tanah->ket_lain = $request->ket_lain;
      $tanah->ket_biaya = $request->ket_biaya;
      $tanah->desc = $request->desc;
      $tanah->kategori = $request->kategori;
      $tanah->book = $request->book;
      $tanah->bg_foto = $nama_foto;
      $tanah->provinsi_id = $request->provinsi_id;
      $tanah->save();

      if ($tanah) {
          foreach($request->addmore as $value){
            $fbangunan = new fbangunan;
            $fbangunan->tanah_id = $tanah->id;
            $fbangunan->name = $value['name'];
            $fbangunan->save();
          }
      }

      if ($tanah && $fbangunan) {
          foreach ($request->addkm as $value) {
            $fkamar_mandi = new fkamar_mandi;
            $fkamar_mandi->tanah_id = $tanah->id;
            $fkamar_mandi->name = $value['name'];
            $fkamar_mandi->save();
          }
      }

      if ($tanah && $fbangunan && $fkamar_mandi) {
          foreach ($request->addbersama as $value) {
            $fbersama = new fbersama;
            $fbersama->tanah_id = $tanah->id;
            $fbersama->name = $value['name'];
            $fbersama->save();
          }
      }

      if ($tanah && $fbangunan && $fkamar_mandi && $fbersama) {
          foreach ($request->addparkir as $value) {
            $fparkir = new fparkir;
            $fparkir->tanah_id = $tanah->id;
            $fparkir->name = $value['name'];
            $fparkir->save();
          }
      }

      if ($tanah && $fbangunan && $fkamar_mandi && $fbersama && $fparkir) {
          foreach ($request->addarea as $value) {
            $area = new area;
            $area->tanah_id =  $tanah->id;
            $area->name = $value['name'];
            $area->save();
          }
      }

      if ($tanah&& $fbangunan&& $fkamar_mandi&& $fbersama&& $fparkir&& $area) {
          foreach($request->addfoto as $value) {
            $foto_kamar = $value['foto_kamar'];
            $nama_foto = time()."_".$foto_kamar->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'foto_kamar';
            $foto_kamar->move($tujuan_upload,$nama_foto);

            $foto = new fotokamar;
            $foto->tanah_id = $tanah->id;
            $foto->foto_kamar = $nama_foto;
            $foto->save();
          }
      }

      Session::flash('success','Tanah berhasil ditambah');
      return redirect('pemilik/tanah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $show = tanah::where('slug', $slug)->where('user_id',auth::id())->first();
      return view('pemilik.tanah.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $edit = tanah::where('id', $id)->first();
      // dd($edit);
      $provinsi = provinsi::select('kode','nama')->get();
      return view('pemilik.tanah.edit', compact('edit','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $tanah = Tanah::findOrFail($id);
      $tanah->user_id = auth::id();
      $tanah->nama = $request->nama;
      $tanah->luas = $request->luas;
      $tanah->stok = $request->stok;
      $tanah->sisa = $tanah->stok_kamar;
      $tanah->harga_sewa = $request->harga_sewa;
      $tanah->ket_lain = $request->ket_lain;
      $tanah->ket_biaya = $request->ket_biaya;
      $tanah->desc = $request->desc;
      $tanah->kategori = $request->kategori;
      $tanah->book = $request->book;
      $tanah->provinsi_id = $request->provinsi_id;
      $tanah->save();

       if ($tanah) {
        if ($request->addmore) {
          foreach($request->addmore as $value){
            $fbangunan = new fbangunan;
            $fbangunan->tanah_id = $id;
            $fbangunan->name = $value['name'];
            $fbangunan->save();
          }
        }
      }

      if ($tanah ) {
        if ($request->addkm) {
          foreach ($request->addkm as $value) {
            $fkamar_mandi = new fkamar_mandi;
            $fkamar_mandi->tanah_id = $id;
            $fkamar_mandi->name = $value['name'];
            $fkamar_mandi->save();
          }
        }
      }

      if ($tanah ) {
        if ($request->addbersama) {
          foreach ($request->addbersama as $value) {
            $fbersama = new fbersama;
            $fbersama->tanah_id = $id;
            $fbersama->name = $value['name'];
            $fbersama->save();
          }
        }
      }

      if ($tanah) {
        if ($request->addparkir) {
          foreach ($request->addparkir as $value) {
            $fparkir = new fparkir;
            $fparkir->tanah_id = $id;
            $fparkir->name = $value['name'];
            $fparkir->save();
          }
        }
      }

      if ($tanah) {
        if ($request->addarea) {
          foreach ($request->addarea as $value) {
            $area = new area;
            $area->tanah_id =  $id;
            $area->name = $value['name'];
            $area->save();
          }
        }
      }

      Session::flash('success','tanah Berhasil Di Update !');
      return redirect('pemilik/tanah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tanah=tanah::find($id);
      $tanah->delete();
      return redirect('pemilik/tanah')->with('success','Data deleted successfully');
    }

    // Cek data bank user
    protected function databank()
    {
      $databank = Auth::user()->datauser->nama_bank == NULL && Auth::user()->datauser->nama_pemilik == NULL && Auth::user()->datauser->nomor_rekening == NULL;

      return $databank;
    }
}
