<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //执行factory 方法
        factory(\App\Models\Admin::class,3)->create();
        // 找到第一个, 然后修改
        $user =\App\Models\Admin::find(1);
        $user->nickname = 'Corplay';
        $user->email = 'hwjmsn@hotmail.com';
        $user->password = bcrypt('123');
        $user->save();
    }
}
