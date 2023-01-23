<?php

namespace SASLdap\Model;

use LdapRecord\Models\Model;

class ActiveDirectoryUser extends Model
{
    /**
     * The object classes of the LDAP model.
     * Found using mmc, in tab attribute editor (Editor de atributos), parameter objectClass
     * @var array
     */
    public static $objectClasses = [
        'organizationalPerson',
        'person',
        'top',
        'user'
    ];
}
