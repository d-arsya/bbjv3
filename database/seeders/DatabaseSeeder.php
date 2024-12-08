<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    private $faculties = [
        "Biologi", "Ekonomi Bisnis", "Filsafat", "Fisipol", "Geografi", 
        "Hukum", "Ilmu Budaya", "Kedokteran", "Kedokteran Gigi", 
        "Kedokteran Hewan", "Kehutanan", "MIPA", "Pascasarjana", 
        "Pertanian", "Peternakan", "Psikologi", "Teknologi Pertanian", 
        "Vokasi","Teknik","Farmasi","Lainnya","Kontributor"
    ];
    public function run(): void
    {
        $pass = Hash::make(env("PASS_ACC"));
        User::create([
            "name"=>"Kamaluddin Arsyad",
            "email"=>env("EMAIL_ACC"),
            "password"=>$pass,
            "faculty"=>18,
            "role"=>"core"
        ]);

        foreach ($this->faculties as $item) {
            Faculty::create(["name"=>$item]);
        }
    }
}
