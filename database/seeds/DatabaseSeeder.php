<?php
//namespace Database\seeds;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model; 
//use PostTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
        // $this->call(UsersTableSeeder::class);
        $this->call(PostTableSeeder::class);
    }
}
