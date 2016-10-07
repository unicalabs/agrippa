<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
class SaltGenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salt:generate';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the application salt';
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
	{
		$salt = $this->getRandomSalt();
		$path = base_path('.env');
		if (file_exists($path))
		{
            $this->info("Looking for");
			file_put_contents($path, str_replace(
				getenv('APP_SALT'), $salt, file_get_contents($path)
			));
		}
		$this->info("Application salt [$salt] set successfully.");
	}
	/**
	 * Generate a random salt for the application.
	 *
	 * @return string
	 */
	protected function getRandomSalt()
	{
		return Str::random(32);
	}
}