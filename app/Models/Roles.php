<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    public const ROL_ADMIN = 'Administrador';
    public const ROL_SUPERVISOR = 'Supervisor';
    public const ROL_TYPES = [self::ROL_ADMIN, self::ROL_SUPERVISOR];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_user',
    ];
}
