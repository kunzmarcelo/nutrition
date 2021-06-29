<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Permission;
use App\Role;
use App\User;
use App\Animal;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        // Gate::define('view', function(User $user, Animal $animal){
        //   return $user->id == $animal->user_id;
        // });





        $permissions = Permission::with('roles')->get(); //recupera todas as permissoes e objetos com as permissoes e funçoes especifica dessa permissao
      //  dd($permissions);
        foreach ($permissions as $permission) {
          // print_r($permission->name);
          Gate::define($permission->name, function(User $user) use ($permission){

            return $user->hasPermission($permission);
          });
        }
        Gate::before(function(User $user, $ability){
          if( $user->hasAnyRoles('admin'))
          return true;
        });
    }
}
