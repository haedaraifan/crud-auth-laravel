@extends('layouts.main')

@section('content')

<div class="row h-100 p-0">
  @include('layouts.partials.sidebar')

  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Student</h1>

      <div class="d-flex justify-content-end align-items-center mb-3">
        <form class="input-group" method="get" action="/dashboard/student/all">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ old('search') }}">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="dropdown ms-2">
          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Filter by Class
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard/student/all">Show All</a></li>
            @foreach ($kelas as $item)
              <li><a class="dropdown-item" href="{{ route('filter_students', $item->id) }}">{{ $item->nama }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>

    </div>
  
    <h1>Ini halaman student</h1>

    <a type="button" class="btn btn-success mt-1 mb-3" href="/dashboard/student/create">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
      </svg>
      Add new data
    </a>


    @if(session()->has("successAdd"))
      <div class="alert alert-success col-lg-12" role="alert">
        {{ session("successAdd") }}
      </div>
    @endif

    @if(session()->has("successDelete"))
      <div class="alert alert-danger col-lg-12" role="alert">
        {{ session("successDelete") }}
      </div>
    @endif

    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="text-center">#</th>
          <th scope="col" class="text-center">NIS</th>
          <th scope="col" class="text-center">Nama</th>
          <th scope="col" class="text-center">Kelas</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($students as $student)
          <tr>
            <th class="text-center"scope="row">{{ $loop->iteration + ($students->currentPage() - 1) * 10}}</th>
            <td class="text-center">{{ $student->nis }}</td>
            <td class="text-center">{{ $student->nama }}</td>
            <td class="text-center">{{ $student->kelas->nama }}</td>
            <td class="text-center">

              <a type="button" class="btn btn-info mx-1" href="/dashboard/student/detail/{{ $student->id }}">Detail</a>
              <a type="button" class="btn btn-warning mx-1" href="/dashboard/student/edit/{{ $student->id }}">Edit</a>

              <a type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $student->id }}">Hapus</a>
              <div class="modal fade" id="deleteModal{{ $student->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel{{ $student->id }}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="deleteModalLabel{{ $student->id }}">Konfirmasi Hapus</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p class="text-center">Apakah Anda yakin ingin menghapus data siswa <b>{{ $student->nama }}</b>?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <form action="/dashboard/student/delete/{{$student->id}}" method="POST">
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

    <div class="d-flex justify-content-center">{{ $students->links() }}</div>
  </main>
</div>

@endsection