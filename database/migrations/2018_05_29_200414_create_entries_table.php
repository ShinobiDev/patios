  <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa',6)->unique();
            $table->string('direccion');
            $table->string('comparendo')->nullable();
            $table->string('color');
            $table->string('marca');
            $table->string('tipo');
            $table->string('causal');
            $table->string('grado')->nullable();
            $table->string('motor');
            $table->string('fisico')->nullable();
            $table->string('servicio');
            $table->string('rate_id');
            $table->string('crane_id');
            $table->string('recibe');
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
        Schema::dropIfExists('entries');
    }
}
