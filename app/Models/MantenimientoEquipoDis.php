<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoEquipoDis extends Model
{
    use HasFactory;

    protected $table = 'create_mantenimiento_equipo_dis';

    protected $primaryKey = 'id';

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

    // Define la relación con el equipo de distribución
    public function equipoDis()
    {
        return $this->belongsTo(EquipoDis::class, 'id_equipo_fk', 'id_equipo');
    }
}
