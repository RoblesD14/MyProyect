<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->after('id');
            $table->foreignId('empleado_id')->nullable()->constrained('empleados')->after('cliente_id');
            $table->dateTime('fservicio')->nullable()->after('empleado_id');
            $table->decimal('monto',16,2)->nullable()->after('fservicio');
            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->after('monto');
            $table->foreignId('user_id')->nullable()->constrained('users')->after('categoria_id');
            $table->string('descripcion',191)->nullable()->after('user_id');
            $table->string('formapago',191)->nullable()->after('descripcion');
            $table->dateTime('fpago')->nullable()->after('formapago');
            $table->unsignedTinyInteger('estado')->default(1)->after('fpago');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropForeign('servicios_cliente_id_foreign');
            $table->dropForeign('servicios_empleado_id_foreign');
            $table->dropForeign('servicios_categoria_id_foreign');
            $table->dropForeign('servicios_user_id_foreign');
            $table->dropColumn('cliente_id');
            $table->dropColumn('empleado_id');
            $table->dropColumn('fservicio');
            $table->dropColumn('monto');
            $table->dropColumn('categoria_id');
            $table->dropColumn('user_id');
            $table->dropColumn('descripcion');
            $table->dropColumn('formapago');
            $table->dropColumn('fpago');
            $table->dropColumn('estado');
        });
    }
}
