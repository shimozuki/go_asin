@extends('layouts.frontend.index')
@section('title')
  Selamat Datang di Pap!Kos
@endsection

@section('hero')
  @include('frontend.partials.hero')
@endsection

@section('item_hero')
  {{-- @include('frontend.partials.item_hero') --}}
@endsection

@section('card')
  @include('frontend.partials.card')
@endsection

@section('faq')
  @include('frontend.partials.faq')
@endsection

@section('testimoni')
  @include('frontend.partials.testimoni')
@endsection