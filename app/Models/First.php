<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students
{
    private static $students = [
        [
            "Id" => 1,
            "Nis" => "05022",
            "Nama" => "Rizkia Khosy Amalia W.",
            "Kelas" => "11 PPLG 2",
            "Alamat" => "Jl.duku blok e2/12",
        ],
        [
            "Id" => 2,
            "Nis" => "05023",
            "Nama" => "Inas",
            "Kelas" => "11 PPLG 2",
            "Alamat" => "Jl.tangerang",
        ],
        [
            "Id" => 3,
            "Nis" => "05024",
            "Nama" => "Fazaa",
            "Kelas" => "11 Anim 5",
            "Alamat" => "Bogor",
        ],
        [
            "Id" => 4,
            "Nis" => "05025",
            "Nama" => "Ceciliaa",
            "Kelas" => "11 Anim 5",
            "Alamat" => "Bogor ",
        ],
        [
            "Id" => 5,
            "Nis" => "05026",
            "Nama" => "Vinaa",
            "Kelas" => "11 Anim 2",
            "Alamat" => "Pati",
        ]
        ];
        public static function all()
        {
            return self::$students;
        }
}
