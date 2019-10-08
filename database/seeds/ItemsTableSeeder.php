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
            'amount' => '2,700',
            ],
            [
            'name' => 'Mail',
            'amount' => '1,800',
            ],
            [
            'name' => 'Tiger',
            'amount' => '2,500',
            ],
            [
            'name' => 'Dog',
            'amount' => '2,000',
            ],
            [
            'name' => 'ワンピースコラボ',
            'amount' => '3,000',
            ],
            [
            'name' => 'Girl & Bag',
            'amount' => '3,000',
            ],
            [
            'name' => 'Car',
            'amount' => '3,000',
            ],
            [
            'name' => 'Tiwawa',
            'amount' => '3,600',
            ],
            [
            'name' => 'Robot',
            'amount' => '3,800',
            ],
            [
            'name' => 'Pinapple & Bag',
            'amount' => '3,500',
            ],
            [
            'name' => 'Gal & Phone',
            'amount' => '3,800',
            ],
            [
            'name' => 'Cat & Ebifly',
            'amount' => '3,300',
            ],
            [
            'name' => 'Chameleon',
            'amount' => '4,000',
            ],
            [
            'name' => 'Dog Inspiration',
            'amount' => '3,000',
            ],
            [
            'name' => 'Flog',
            'amount' => '4,000',
            ],
            [
            'name' => 'lm chan',
            'amount' => '5,000',
            ],
            [
            'name' => 'sushi',
            'amount' => '4,200',
            ],
            [
            'name' => 'Cow',
            'amount' => '2,800',
            ],
            [
            'name' => 'British Man',
            'amount' => '4,600',
            ],
            [
            'name' => 'lm chan ribon',
            'amount' => '5,200',
            ],
            [
            'name' => 'Guitar & Tab',
            'amount' => '3,600',
            ],
            [
            'name' => 'Gomes',
            'amount' => '4,400',
            ],
            [
            'name' => 'Coffee',
            'amount' => '2,200',
            ],
            [
            'name' => 'Viollin & Tab',
            'amount' => '3,500',
            ],
            [
            'name' => 'Trump',
            'amount' => '3,000',
            ],
            [
            'name' => 'Hihi',
            'amount' => '3,000',
            ],
            [
            'name' => 'Flower & Bird',
            'amount' => '2,500',
            ],
            [
            'name' => 'Gomes excelent',
            'amount' => '3,800',
            ],
            [
            'name' => 'Yot',
            'amount' => '3,200',
            ],
            [
            'name' => 'Helloween',
            'amount' => '4,400',
            ],
            [
            'name' => 'Trumps',
            'amount' => '3,000',
            ],
            [
            'name' => 'Ribbon',
            'amount' => '4,000',
            ],
            [
            'name' => 'Border',
            'amount' => '5,000',
            ],
            [
            'name' => 'Clothe & Shoe',
            'amount' => '4,000',
            ],
            [
            'name' => 'Doll Guitar',
            'amount' => '4,800',
            ],
        ];
        foreach($item_seeds as $item) {
            DB::table('items')->insert($item); //ここまでできたら$php artisan db:seed --class=ItemsTableSeeder、
                                               //これでローカルのデータベースに商品のテストデータが追加されました。
        }
    }
}
