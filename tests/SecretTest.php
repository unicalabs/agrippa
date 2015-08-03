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
     * Set up for testing.
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->faker = Faker\Factory::create();
        Artisan::call('migrate');
    }

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
        $data = $this->secretData();

        $secret = factory(App\Secret::class)->create([
            'uuid4' => $data['uuid4'],
            'secret' => $data['secret']
        ]);

        $this->visit('/show/' . $data['uuid4_intermediate'])
             ->see($data['secret_intermediate']);
    }

    /**
     * Test views-expired secret retrieval.
     *
     * @return void
     */
    public function testRetrieveViewsExpiredSecret()
    {
        $data = $this->secretData();

        $secret = factory(App\Secret::class)->create([
            'uuid4' => $data['uuid4'],
            'secret' => $data['secret'],
            'expires_views' => $data['count_views'],
            'count_views' => $data['count_views']
        ]);

        $this->visit('/show/' . $data['uuid4_intermediate'])
             ->see('Secret not found.');
    }

    /**
     * Test time-expired secret retrieval.
     *
     * @return void
     */
    public function testRetrieveTimeExpiredSecret()
    {
        $data = $this->secretData();

        $secret = factory(App\Secret::class)->create([
            'uuid4' => $data['uuid4'],
            'secret' => $data['secret'],
            'expires_at' => $this->faker->dateTimeBetween('-5 days', '-5 minutes')
        ]);

        $this->visit('/show/' . $data['uuid4_intermediate'])
             ->see('Secret not found.');
    }

    /**
     * Create basic data for secret creation.
     *
     * @return data
     */
    public function secretData()
    {
        $data['secret_intermediate'] = $this->faker->word(32);
        $data['secret'] = Crypt::encrypt($data['secret_intermediate']);
        $data['uuid4_intermediate'] = Uuid::uuid4();
        $data['uuid4'] = crypt($data['uuid4_intermediate'], '$6$rounds=5000$' . getenv('APP_SALT') . '$');
        $data['count_views'] = $this->faker->numberBetween(5,1000);

        return $data;
    }

}
