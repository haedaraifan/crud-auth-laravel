<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Kelas;

class StudentsController extends Controller
{
    public function index(Request $req)
    {
        $search = $req->search;
        $studentsQuery = Student::query();

        if($search) {
            $studentsQuery->where(function($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                      ->orWhere('nis', 'like', '%' . $search . '%')
                      ->orWhere('alamat', 'like', '%' . $search . '%');
            });
        }

        $students = $studentsQuery->paginate(10);

        return view('student/all', [
            "title" => "student",
            "students" => $students,
            "kelas" => Kelas::all()
        ]);
    }

    public function filter($kelas_id)
    {
        $result = Student::where('kelas_id', $kelas_id)->paginate(10);

        if (request()->route()->named('filter')) {
            return view('student.all', [
                "title" => "students",
                "students" => $result,
                "kelas" => Kelas::all()
            ]);
        }
    }

    public function show($student)
    {
        return view('student/detail', [
            "title" => "detail",
            "student" => Student::find($student)
        ]);
    }

    public function create()
    {
        return view("student/create", [
            "title" => "tambah data siswa",
            "kelas" => Kelas::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "nis" => "required|max:11",
            "nama" => "required|max:100",
            "kelas_id" => "required|max:255",
            "tgl_lahir" => "required",
            "alamat" => "required|max:255"
        ]);

        $result = Student::create($validateData);
        if($result) {
            return redirect("/dashboard/student/all")->with("successAdd", "data siswa berhasil ditambahkan!");
        }
    }

    public function destroy(Student $student)
    {
        $result = Student::destroy($student->id);
        if($result) {
            return redirect("/dashboard/student/all")->with("successDelete", "data siswa berhasil dihapus!");
        }
    }

    public function edit(Student $student)
    {
        return view("student/edit", [
            "title" => "edit data siswa",
            "student" => $student,
            "kelas" => Kelas::all()
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $validateData = $request->validate([
            "nis" => "required|max:11",
            "nama" => "required|max:100",
            "kelas_id" => "required|max:255",
            "tgl_lahir" => "required",
            "alamat" => "required|max:255"
        ]);

        $result = Student::where('id', $student->id)->update($validateData);
        if($result) {
            return redirect("/dashboard/student/all")->with("successAdd", "data siswa berhasil diubah!");
        }
    }

    public function delete(Request $req, $id)
    {
        $data = Student::find($id);
        if($data) {
            $data->delete();
        }

        return redirect("/dashboard/student/all")->with("successDelete", "data siswa berhasil dihapus!");
    }
}
