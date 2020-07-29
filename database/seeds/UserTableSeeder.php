<?php
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('123456');
        $user->level = 1;
        $user->save();
    }
}
