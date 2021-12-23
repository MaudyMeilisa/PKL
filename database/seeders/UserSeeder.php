<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //membuat role
        $adminRole = new Role();
        $adminRole-> name = "admin";
        $adminRole-> display_name = "Administrator";
        $adminRole-> save();

        $memberRole = new Role();
        $memberRole-> name = "member";
        $memberRole-> display_name = "member";
        $memberRole-> save();


        //membuat sample user
        $admin = new User();
        $admin->name = 'Maudy Meilisa';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('12345678');
        $admin->save();

        $member = new User();
        $member->name = 'member';
        $member->email = 'member@gmail.com';
        $member->password = Hash::make('12345678');
        $member->save();


        $admin->attachRole($adminRole);
        $member->attachRole($memberRole);


    }
}
