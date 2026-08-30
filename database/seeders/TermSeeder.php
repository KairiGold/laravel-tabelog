<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Term::firstOrCreate(['id' => 1], [
            'content' => "第1条（適用）\n本規約は、NAGOYAMESHI（以下「当サイト」といいます）の利用に関する条件を定めるものです。\n\n（以下、利用規約の本文をここに記載）",
        ]);
    }
}
