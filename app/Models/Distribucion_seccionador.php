<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Distribucion_seccionador extends Model
{
    use HasFactory;
    protected $table = 'create_equipo_dis_seccionador';
    protected $primaryKey = 'id_equipo_sec';
    public $timestamps = true;
    protected $fillable = [
        'nombre_activo_sec',
        'area_sec',
        'subestacion_sec',
        'nivel_tension_sec',
        'bahia_sec',
        'iua_sec',
        'fabricante_sec',
        'costo_adquisicion_sec',
        'fecha_puesta_servicio_sec',
        'pais_origen_sec',
        'img_sec',

        // Especificaciones


        'nombre_equipo_sec',
        'modelo_fabricacion_sec',
        'nro_serie_fabricacion_sec',
        'fecha_fabricacion_sec',
        'volt_aislto_nominal_sec',
        'frecuencia_nominal_sec',
        'volt_impulso_sec',
        'corrt_nominal_sec',
        'corrt_termica_sec ',
        'peso_sec',

        // Mando Motor

        'accionamiento_clase_sec',
        'accionamiento_tipo_sec',
        'año_fabricacion_sec',
        'peso_mando_motor_sec', 
        'volt_mando_sec',
        'volt_motor_sec',
        'volt_calefaccion_sec',      
        'corrt_nominal_mando_sec',   
        'altura_instalacion_sec',
        'nro_rfe_catalogo_sec',
        'par_total_sec',

        //Mando cuchuilla

        'accionamiento_clase_cuchuilla_sec',
        'accionamiento_tipo_cuchuilla_sec',
        'año_fabricacion_cuchuilla_sec',
        'peso_mando_motor_cuchuilla_sec',
        'volt_mando_cuchuilla_sec',
        'volt_motor_cuchuilla_sec',
        'volt_calefaccion_cuchuilla_sec',
        'altura_instalacion_cuchuilla_sec',
        'nro_rfe_catalogo_cuchuilla_sec',
        'par_total_cuchuilla_sec',


    ];

    public function mantenimientos(): HasMany
    {
        return $this->hasMany(MantenimientoEquipoDis_seccionador::class, 'id_equipo_sec_fk', 'id_equipo');
    }
    
}

