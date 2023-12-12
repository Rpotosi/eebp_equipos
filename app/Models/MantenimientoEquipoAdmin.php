<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoEquipoAdmin extends Model
{
    use HasFactory;

    protected $table = 'create_mantenimiento_equipo_admin';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id_equipo_fk',
        'fecha_mantenimiento',
        'descripcion',
        'tipo_procedimiento',
        'responsable',
        'laboratorio_empresa',
        'observaciones',
        'anexos',
    ];

    // Define la relación con el modelo de EquipoAdmin
    public function equipoAdmin()
    {
        return $this->belongsTo(MantenimientoEquipoAdmin::class, 'id_equipo_fk', 'id_equipo');
    }

}
