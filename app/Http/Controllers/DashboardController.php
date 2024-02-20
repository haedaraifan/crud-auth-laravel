<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\kelas;

class DashboardController extends Controller
{
    public function index()
    {
        return view("dashboard.index", [
            "title" => "dashboard"
        ]);
    }

    public function student(Request $req)
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

        return view("dashboard.student.all", [
            "title" => "student",
            "students" => $students,
            "kelas" => Kelas::all()
        ]);
    }

    public function filter($kelas_id)
    {
        $result = Student::where('kelas_id', $kelas_id)->paginate(10);

        if (request()->route()->named('filter_students')) {
            return view('dashboard.student.all', [
                "title" => "students",
                "students" => $result,
                "kelas" => Kelas::all()
            ]);
        }
    }

    public function kelas(Request $req)
    {
        $search = $req->search;
        $kelas = Kelas::paginate(10);

        if($search) {
            $kelas = Kelas::where("nama", "like", "%" . $search . "%")->paginate(10);
        }
        
        return view("dashboard.kelas.all", [
            "title" => "kelas",
            "listKelas" => $kelas
        ]);
    }
}
