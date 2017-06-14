<?php
use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        
        // User生成
        $user = new User();
        
        $user->name = "user1";
        $user->email = "user1@user.com";
        $user->password = Hash::make('user1');
        
        // 保存
        $user->save();
    }
}
