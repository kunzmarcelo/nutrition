<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Permission;
use App\Role;
use App\User;
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

        $permissions = Permission::with('roles')->get(); //recupera todas as permissoes e objetos com as permissoes e funçoes especifica dessa permissao

        foreach ($permissions as $permission) {
          Gate::define($permission->name, function(User $user) use ($permission){

            return $user->hasPermission($permission);
          });
        }
        Gate::before(function(User $user, $ability){
          return $user->hasAnyRoles('admin');
        });
    }
}
