<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::query()->updateOrCreate(
            ['id' => 1],
            [
                'name' => 'Jelita Agustin',
                'headline' => 'Belajar coding',
                'tagline' => 'Saya adalah siswa yang sedang belajar untuk menjadi programmer.',
                'about' => 'Siswa Rekayasa Perangkat Lunak yang berdedikasi dan memiliki ketertarikan kuat pada pengembangan aplikasi web. Terbiasa menggunakan HTML, CSS, JavaScript, PHP, serta pengelolaan basis data MySQL. Terampil dalam merancang antarmuka web yang responsif dan mengintegrasikan logika back-end. Siap mengaplikasikan kemampuan teknis dan kemampuan memecahkan masalah dalam proyek dunia kerja.',
                'location' => 'Jakarta, Indonesia',
                'email' => 'jelitaagustin393@gmail.com',
                'avatar_url' => '/profile-jelita.png',
                'skills' => ['Mendengarkan musik', 'Menonton film', 'Makeup', 'Belajar', 'Membuat web', 'Membuat APK'],
                'projects' => [
                    [
                        'category' => 'Proyek pilihan',
                        'title' => 'Pengembangan web tahun 2026',
                        'description' => 'Proyek pertama saya di bidang pengembangan web pada tahun 2026.',
                        'url' => null,
                    ],
                    [
                        'category' => 'Pengalaman',
                        'title' => 'Aplikasi e-commerce',
                        'description' => 'Sebuah aplikasi e-commerce yang pernah saya buat.',
                        'url' => null,
                    ],
                    [
                        'category' => 'Sedang dikerjakan',
                        'title' => 'Aplikasi e-money',
                        'description' => 'Saya ingin membuat sebuah aplikasi e-money.',
                        'url' => null,
                    ],
                ],
                'social_links' => [
                    [
                        'label' => 'Instagram',
                        'handle' => '@oseanwoonie',
                        'url' => 'https://www.instagram.com/oseanwoonie/',
                    ],
                ],
            ],
        );
    }
}
