<?php

namespace SASLdap\Tests\Unit;

use SASLdap\Tests\TestCase;
use SASLdap\SASLdapServiceProvider;

class SASLdapServiceProviderTest extends TestCase{


    public function test_migration_is_publishable()
    {
        $this->artisan('vendor:publish', ['--provider' => SASLdapServiceProvider::class, '--no-interaction' => true]);

        $this->assertFileExists(config_path('ldap.php'));
    }
}
