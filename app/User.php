<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
      return $this->belongsToMany(\App\Role::class);
    }

    public function hasPermission(Permission $permission){
      return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles){
      if(is_array($roles) || is_object($roles)){


        return !! $roles->intersect($this->roles)->count();
        // foreach ($roles as $role) {
        //   return $this->roles->contains('name', $role->name);
        // }
      }
      return $this->roles->contains('name', $roles);
    }



    public function adminlte_profile_url()
    {

      //dd($roles);
      return "painel/profile/";
        //return 'management/users';
    }

    public function adminlte_image()
    {

      return \Auth::user()->avatar;
    }
    public function adminlte_desc()
    {
      return \Auth::user()->description;
    }
}
