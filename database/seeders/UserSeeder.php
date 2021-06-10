<?php


namespace Database\Seeders;


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(){
        $users = [
            ['name'=>'Silva','firstname'=>'Jean','email'=>'j.silva@gsb.com','password'=>Hash::make('123456+aze'),'idRole'=>1,'created_at'=>Carbon::now()],
            ['name'=>'Jenson','firstname'=>'James','email'=>'j.jenson@gsb.com','password'=>Hash::make('123456+aze'),'idRole'=>1,'created_at'=>Carbon::now()],
            ['name'=>'Anderson','firstname'=>'Arnaud','email'=>'a.anderson@gsb.com','password'=>Hash::make('123456+aze'),'idRole'=>1,'created_at'=>Carbon::now()],
            ['name'=>'Jones','firstname'=>'Jon','email'=>'j.jones@gsb.com','password'=>Hash::make('123456+aze'),'idRole'=>2,'created_at'=>Carbon::now()],
            ['name'=>'White','firstname'=>'André','email'=>'a.white@gsb.com','password'=>Hash::make('123456+aze'),'idRole'=>2,'created_at'=>Carbon::now()],
            ['name'=>'Hook','firstname'=>'Bernard','email'=>'b.hook@gsb.com','password'=>Hash::make('123456+admin'),'idRole'=>3,'created_at'=>Carbon::now()],
        ];

        foreach ($users as $user){
            DB::table('users')->insert($user);
        }
    }
}
