<?php


namespace SASLdap\Tests;

use Illuminate\Support\Facades\Hash;

use LdapRecord\Laravel\LdapAuthServiceProvider;
use LdapRecord\Laravel\LdapServiceProvider;
use LdapRecord\Laravel\Testing\DirectoryEmulator;
use LdapRecord\Models\ActiveDirectory\User;
use Orchestra\Testbench\TestCase as BaseTestCase;
use SASLdap\SASLdapServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function tearDown(): void
    {
        DirectoryEmulator::tearDown();

        parent::tearDown();
    }

    public function createApplication()
    {
        $app = parent::createApplication();

        Hash::setRounds(4);

        return $app;
    }

    protected function getPackageProviders($app)
    {
        return [
            SASLdapServiceProvider::class,
        ];
    }

    /**
     * Define the environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetup($app)
    {

    }

    protected function setupLdapUserProvider($guardName, array $config)
    {

    }

    protected function setupPlainUserProvider(array $config = [])
    {

    }

    protected function setupDatabaseUserProvider(array $config = [])
    {

    }
}

