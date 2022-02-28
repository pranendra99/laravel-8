<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('pns')) {
            Schema::create('pns', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('pns_id')->unsigned();
                $table->char('gol', 5);
                $table->char('eselon', 5);
                $table->string('jabatan');
                $table->string('tempat_tugas');
                $table->set('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Kong Hu Cu']);
                $table->string('unit_kerja')->nullable();
                $table->integer('no_hp')->nullable();
                $table->integer('npwp')->nullable();
                $table->timestamps();
            });
        }
        
        Schema::table('pns', function (Blueprint $table) {
            $table->foreign('pns_id')->references('id')->on('user_pns')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pns');
    }
}
