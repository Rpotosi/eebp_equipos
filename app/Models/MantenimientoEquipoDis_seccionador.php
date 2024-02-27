<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoEquipoDis_seccionador extends Model
{
    use HasFactory;

    protected $table = 'create_mantenimiento_equipo_dis_seccionador';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id_equipo_sec_fk',
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
        return $this->belongsTo(MantenimientoEquipoDis_seccionador::class, 'id_equipo_sec_fk', 'id_equipo');
    }
}