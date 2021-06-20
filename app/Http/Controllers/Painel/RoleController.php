<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
  private $role;

  public function __construct(Role $role) {
      $this->role = $role;
      $this->middleware('auth');
  }

  public function index() {

      $results = $this->role->all();

      return view('painel.roles.index', compact('results'));
  }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function permissions($id)
    {
       $role = $this->role->find($id);
       //recuperar permissões
       $permissions = $role->permissions;
         return view('painel.roles.permissions', compact('role','permissions'));
    }


}
