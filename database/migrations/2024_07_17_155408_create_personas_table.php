<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idtipopersona')->nullable();
            $table->tinyInteger('tipodoc')->default(1);
            $table->string('documento', 20);
            $table->string('nombre', 120);
            $table->string('ubigeo', 6)->nullable();
            $table->string('codigo', 20)->nullable();
            $table->string('contacto', 30)->nullable();
            $table->string('giro', 35)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->string('ciudad', 40)->nullable();
            $table->text('referencia')->nullable();
            $table->string('idzona', 15)->nullable();
            $table->string('telefono1', 35)->nullable();
            $table->string('telefono2', 35)->nullable();
            $table->string('celular', 20);
            $table->string('email', 60);
            $table->text('observacion')->nullable();
            $table->double('credito', 15, 2)->default(0);
            $table->integer('lista')->nullable();
            $table->string('direccion2', 200)->nullable();
            $table->date('fecha_reg')->nullable();
            $table->tinyInteger('idvendedor')->nullable();
            $table->integer('puntos')->nullable();
            $table->string('pais', 30)->nullable();
            $table->tinyInteger('dia')->default(0);
            $table->string('vehiculo', 40)->nullable();
            $table->string('placa', 10)->nullable();
            $table->string('canal', 10)->nullable();
            $table->integer('idcontato')->nullable();
            $table->integer('ciclo_venta')->nullable();
            $table->date('fecha_cum')->nullable();
            $table->string('email2', 255)->nullable();
            $table->double('deuda', 15, 6)->default(0);
            $table->integer('estado')->default(1);
            $table->timestamps();
            $table->foreign('idtipopersona')->references('id')->on('tipos_persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
