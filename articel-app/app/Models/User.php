<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
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

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id', 'id');
    }

    public static function totalReporter($role)
    {
        $sql = "SELECT * FROM users JOIN roles 
                on users.role_id=roles.id 
                WHERE roles.role_name = '$role'";
        return DB::select($sql);
    }

    public function articles()
    {
        return $this->hasMany(Articles::class, 'reporter_id', 'id');
    }
    public function edits()
    {
        return $this->hasMany(Articles::class, 'editor_id', 'id');
    }
    public function totalArticle()
    {
        return $this->articles->count();
    }
    public function totalPublish()
    {
        return $this->articles->where('status', 1)->count();
    }
    public function totalEditArticle()
    {
        return $this->edits->count();
    }
    public function totalEditPublish()
    {
        return $this->edits->where('status', 1)->count();
    }
}
