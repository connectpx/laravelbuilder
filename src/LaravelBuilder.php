<?php
namespace Connectpx\LaravelBuilder;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
*	Start LaravelBuilder
*/
class LaravelBuilder{
	protected $filesystem;
	private $version;

	/**
	*	Global Config
	*/
	private $config = array();


	public function __construct() {
		$this->filesystem = app(Filesystem::class);

		$this->config = config('laravelbuilder');

		// Constants
		$this->version = $this->findVersion();
		
	}

	protected function findVersion()
    {
        if (!is_null($this->version)) {
            return;
        }

        if ($this->filesystem->exists(base_path('composer.lock'))) {
            // Get the composer.lock file
            $file = json_decode(
                $this->filesystem->get(base_path('composer.lock'))
            );

            // Loop through all the packages and get the version of connectpx
            foreach ($file->packages as $package) {
                if ($package->name == 'connectpx/laravelbuilder') {
                    $this->version = $package->version;
                    break;
                }
            }
        }
    }

    public function routes()
    {
        require __DIR__.'/../routes/routes.php';
    }

    public function getVersion()
    {
        return $this->version;
    }

}