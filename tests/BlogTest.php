<?php

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class BlogTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }
    public function testCredit(){
        $user=User::factory()->create();
        $existing_balance=$user->balance;
        $user->credit(100);
        $user->save();
        $this->assertEquals($existing_balance+100,$user->balance);
    }
}
