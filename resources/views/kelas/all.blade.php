@extends('layouts.main')

@section('content')
<div class="w-50 m-auto">
  <h1>Ini halaman kelas</h1>

  @auth
  <a type="button" class="btn btn-success mt-1 mb-3" href="/kelas/create">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
    </svg>
    Add new data
  </a>
  @else
  @endauth

  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="text-center">#</th>
        <th scope="col" class="text-center">Nama</th>
      </tr>
    </thead>
    <tbody>
      @foreach($listKelas as $kelas)
        <tr>
          <th class="text-center" scope="row">{{ $loop->iteration + ($listKelas->currentPage() - 1) * 10}}</th>
          <td class="text-center">{{ $kelas->nama }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="d-flex justify-content-center">{{ $listKelas->links() }}</div>
</div>
@endsection