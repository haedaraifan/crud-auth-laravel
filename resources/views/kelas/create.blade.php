@extends('layouts.main')

@section('content')

<div class="w-50 m-auto">
  <h1>Tambah data</h1>

  <div class="container">
    <form method="post" action="/dashboard/kelas/add" class="needs-validation mx-auto" novalidate>
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@endsection