<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas;

class KelasController extends Controller
{
  public function index()
  {
    $kelas = Kelas::paginate(10);
    
      return view('kelas/all', [
          "title" => "kelas",
          "listKelas" => $kelas
      ]);
  }

  public function create()
  {
      return view("kelas/create", [
          "title" => "tambah data kelas"
      ]);
  }

  public function store(Request $request)
  {
      $validateData = $request->validate([
          "nama" => "required|max:100",
      ]);

      $result = Kelas::create($validateData);
      if($result) {
          return redirect("/dashboard/kelas/all")->with("successAdd", "data siswa berhasil ditambahkan!");
      }
  }

  public function destroy(kelas $kelas)
  {
      $result = Kelas::destroy($kelas->id);
      if($result) {
          return redirect("/dashboard/kelas/all")->with("successDelete", "data siswa berhasil dihapus!");
      }
  }

  public function edit(Kelas $kelas)
  {
      return view("kelas/edit", [
          "title" => "edit data kelas",
          "kelas" => $kelas
      ]);
  }

  public function update(Request $request, Kelas $kelas)
  {
      $validateData = $request->validate([
          "nama" => "required|max:100",
      ]);

      $result = kelas::where('id', $kelas->id)->update($validateData);
      if($result) {
          return redirect("/dashboard/kelas/all")->with("successAdd", "data siswa berhasil diubah!");
      }
  }

  public function delete(Request $req, $id)
  {
      $data = Kelas::find($id);
      if($data) {
          $data->delete();
      }

      return redirect("/dashboard/kelas/all")->with("successDelete", "data siswa berhasil dihapus!");
  }
}
