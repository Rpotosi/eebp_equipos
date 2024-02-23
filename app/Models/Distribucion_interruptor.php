<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Distribucion_interruptor extends Model
{
    use HasFactory;
    protected $table = 'create_equipo_dis_interruptor';
    protected $primaryKey = 'id_equipo';
    public $timestamps = false;
    protected $fillable = [
        'nombre_interruptor',
        'area',
        'subestacion',
        'nivel_tension',
        'bahia',
        'iua',
        'fabricante',
        'costo_adquisicion',
        'fecha_puesta_servicio',
        'fecha_fabricacion',
        'pais_origen',
        'img_interruptor',

        // Especificaciones


        'nombre_equipo',
        'modelo_fabricacion',
        'nro_serie_fabricacion',
        'voltage_aislamiento_nominal',
        'frecuencia_nominal',
        'voltage_frequencia_indutrial',
        'voltage_impulso',
        'corrientes_nominal',
        'corriente_termica',
        'corriente_dinamica',
        'corriente_nominal_cierre',
        'medio_extincion',
        'año_fabricacion',
        'forma_cierre_desconexion',
        'factor_primer_polo',
        'secuencia_nominal_maniobra',
        'presion',
        'acondicionamiento',
        'acondicionamiento_fabricante',
        'acondicionamiento_serie',
        'peso_cantidad_carga',
        'c_auxiliares_mando',
        'c_auxiliares_acondicionamiento',
        'c_auxiliares_calefaccion',
        'altura_instalacion',
        'clase_temperatura',
        'normas_fabricacion',
        'nro_ref_catalogo',    

    ];

    public function mantenimientos(): HasMany
    {
        return $this->hasMany(MantenimientoEquipoDis_interruptor::class, 'id_equipo_fk', 'id_equipo');
    }
    
}

