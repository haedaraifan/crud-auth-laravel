<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsL
{
    private static $students = [
        [
            "id" => 1,
            "nis" => "04975",
            "nama" => "Aifan",
            "kelas" => "11 PPLG 1",
            "alamat" => "Kudus"
        ],
        [
            "id" => 2,
            "nis" => "04965",
            "nama" => "Danish",
            "kelas" => "11 PPLG 1",
            "alamat" => "Semarang"
        ],
        [
            "id" => 3,
            "nis" => "04967",
            "nama" => "Fardan",
            "kelas" => "11 PPLG 1",
            "alamat" => "Kudus"
        ],
        [
            "id" => 4,
            "nis" => "04974",
            "nama" => "Daffa",
            "kelas" => "11 PPLG 1",
            "alamat" => "Kudus"
        ],
        [
            "id" => 5,
            "nis" => "04978",
            "nama" => "Zikri",
            "kelas" => "11 PPLG 1",
            "alamat" => "Sumbawa"
        ]
    ];

    public static function all()
    {
        return self::$students;
    }
}
