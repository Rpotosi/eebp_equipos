<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoEquipoAdmin extends Model
{
    use HasFactory;

    protected $table = 'create_mantenimiento_equipo_admin';

    protected $fillable = [
        'id_equipo_fk',
        'fecha_mantenimiento',
        'descripcion',
        'averia_dano',
        'referencia_repuesto',
        'responsable',
        'precio',
        'anexos',
    ];

    // Define la relación con el modelo de EquipoAdmin
    public function equipoAdmin()
    {
        return $this->belongsTo(EquipoAdmin::class, 'id_equipo_fk', 'id_equipo');
    }
}
