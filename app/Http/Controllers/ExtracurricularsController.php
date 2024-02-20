<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurriculars;

class ExtracurricularsController extends Controller
{
    public function index()
    {
        return view('extracurricular', [
            "title" => "extracurricular",
            "students" => Extracurriculars::all()
        ]);
    }
}
