<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //nếu bị lỗi not found seed thì chạy câu lệnh composer dumpautoload
        $this->call(RolesTableSeed::class);
        $this->call(UserTableSeed::class);
    }
}
