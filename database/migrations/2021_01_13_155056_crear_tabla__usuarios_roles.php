<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuariosRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Roles_Usuarios', function (Blueprint $table) {
            $table->integer('Rol_Id');
            $table->unsignedBigInteger('Usuario_Id');
            $table->foreign('Rol_Id', 'fk_RolesUsuarios_Roles')->references('Rol_Id')->on('Roles')->onDelete('no action')->onUpdate('no action');
            $table->foreign('Usuario_Id', 'fk_RolesUsuarios_Usuarios')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Roles_Usuarios');
    }
}
