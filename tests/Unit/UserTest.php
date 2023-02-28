<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    // public function test_register_new_user()
    // {
    //     $reseponse = $this->post('/register', [
    //         'first_name'=> 'Ahmed',
    //         'last_name'=> 'Mohamed',
    //         'ssn_id'=> '5565546546',
    //         'gender'=> '1',
    //         'mobile'=> '04684684641',
    //         'email'=> 'momo@gmail.com',
    //         'password'=> 'momo@gmail.com',
    //         'password_confirmation'=> 'momo@gmail.com',
    //     ]);

    // }

    // public function test_user_duplication()
    // {
    //     $user1 = User::make([
    //         'first_name'=> 'Ahmed',
    //         'last_name'=> 'Mohamed',
    //         'email'=> 'momo@gmail.com',
    //     ]);

    //     $user2 = User::make([
    //         'first_name'=> 'lolo',
    //         'last_name'=> 'Mohamed',
    //         'email'=> 'lolo@gmail.com',
    //     ]);

    //     $this->assertTrue($user1->email != $user2->email);
    // }

    // public function test_delete_user()
    // {
    //     $user = User::factory()->count(1)->make();

    //     $user = User::first();
    //     if($user){
    //         $user->delete();
    //     }
    //     $this->assertTrue(true);
    // }

}
