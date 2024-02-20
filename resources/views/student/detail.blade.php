@extends('layouts.main')

@section('content')
<div class="w-50 m-auto">
  <h2>Detail</h2>
  <div class="form">
    <div class="form-group my-1">
      <label for="">nis</label>
      <input type="text" class="form-control" name="nis" id="nis" value="{{ $student->nis }}" disabled>
    </div>

    <div class="form-group my-1">
      <label for="">nama</label>
      <input type="text" class="form-control" name="nama" id="nama" value="{{ $student->nama }}" disabled>
    </div>

    <div class="form-group my-1">
      <label for="">Tanggal lahir</label>
      <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{ $student->tgl_lahir }}" disabled>
    </div>

    <div class="form-group my-1">
      <label for="">alamat</label>
      <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $student->alamat }}" disabled>
    </div>

    <div class="form-group my-1">
      <label for="">kelas</label>
      <input type="text" class="form-control" name="kelas" id="kelas" value="{{ $student->kelas->nama }}" disabled>
    </div>
  </div>
</div>
@endsection