<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
    use HasFactory;

    public const PRIORITY_TYPES = ['Alta','Media','Baja'];
    public const CATEGORY_TYPES = ['Otros','Tráfico de drogas','Servicio'];
    public const STATUS_INIT = 'Pendiente';
    public const STATUS_TYPES = ['Rechazado',self::STATUS_INIT,'Culminado'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'owner_name',
        'email',
        'context',
        'status',
        'priority',
        'category',
        'id_user',
    ];
}
