<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cultivo');
            $table->string('variedad');
            $table->integer('cantidad_arboles');
            $table->decimal('area_lote', 8, 2);
            $table->date('fecha_creacion');
            $table->enum('estado', ['activo', 'inactivo','sembrado']); 
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lotes');
    }
}
