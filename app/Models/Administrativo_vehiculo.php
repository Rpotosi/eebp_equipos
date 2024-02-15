<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Administrativo_vehiculo extends Model
{
    use HasFactory;
    protected $table = 'create_vehiculo';
    protected $primaryKey = 'id_vehiculo';
    protected $fillable = [
        'fecha',
        'placa',
        'linea',
        'clase',
        'marca',
        'color',
        'chasis',
        'motor',        
        'cilindraje',
        'uso_vehiculo',
        'modelo',
        'fecha_tecnomecanica',
        'licencia',
        'tipo_direccion',
        'tipo_transmision',
        'numero_velocidades',
        'tipo_rodamiento',
        'suspencion_delantera',
        'suspension_trasera',
        'numero_llantas',
        'dimensiones_rines',
        'material_rines',
        'tipo_frenos_delanteros',
        'tipo_frenos_traseros',
        'numero_serie',
        'numero_ventanas',
        'capacidad_carga',
        'dotacion',
        'equipo_carretera',
        
        'fecha_mantenimiento',
        'descripcion',
        'averia_dano',
        'referencia_repuesto',
        'responsable',
        'precio',     

        'img',


    ];

    public function mantenimientos(): HasMany
    {
        return $this->hasMany(MantenimientoVehiculo::class, 'id_vehiculo_fk', 'id_vehiculo');
    }
    
}
