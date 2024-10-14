<?php

declare(strict_types=1);

use Hyperf\Database\Seeders\Seeder;
use Hyperf\DbConnection\Db;

class Countries extends Seeder
{
    public function run()
    {
        Db::table('countries')->insert([[
            'name' => 'Россия',
            'code' => 7,
        ], [
            'name' => 'Казахстан',
            'code' => 997,
        ], [
            'name' => 'Беларусь',
            'code' => 375,
        ], [
            'name' => 'Грузия',
            'code' => 995,
        ], [
            'name' => 'Армения',
            'code' => 374,
        ]]);
    }
}
