<?php

declare(strict_types=1);

use Hyperf\Database\Seeders\Seeder;
use Hyperf\DbConnection\Db;

class guests extends Seeder
{
    public function run()
    {
        Db::table('guests')->insert([
            'name' => 'Иван',
            'last_name' => 'Иванов',
            'phone' => '71234567890',
            'email' => 'pes@email.com',
            'country_id' => '1',
        ]);
    }
}
