<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            '日本食',
            '中華',
            'フレンチ',
            'イタリアン',
            'ビーガン',
            '韓国料理',
            'アジア料理',
            'タイ料理',
            'ベーカリー',
            '朝食',
            'ランチ',
            'ディナー',
            'カレー',
            '粉物',
            '海鮮料理',
            'ベジタリアン',
            'お菓子',
            'スイーツ',
            '健康食',
            '麺類',
            'アメリカ料理',
            '珍しい料理/変わった料理',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert(['name' => $category]);
        }
    }
}
