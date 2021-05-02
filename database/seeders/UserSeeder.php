<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_1 = new User;
        $admin_1->name = 'Alfons';
        $admin_1->email = 'alfons@gmail.com';
        $admin_1->address = 'Makassar';
        $admin_1->password = Hash::make('admin123');
        $admin_1->save();
     
        $admin_2 = new User;
        $admin_2->name = 'Kevin';
        $admin_2->email = 'kevin@gmail.com';
        $admin_2->address = 'Malang';
        $admin_2->password = Hash::make('admin123');
        $admin_2->save();
     
        $admin_3 = new User;
        $admin_3->name = 'Abdi';
        $admin_3->email = 'abdi@gmail.com';
        $admin_3->address = 'Pekanbaru';
        $admin_3->password = Hash::make('admin123');
        $admin_3->save();

        Role::create(['name'=>'admin']);
        
        $admin_1->assignRole('admin');
        $admin_2->assignRole('admin');
        $admin_3->assignRole('admin');
    }
}
