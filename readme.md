<!-- readme.md -->

<p >Integrate LDAP using LDAP Record into your Laravel application for SAS.</p>

<p >
    <a href="https://laravel.com"><img alt="" src="https://img.shields.io/badge/Built_for-Laravel-green.svg?style=flat-square"></a>
    <a href="https://github.com/DirectoryTree/LdapRecord-Laravel/actions"></a>
<img alt="" src="https://img.shields.io/packagist/l/directorytree/ldaprecord-laravel.svg?style=flat-square">
</p>

---

🔑  **Authenticate LDAP users into your application**

Allow LDAP users to log into your application using [LDAPRecord for Laravel](https://ldaprecord.com/docs/laravel/v2).

<b>IMPORTANT: </b> After installation of this package, execute <br>
``` php artisan vendor:publish --provider="LdapRecord\Laravel\LdapServiceProvider" ```
<br>
to publish LDAPRecord config files.
Then in your .env, add the required params. Example:
``` 
LDAP_HOST=""
LDAP_BASE_DN=""
LDAP_USERNAME=""
LDAP_PASSWORD=""
LDAP_LOGGING=true
LDAP_CONNECTION=default
LDAP_PORT=389
LDAP_TIMEOUT=5
LDAP_SSL=false
LDAP_TLS=false
 ```


<p >Germán Alonso Pérez </p>
