<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoEquipoSst extends Model
{
    use HasFactory;

    protected $table = 'create_mantenimiento_equipo_sst';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_equipo_fk',
        'fecha',
        'descripción',
        'tipo_procedimiento',
        'responsable',
        'laboratorio_empresa',
        'observaciones',
        'archivo',
    ];

    // Define la relación con el equipo SST
    public function equipoSst()
    {
        return $this->belongsTo(EquipoSst::class, 'id_equipo_fk', 'id_equipo');
    }
}
