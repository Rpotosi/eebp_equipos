<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoVehiculo extends Model
{
    use HasFactory;

    protected $table = 'create_mantenimiento_vehiculo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [

        'id_vehiculo_fk',
        'fecha_mantenimiento',
        'descripcion',
        'averia_dano',
        'referencia_repuesto',
        'responsable',
        'precio',
        'anexos',
    ];

    // Define la relación con el modelo de Vehículo
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'id_vehiculo_fk', 'id_vehiculo');
    }
}
