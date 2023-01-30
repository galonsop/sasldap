<?php

namespace SASLdap;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use LdapRecord\Container;
use LdapRecord\Models\Model;
use SASLdap\Model\ActiveDirectoryUser;

trait SASLdapAuthenticate{


    /**
     * Checks against active directory the credentials given
     * @param $name string Common name (cn) of this user in the LDAP server
     * @param $password string Password of this account
     * @return Model|null null if user does not exists
     */
    public function activeDirectoryUserAttempt(string $name, string $password): ?Model
    {
        $connection = Container::getDefaultConnection();
        try{
            $user = ActiveDirectoryUser::findByOrFail('cn', $name);
            return $connection->auth()->attempt($user->getDn(), $password) ? $user : null;
        }
        catch (Exception) {
            return null;
        }
    }

    /**
     * If user in the LDAP server exists, it logs user in the system using the default App\User model. If the user does not exists,
     * @param $name string Common name (cn) of this user in the LDAP server
     * @param $password string Password of this account
     * @param bool $remember default false
     * @return User|null Authenticated user or nul if this does not exists
     */
    public function authenticate(string $name, string $password, bool $remember = false): ?\App\Models\User
    {
        $name = strtolower($name);
        $ad_user = $this->activeDirectoryUserAttempt($name, $password);
        if($ad_user){
            //Persistimos este usuario en el sistema
            $user = User::where('dmsas', $name)->first();
            if($user == null){
                //Password set as random because it cannot be null
                $user = User::firstOrCreate(['name' => $ad_user->getName() ?? $name, 'dmsas' => $name, 'email' => $name, 'password' => Crypt::encryptString(Str::random())]);
            }
            $user->last_login_at = Carbon::now()->toDateTimeString();
            $user->save();
            Auth::login($user, $remember);
            return $user;
        }
        return null;
    }
}
