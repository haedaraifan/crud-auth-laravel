@extends('layouts.main')

@section('content')
  <div class="w-50 m-auto">
    <h1>Ini halaman extracurricular</h1>
  
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-center" scope="col">#</th>
          <th class="text-center" scope="col">Nama</th>
          <th class="text-center" scope="col">Nama Pembina</th>
          <th class="text-center" scope="col">Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($students as $student)
          <tr>
            <th class="text-center" scope="row">{{ $loop -> iteration }}</th>
            <td class="text-center">{{ $student["nama"] }}</td>
            <td class="text-center">{{ $student["nama_pembina"] }}</td>
            <td class="text-center">{{ $student["deskripsi"] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection