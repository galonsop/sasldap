<?php

namespace SASLdap\Tests\Unit;


use SASLdap\Tests\TestCase;
use SASLdap\SASLdapAuthenticate;

class SASLdapAuthenticateTest extends TestCase{
    use SASLdapAuthenticate;

    public function test_sas_ad_validation_no_user(){
        $no_exists = $this->activeDirectoryUserAttempt('german.alonso.per@gmail.com', '12345');
        $this->assertTrue($no_exists == null);
    }

}
