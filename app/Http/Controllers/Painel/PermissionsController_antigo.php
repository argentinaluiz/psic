<?php

namespace App\Http\Controllers\Painel;

use App\Models\Painel\Permission;
use App\Models\Painel\Role;
use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;


class PermissionsController extends Controller
{
    private $permission;
    
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Permission $permission)
    {
        $totalPermissions   = Permission::count();

        \Session::flash('chave','valor');
        //$permissions = Permission::all();
        $permissions = $permission->get();
       // $permissions = Permission::paginate(10);
        return view('painel.permissions.index', compact('permissions', 'totalPermissions'));
    }

    public function roles($id)
    {
        //Recupera a permissão
        $permission = $this->permission->find($id);
        
        //recuperar permissões
        $roles = $permission->roles()->get();
        
        return view('painel.permissions.roles', compact('permission', 'roles'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Permission $permission, Role $role)
    {
        $roles = $permission->roles()->get();
        
        return view('painel.permissions.create',  compact('permission', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        Permission::create($data);
        return redirect()->route('permissions.index')
                        ->with('message','Permissão cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('painel.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->permission->find($id);
        if(!$permission)
            return redirect()->back();
        $roles = $permission->roles()->get();        
        return view('painel.permissions.edit', compact('roles','permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $data = $request->only(array_keys($request->rules()));
        $permission->fill($data);
        $permission->save();
        //\Session::flash('message','Cliente alterado com sucesso');
        return redirect()->route('permissions.index')
            ->with('message','Permissão alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')
            ->with('message','Permissão excluída com sucesso');
    }
}