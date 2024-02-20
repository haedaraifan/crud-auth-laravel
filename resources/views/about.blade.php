@extends('layouts.main')

@section('content')
  <div class="w-50 m-auto">
    <h1>About</h1>
    <img src="{{ $foto }}" alt="">
    <h3>{{ auth()->user()->name ?? "guest" }}</h3>
  </div>
@endsection