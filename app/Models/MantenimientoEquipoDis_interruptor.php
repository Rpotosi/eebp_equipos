<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoEquipoDis_interruptor extends Model
{
    use HasFactory;

    protected $table = 'create_mantenimiento_equipo_dis';
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

    // Define la relación con el equipo de distribución
    public function equipoDis()
    {
        return $this->belongsTo(MantenimientoEquipoDis_interruptor::class, 'id_equipo_fk', 'id_equipo');
    }
}
