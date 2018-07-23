<?php
//Nobody said, that I can't create my own tests!

namespace Tests\Feature;

use App\Entity\Currency;
use App\Mail\RateChanged;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailContentsTest extends  TestCase
{
    use RefreshDatabase;

    public function test_email_contents()
    {
        $user = factory(User::class)->create([
            "is_admin" => false
        ]);
        $currency = factory(Currency::class)->create();
        $old = 10;
        $content = (new RateChanged($user,$currency,$old))->render();

        $this->assertContains($user->name,$content);
        $this->assertContains($currency->name,$content);
        $this->assertContains((string) $currency->rate,$content);
        $this->assertContains((string) $old,$content);
        $this->assertContains(config('app.name'),$content);
    }
}