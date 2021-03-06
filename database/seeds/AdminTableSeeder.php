<?php
use Illuminate\Database\Seeder;
use App\Package\Infrastructure\Eloquents\Admin;

class AdminTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // 削除
        Admin::truncate();
        
        // Admin生成
        $admin = new Admin();
        
        $admin->name = "admin1";
        $admin->email = "admin1@admin.com";
        $admin->password = Hash::make('admin1');
        
        // 保存
        $admin->save();
    }
}
