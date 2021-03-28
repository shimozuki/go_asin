@extends('layouts.backend.app')
@section('title','Profile')
@section('content')
@if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@elseif($message = Session::get('error'))
  <div class="alert alert-danger alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif
<div class="content-body">
  <!-- account setting page start -->
  <section id="page-account-settings">
    <div class="row">
      <!-- left menu section -->
      <div class="col-md-3 mb-2 mb-md-0">
          <ul class="nav nav-pills flex-column mt-md-0 mt-1">
              <li class="nav-item">
                  <a class="nav-link d-flex py-75 active" id="payment" data-toggle="pill" href="#data-payment" aria-expanded="true">
                      <i class="feather icon-credit-card mr-50 font-medium-3"></i>
                      Payment
                  </a>
              </li>
          </ul>
      </div>
      <!-- right content section -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="data-payment" aria-labelledby="payment" aria-expanded="true">
                  <form action="{{url('pemilik/payment-profile', Auth::id())}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <div class="controls">
                            <label for="Nama Bank">Nama Bank</label>
                            <select name="nama_bank" class="form-control">
                              <option> Pilih Bank</option>
                              <option value="BNI" {{Auth::user()->datauser->nama_bank == 'BNI' ? 'selected' : ''}} >BNI</option>
                              <option value="BRI" {{Auth::user()->datauser->nama_bank == 'BRI' ? 'selected' : ''}}>BRI</option>
                              <option value="BCA" {{Auth::user()->datauser->nama_bank == 'BCA' ? 'selected' : ''}}>BCA</option>
                              <option value="MANDIRI" {{Auth::user()->datauser->nama_bank == 'MANDIRI' ? 'selected' : ''}}>MANDIRI</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-group">
                          <div class="controls">
                            <label for="No Rekening">No. Rekening</label>
                            <input type="number" name="nomor_rekening" value="{{Auth::user()->datauser->nomor_rekening}}" class="form-control" placeholder="Nomor Rekening">
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-group">
                          <div class="controls">
                            <label for="Nama Pemilik">Nama Pemilik</label>
                            <input type="text" name="nama_pemilik" value="{{Auth::user()->datauser->nama_pemilik}}" class="form-control" placeholder="Nama Pemilik">
                          </div>
                        </div>
                      </div>

                      <div class="col-12 d-flex flex-sm-row flex-column justify-content-start">
                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save changes</button>
                        <a href="/home" class="btn btn-outline-warning">Cancel</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- account setting page end -->
</div>
@endsection