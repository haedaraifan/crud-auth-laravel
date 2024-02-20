<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurriculars
{
    private static $students = [
        [
            "id" => 1,
            "nama" => "Pramuka",
            "nama_pembina" => "Pak Wawan",
            "deskripsi" => "Ekstrakurikuler Pramuka adalah sebuah kegiatan di sekolah yang bertujuan untuk mengembangkan karakter, kepemimpinan, keterampilan survival, dan kedisiplinan siswa. "
        ],
        [
            "id" => 2,
            "nama" => "Rohis",
            "nama_pembina" => "Pak Budi",
            "deskripsi" => "Dalam ROHIS, siswa dapat belajar tentang Islam, membaca Al-Quran, berdiskusi tentang nilai-nilai keagamaan, dan melaksanakan ibadah bersama."
        ],
        [
            "id" => 3,
            "nama" => "E-Sport",
            "nama_pembina" => "Pak Mamat",
            "deskripsi" => "Ekstrakurikuler E-Sport adalah kegiatan di sekolah yang fokus pada permainan video kompetitif."
        ],
        [
            "id" => 4,
            "nama" => "Teater",
            "nama_pembina" => "Bu ZZZ",
            "deskripsi" => "Ekstrakurikuler teater adalah kegiatan di sekolah yang melibatkan siswa dalam produksi dan pertunjukan drama. Dalam kegiatan ini, siswa berperan dalam berbagai peran dalam sebuah drama atau pertunjukan, berlatih dialog, mengembangkan keterampilan berakting, dan mempersiapkan pertunjukan untuk penontonTeater"
        ],
        [
            "id" => 5,
            "nama" => "Tari",
            "nama_pembina" => "Bu Dimas",
            "deskripsi" => "Ekstrakurikuler tari adalah kegiatan di sekolah yang mengajarkan siswa berbagai jenis tarian, termasuk tarian tradisional, kontemporer, atau tarian daerah."
        ],
    ];

    public static function all()
    {
        return self::$students;
    }
}
