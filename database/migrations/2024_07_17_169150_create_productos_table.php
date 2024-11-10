<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idclase')->nullable();
            $table->unsignedBigInteger('idmarca')->nullable();
            $table->unsignedBigInteger('idmodelo')->nullable();
            $table->unsignedBigInteger('idunidadmedida')->nullable();
            $table->unsignedBigInteger('idproveedor');
            $table->tinyInteger('es_servicio')->default(0);
            $table->string('codigo', 20)->unique();
            $table->string('codigo_bar', 20)->nullable();
            $table->string('codigo_fab', 20)->nullable();
            $table->text('articulo');
            $table->text('serie')->nullable();
            $table->string('tipo', 1)->nullable();
            $table->integer('stock_min')->nullable();
            $table->integer('stock_max')->nullable();
            $table->double('precio_con', 15, 6);
            $table->double('precio_may1', 15, 6)->nullable();
            $table->double('precio_may2', 15, 6)->nullable();
            $table->double('precio_may3', 15, 6)->nullable();
            $table->string('moneda', 3)->default('PEN');
            $table->double('peso', 9, 4)->nullable();
            $table->tinyInteger('afectoigv')->default(1);
            $table->double('descuento', 5, 2)->nullable();
            $table->double('utilidad', 5, 2)->nullable();
            $table->string('foto', 255)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('ubicacion', 48)->nullable();
            $table->double('precio_cos', 15, 6)->nullable();
            $table->double('stock', 10, 3)->nullable();
            $table->tinyInteger('pesable')->nullable();
            $table->tinyInteger('lotes')->nullable();
            $table->tinyInteger('series')->nullable();
            $table->tinyInteger('almacen')->nullable();
            $table->tinyInteger('exonerado')->nullable();
            $table->string('pais', 15)->nullable();
            $table->string('codfam', 6)->nullable();
            $table->string('tipo_existe', 2)->nullable();
            $table->date('fecha_vto')->nullable();
            $table->tinyInteger('contieneigv')->default(0);
            $table->tinyInteger('usa_lotes')->default(0);
            $table->integer('estado')->default(1);
            $table->timestamps();
            $table->foreign('idclase')->references('id')->on('clases');
            $table->foreign('idmarca')->references('id')->on('marcas');
            $table->foreign('idmodelo')->references('id')->on('modelos');
            $table->foreign('idunidadmedida')->references('id')->on('unidades_medida');
            $table->foreign('idproveedor')->references('id')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
