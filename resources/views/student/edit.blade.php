@extends('layouts.main')

@section('content')

<div class="w-50 m-auto">
  <h1>Edit data</h1>

  <div class="container">
    <form method="post" action="/dashboard/student/update/{{ $student->id }}" class="needs-validation mx-auto" novalidate>
      @csrf
      <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="number" class="form-control" id="nis" name="nis" value="{{ old('nis', $student->nis) }}" required>
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $student->nama) }}" required>
      </div>
      <div class="mb-3">
        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $student->tgl_lahir) }}" required>
      </div>
      <div class="mb-3">
        <label for="kelas_id" class="form-label">Kelas</label>
        <select name="kelas_id" class="form-select" id="">
          @foreach ($kelas as $_kelas)
            <option value="{{ $_kelas->id }}" {{ $_kelas->id == $student->kelas_id ? 'selected' : '' }}>
              {{ $_kelas->nama }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $student->alamat) }}" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@endsection