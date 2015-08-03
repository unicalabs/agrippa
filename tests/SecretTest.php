<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Faker\Generator;
use Rhumsaa\Uuid\Uuid;

class SecretTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * Test secret creation.
     *
     * @return void
     */
    public function testCreateSecret()
    {
        $this->visit('/create')
             ->type('a secret', 'secret')
             ->press('Submit')
             ->see('/show/')
             ->seePageIs('/store');
    }

    /**
     * Test secret retrieval.
     *
     * @return void
     */
    public function testRetrieveSecret()
    {
        $faker = Faker\Factory::create();

        $secret_intermediate = $faker->word(32);
        $secret = Crypt::encrypt($secret_intermediate);
        $uuid4_intermediate = Uuid::uuid4();
        $uuid4 = Hash::make($uuid4_intermediate);

        $secret = factory(App\Secret::class)->create([
            'uuid4' => $uuid4,
            'secret' => $secret
        ]);

        $this->visit('/show/' . $uuid4_intermediate)
             ->see($secret_intermediate);
    }
}
