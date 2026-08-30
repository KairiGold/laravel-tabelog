<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            '和食',
            '洋食',
            '中華',
            '魚介・海鮮料理',
            'パスタ',
            'ラーメン',
            '焼肉・ホルモン',
            'カフェ・スイーツ',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
