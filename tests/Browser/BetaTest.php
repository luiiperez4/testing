<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BetaTest extends DuskTestCase
{

    public function testDisplaysBeta()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/beta')
                    ->assertSee('Beta')
                    ->assertDontSee('Alpha');
        });
    }

    public function testClickPreviousForAlpha()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/beta')
                    ->clickLink('Previous')
                    ->assertPathIs('/alpha');
        });
    }
}
