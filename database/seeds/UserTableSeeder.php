<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name','admin')->first();
        $user = User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=> Hash::make("admin@12"),
            'role_id'=>$role->id
        ]);
    }
}
