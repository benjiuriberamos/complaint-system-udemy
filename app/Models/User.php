<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'image_perfil',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role() {
        return $this->belongsTo('App\Models\Roles');
    }

    public function isAdmin(): bool
    {
        if ($this->role?->type_user == Roles::ROL_ADMIN) 
            return true;
        return false;
    }

    public function isSupervisor(): bool
    {
        if ($this->role?->type_user == Roles::ROL_SUPERVISOR) 
            return true;
        return false;
    }

    public function getMemberSinceAttribute()
    {
        return Carbon::parse($this->created_at)->format('M. Y');
    }
}
