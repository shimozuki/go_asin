@extends('layouts.frontend.index')
@section('title')
  Selamat Datang di Pap!Kos
@endsection

@section('hero')
  @include('frontend.partials.hero')
@endsection

@section('card')
  @if ($counttanah > 0)
    @include('frontend.partials.card')
  @else
    <img src="{{asset('frontend/images/empty.png')}}" alt="Data Kos Kosong" style="height: 300px; display:block; margin-left:auto; margin-right:auto; margin-top:5%">
    <p style="text-align: center">Data tanah masih kosong !</p>
  @endif
  @include('frontend.partials.card-provinsi')
@endsection

@section('faq')
  {{-- @include('frontend.partials.faq') --}}
@endsection

@section('testimoni')
  @include('frontend.partials.testimoni')
@endsection