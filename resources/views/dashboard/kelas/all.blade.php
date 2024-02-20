@extends('layouts.main')

@section('content')

<div class="row h-100 p-0">
  @include('layouts.partials.sidebar')

  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Kelas</h1>
      <form class="input-group w-25">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ old('search') }}">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>

    <a type="button" class="btn btn-success mt-1 mb-3" href="/dashboard/kelas/create">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
      </svg>
      Add new data
    </a>

    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="text-center">#</th>
          <th scope="col" class="text-center">Nama</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($listKelas as $kelas)
          <tr>
            <th class="text-center" scope="row">{{ $loop->iteration + ($listKelas->currentPage() - 1) * 10}}</th>
            <td class="text-center">{{ $kelas->nama }}</td>
            <td class="text-center">
              <a type="button" class="btn btn-warning mx-1" href="/dashboard/kelas/edit/{{ $kelas->id }}">Edit</a>

              <a type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $kelas->id }}">Hapus</a>
              <div class="modal fade" id="deleteModal{{ $kelas->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel{{ $kelas->id }}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="deleteModalLabel{{ $kelas->id }}">Konfirmasi Hapus</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p class="text-center">Apakah Anda yakin ingin menghapus data kelas <b>{{ $kelas->nama }}</b>?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <form action="/dashboard/kelas/delete/{{$kelas->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="d-flex justify-content-center">{{ $listKelas->links() }}</div>
  </main>
</div>

@endsection