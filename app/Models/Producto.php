<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idclase',
        'idmarca',
        'idmodelo',
        'idunidadmedida',
        'idproveedor',
        'es_servicio',
        'codigo',
        'codigo_bar',
        'codigo_fab',
        'articulo',
        'serie',
        'tipo',
        'stock_min',
        'stock_max',
        'precio_con',
        'precio_may1',
        'precio_may2',
        'precio_may3',
        'moneda',
        'peso',
        'afectoigv',
        'descuento',
        'utilidad',
        'foto',
        'descripcion',
        'ubicacion',
        'precio_cos',
        'stock',
        'pesable',
        'lotes',
        'series',
        'almacen',
        'exonerado',
        'pais',
        'codfam',
        'tipo_existe',
        'fecha_vto',
        'contieneigv',
        'usa_lotes',
        'estado',
    ];
}
