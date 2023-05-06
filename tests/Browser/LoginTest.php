<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testSuccessfulLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Log in')
                ->assertPathIs('/tweet')
                ->assertSee('つぶやきアプリ');
        });
    }
}
