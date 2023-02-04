<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaccess', function (Blueprint $table) {
            $table->id();
            $table->integer("jabatan_id");
            $table->string("master");
            $table->boolean("create");
            $table->boolean("read");
            $table->boolean("update");
            $table->boolean("delete");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jaccess');
    }
}
