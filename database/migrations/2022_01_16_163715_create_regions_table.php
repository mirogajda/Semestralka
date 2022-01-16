<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('regions', function (Blueprint $table) {
            $table->string('tag', 20);
            $table->string('name', 20);
        });
        DB::table('regions')->insert(array(
            array('tag' => 'bratislavky', 'name' => 'Bratislavký'),
            array('tag' => 'trnavsky', 'name' => 'Trnavský'),
            array('tag' => 'trenciansky', 'name' => 'Trenčiansky'),
            array('tag' => 'nitriansky', 'name' => 'Nitriansky'),
            array('tag' => 'zilinsky', 'name' => 'Žilinský'),
            array('tag' => 'banskobystricky', 'name' => 'Banskobystrický'),
            array('tag' => 'presovsky', 'name' => 'Prešovský'),
            array('tag' => 'kosicky', 'name' => 'Košický'),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
