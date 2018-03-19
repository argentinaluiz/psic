<?php

namespace App;

use Bootstrapper\Interfaces\TableInterface;
use App\Notifications\MyResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\UserCreated;
use App\Models\Painel\Permission;
use App\Models\Painel\Psychoanalyst;
use App\Models\Painel\Admin;
use App\Models\Painel\Patient;
use App\Models\Painel\Role;
use App\Models\Painel\UserProfile;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements TableInterface, JWTSubject
{
    use Notifiable;
    const ROLE_ADMIN = 1;
    const ROLE_PSYCHOANALYST = 2;
    const ROLE_PATIENT = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','enrolment'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token){
        $this->notify(new MyResetPasswordNotification($token));
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class)->withDefault();
    }

    public function userable()
    {
        return $this->morphTo();
    }

    public function calls(){
        return $this->belongsToMany(\App\Models\Painel\Call::class);
    }

    public function eAdmin()
    {
      //return $this->id == 1;
      return $this->existRole('Admin');
    }
   
    public function products()
    {
      return $this->belongsToMany(\App\Models\Painel\Product::class);
    }

    public static function createFully($data)
    {
        $password = str_random(6);
        $data['password'] = bcrypt($password);
        /** @var User $user */
        $user = parent::create($data + ['enrolment' => str_random(6)]);
        self::assignEnrolment($user, self::ROLE_ADMIN);
        self::assignRole($user, $data['type']);
        $user->save();
        if (isset($data['send_mail'])) {
            $token = \Password::broker()->createToken($user);
            $user->notify(new UserCreated($token));
        }

        return compact('user', 'password');
    }

    public static function assignEnrolment(User $user, $type)
    {
        $types = [
            self::ROLE_ADMIN => 100000,
            self::ROLE_PSYCHOANALYST => 400000,
            self::ROLE_PATIENT => 700000,
        ];
        $user->enrolment = $types[$type] + $user->id;
        return $user->enrolment;
    }

    public static function assignRole(User $user, $type)
    {
        $types = [
            self::ROLE_ADMIN => Admin::class,
            self::ROLE_PSYCHOANALYST => Psychoanalyst::class,
            self::ROLE_PATIENT => Patient::class,
        ];
        $model = $types[$type];
        $model = $model::create([]);
        $user->userable()->associate($model);
    }

     /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['ID', 'Nome', 'Email', 'Papéis'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Nome':
                return $this->name;
            case 'Email':
                return $this->email;
            case 'Papéis':
                return $this->roles->pluck('name')->implode(','); 
        }
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    //Lembrar de não colocar aqui as informações sensíveis e password, porque essa informação irá no Payload
    public function getJWTCustomClaims()
    {
        return [
            'user' => [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->userable instanceof Psychoanalyst ? self::ROLE_PSYCHOANALYST : self::ROLE_PATIENT
            ]
        ];
    }

    /** Funções para a parte dos Papéis (Roles) */
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Painel\Role::class);
    }

    public function addRole($role){
        if (is_string($role)) {
            $role = Role::where('name','=',$role)->firstOrFail();
        }

        if($this->existRole($role)){
            return;
        }
        return $this->roles()->attach($role);

    }

    public function existRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name','=',$role)->firstOrFail();
        }
        return (boolean) $this->roles()->find($role->id);

    }

    public function deleteRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name','=',$role)->firstOrFail();
        }
        return $this->roles()->detach($role);
    }
    
    public function existThisRole($roles)
    {
      $userRoles = $this->roles;
      return $roles->intersect($userRoles)->count();
    }

     public function orders(){
        return $this->hasMany(\App\Models\Painel\Order::class);
    }

}
