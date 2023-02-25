<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Mohamed',
            'last_name' => 'Ramadan',
            'role_id' => Role::Admin,
            'ssn_id' => '112352954859664',
            'gender' => 1,
            'mobile' => '01112223321',
            'email' => 'moservices11@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'first_name' => 'Daniel',
            'last_name' => 'Matthew',
            'role_id' => Role::Driver,
            'ssn_id' => '112352954859661',
            'gender' => 1,
            'mobile' => '01112223322',
            'email' => 'daniel-bk@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'first_name' => 'Betty',
            'last_name' => 'Mark',
            'role_id' => Role::Passenger,
            'ssn_id' => '112352954859662',
            'gender' => 2,
            'mobile' => '01112223323',
            'email' => 'betty-bk@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'first_name' => 'Joseph',
            'last_name' => 'Steven',
            'role_id' => Role::Passenger,
            'ssn_id' => '112352954859663',
            'gender' => 1,
            'mobile' => '01112222343',
            'email' => 'joseph-bk@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'first_name' => 'Matthew',
            'last_name' => 'Donald',
            'role_id' => Role::Passenger,
            'ssn_id' => '112352954859668',
            'gender' => 1,
            'mobile' => '01112223344',
            'email' => 'matthew-bk@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'first_name' => 'Nancy',
            'last_name' => 'Paul',
            'role_id' => Role::Passenger,
            'ssn_id' => '112352954859665',
            'gender' => 2,
            'mobile' => '01112223345',
            'email' => 'nancy-bk@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }
}
