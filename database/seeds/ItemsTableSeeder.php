<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();
        $item_seeds = [
            [
            'name' => 'Coffee & British',
            'amount' => '2700',
            ],
            [
            'name' => 'Mail',
            'amount' => '1800',
            ],
            [
            'name' => 'Tiger',
            'amount' => '2500',
            ],
            [
            'name' => 'Dog',
            'amount' => '2000',
            ],
            [
            'name' => 'ワンピースコラボ',
            'amount' => '3000',
            ],
            [
            'name' => 'Girl & Bag',
            'amount' => '3000',
            ],
            [
            'name' => 'Car',
            'amount' => '3000',
            ],
            [
            'name' => 'Tiwawa',
            'amount' => '3600',
            ],
            [
            'name' => 'Robot',
            'amount' => '3800',
            ],
            [
            'name' => 'Pinapple & Bag',
            'amount' => '3500',
            ],
            [
            'name' => 'Gal & Phone',
            'amount' => '3800',
            ],
            [
            'name' => 'Cat & Ebifly',
            'amount' => '3300',
            ],
            [
            'name' => 'Chameleon',
            'amount' => '4000',
            ],
            [
            'name' => 'Dog Inspiration',
            'amount' => '3000',
            ],
            [
            'name' => 'Flog',
            'amount' => '4000',
            ],
            [
            'name' => 'lm chan',
            'amount' => '5000',
            ],
            [
            'name' => 'sushi',
            'amount' => '4200',
            ],
            [
            'name' => 'Cow',
            'amount' => '2800',
            ],
            [
            'name' => 'British Man',
            'amount' => '4600',
            ],
            [
            'name' => 'lm chan ribon',
            'amount' => '5200',
            ],
            [
            'name' => 'Guitar & Tab',
            'amount' => '3600',
            ],
            [
            'name' => 'Gomes',
            'amount' => '4400',
            ],
            [
            'name' => 'Coffee',
            'amount' => '2200',
            ],
            [
            'name' => 'Viollin & Tab',
            'amount' => '3500',
            ],
            [
            'name' => 'Trump',
            'amount' => '3000',
            ],
            [
            'name' => 'Hihi',
            'amount' => '3000',
            ],
            [
            'name' => 'Flower & Bird',
            'amount' => '2500',
            ],
            [
            'name' => 'Gomes excelent',
            'amount' => '3800',
            ],
            [
            'name' => 'Yot',
            'amount' => '3200',
            ],
            [
            'name' => 'Helloween',
            'amount' => '4400',
            ],
            [
            'name' => 'Trumps',
            'amount' => '3000',
            ],
            [
            'name' => 'Ribbon',
            'amount' => '4000',
            ],
            [
            'name' => 'Border',
            'amount' => '5000',
            ],
            [
            'name' => 'Clothe & Shoe',
            'amount' => '4000',
            ],
            [
            'name' => 'Doll Guitar',
            'amount' => '4800',
            ],
        ];
        foreach($item_seeds as $item) {
            DB::table('items')->insert($item); //ここまでできたら$php artisan db:seed --class=ItemsTableSeeder、
                                               //これでローカルのデータベースに商品のテストデータが追加されました。
        }
    }
}
