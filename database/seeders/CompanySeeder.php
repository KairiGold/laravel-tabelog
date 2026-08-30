<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::firstOrCreate(['id' => 1], [
            'name' => '株式会社NAGOYAMESHI',
            'postal_code' => '460-0008',
            'address' => '愛知県名古屋市中区栄一丁目1番1号',
            'representative' => '代表取締役 名古屋 太郎',
            'business' => '飲食店レビューサイトの運営',
            'established_on' => '2020-04-01',
            'capital' => '1,000万円',
            'number_of_employees' => '15名',
        ]);
    }
}
