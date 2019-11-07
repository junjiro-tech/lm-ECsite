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
            'item_name' => 'Coffee & British',
            'item_pic' => '',
            'amount' => '2700',
            ],
            [
            'item_name' => 'Mail',
            'item_pic' => '',
            'amount' => '1800',
            ],
            [
            'item_name' => 'Tiger',
            'item_pic' => '',
            'amount' => '2500',
            ],
            [
            'item_name' => 'Dog',
            'item_pic' => '',
            'amount' => '2000',
            ],
            [
            'item_name' => 'ワンピースコラボ',
            'item_pic' => '',
            'amount' => '3000',
            ],
            [
            'item_name' => 'Girl & Bag',
            'item_pic' => '',
            'amount' => '3000',
            ],
            [
            'item_name' => 'Car',
            'item_pic' => '',
            'amount' => '3000',
            ],
            [
            'item_name' => 'Tiwawa',
            'item_pic' => '',
            'amount' => '3600',
            ],
            [
            'item_name' => 'Robot',
            'item_pic' => '',
            'amount' => '3800',
            ],
            [
            'item_name' => 'Pinapple & Bag',
            'item_pic' => '',
            'amount' => '3500',
            ],
            [
            'item_name' => 'Gal & Phone',
            'item_pic' => '',
            'amount' => '3800',
            ],
            [
            'item_name' => 'Cat & Ebifly',
            'item_pic' => '',
            'amount' => '3300',
            ],
            [
            'item_name' => 'Chameleon',
            'item_pic' => '',
            'amount' => '4000',
            ],
            [
            'item_name' => 'Dog Inspiration',
            'item_pic' => '',
            'amount' => '3000',
            ],
            [
            'item_name' => 'Flog',
            'item_pic' => '',
            'amount' => '4000',
            ],
            [
            'item_name' => 'lm chan',
            'item_pic' => '',
            'amount' => '5000',
            ],
            [
            'item_name' => 'sushi',
            'item_pic' => '',
            'amount' => '4200',
            ],
            [
            'item_name' => 'Cow',
            'item_pic' => '',
            'amount' => '2800',
            ],
            [
            'item_name' => 'British Man',
            'item_pic' => '',
            'amount' => '4600',
            ],
            [
            'item_name' => 'lm chan ribon',
            'item_pic' => '',
            'amount' => '5200',
            ],
            [
            'item_name' => 'Guitar & Tab',
            'item_pic' => '',
            'amount' => '3600',
            ],
            [
            'item_name' => 'Gomes',
            'item_pic' => '',
            'amount' => '4400',
            ],
            [
            'item_name' => 'Coffee',
            'item_pic' => '',
            'amount' => '2200',
            ],
            [
            'item_name' => 'Viollin & Tab',
            'item_pic' => '',
            'amount' => '3500',
            ],
            [
            'item_name' => 'Trump',
            'item_pic' => '',
            'amount' => '3000',
            ],
            [
            'item_name' => 'Hihi',
            'item_pic' => '',
            'amount' => '3000',
            ],
            [
            'item_name' => 'Flower & Bird',
            'item_pic' => '',
            'amount' => '2500',
            ],
            [
            'item_name' => 'Gomes excelent',
            'item_pic' => '',
            'amount' => '3800',
            ],
            [
            'item_name' => 'Yot',
            'item_pic' => '',
            'amount' => '3200',
            ],
            [
            'item_name' => 'Helloween',
            'item_pic' => '',
            'amount' => '4400',
            ],
            [
            'item_name' => 'Trumps',
            'item_pic' => '',
            'amount' => '3000',
            ],
            [
            'item_name' => 'Ribbon',
            'item_pic' => '',
            'amount' => '4000',
            ],
            [
            'item_name' => 'Border',
            'item_pic' => '',
            'amount' => '5000',
            ],
            [
            'item_name' => 'Clothe & Shoe',
            'item_pic' => '',
            'amount' => '4000',
            ],
            [
            'item_name' => 'Doll Guitar',
            'item_pic' => '',
            'amount' => '4800',
            ],
        ];
        foreach($item_seeds as $item) {
            DB::table('items')->insert($item); //ここまでできたら$php artisan db:seed --class=ItemsTableSeeder、
                                               //これでローカルのデータベースに商品のテストデータが追加される
        }
    }
}
