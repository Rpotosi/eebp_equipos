<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SST extends Model
{
    use HasFactory;
    protected $table = 'create_equipo_sst';
    protected $primaryKey = 'id_equipo';
    public $timestamps = false;
    protected $fillable = [

        'nombre_equipo',
        'ubicacion_equipo',
        'estado',
        'fecha_fabrica',
        'marca',
        'modelo',
        'no_serie',
        'no_lote',
        'no_activo',
        'codigo',
        'fecha_ensayo',
        'validez',
        'fecha_conformidad',
        'fecha_operacion',
        'img_sst',
        'nombre_responsable',
        'cargo',
        'lugar_proceso',
        'fecha_entrega',
        'observacion_responsable',
        'fabricante',
        'proveedor',
        'fecha_adquisicion',
        'nombre_proveedor',
        'direccion_proveedor',
        'email_proveedor',
        'telefono_proveedor',
        'catalogo',
        'mantenimiento_recomendado',
        'condiciones_operacion',
        'observacion_fabricante',
        'medicion',
        'rango_uso',
        'resolucion',
        'exactitud',
        'fecha_calibracion',
        'fecha_verificacion',
        'patrones',
        'estandares',
        'regulaciones',
        'otras_caracteristicas',
        'garantia',
        'fecha_inicio',
        'fecha_fin',


    ];
    public function mantenimientos(): HasMany
    {
        return $this->hasMany(MantenimientoEquipoSst::class, 'id_equipo_fk', 'id_equipo');
    }

}
