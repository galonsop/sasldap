<?php

namespace SASLdap;

use Exception;
use LdapRecord\Container;
use SASLdap\Model\ActiveDirectoryUser;

trait SASLdapAuthenticate{

    public function activeDirectoryUserAttempt($email, $password): ?\LdapRecord\Models\Model
    {
        $connection = Container::getDefaultConnection();
        try{
            $user = ActiveDirectoryUser::findByOrFail('cn', $email);
            return $connection->auth()->attempt($user->getDn(), $password) ? $user : null;
        }
        catch (Exception) {
            return null;
        }
    }
}
