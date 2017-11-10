<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AlphaTest extends DuskTestCase
{

    public function testDisplaysAlpha()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/alpha')
                    ->assertSee('Alpha')
                    ->assertDontSee('Beta');
        });
    }

    public function testClickNextForBeta()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/alpha')
                    ->click('@next')
                    ->assertPathIs('/beta');
        });
    }
}
