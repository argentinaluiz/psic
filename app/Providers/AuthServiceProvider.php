<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Painel\Call;
use App\Models\Painel\Permission;
use App\Models\Painel\Admin;
use App\Models\Painel\Psychoanalyst;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
       /*
        'App\Model' => 'App\Policies\ModelPolicy',
        */
        'App\Models\Painel\Call' => 'App\Policies\CallTestPolicy'

    ];

        
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        if(!app()->runningInConsole()){
            foreach ($this->listPermissions() as $permission) {
                Gate::define($permission->name,function($user) use($permission){
                return $user->existThisRole($permission->roles) || $user->eAdmin();
                });
            }
        }

        \Gate::define('admin', function($user){
            return $user->userable instanceof Admin;
         });

         \Gate::define('psychoanalyst', function($user){
            return $user->userable instanceof Psychoanalyst;
        });

         \Gate::before(function($user, $ability){
            if($user ->eAdmin()){
               return true; //não retorne false, pois isto bloqueia a execução da regra original chamada
            }
         });



        /*
        Gate::define('view-call', function($user, Call $call){
            return $user->id == $call->user_id;
          });
         }*/

        /*if(!app()->runningInConsole()){
            $permissions = Permission::with('roles')->get();
            //dd($permissions);
            foreach( $permissions as $permission )
            {
                $gate->define($permission->name, function(User $user) use ($permission){
                    return $user->hasPermission($permission);
                });
            }
            
            $gate->before(function(User $user, $ability){
                
                if ( $user->hasAnyRoles('adm') )
                    return true;
                
            });
        }*/
    }

    public function listPermissions()
    {
      return Permission::with('roles')->get();
    }

}
