<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtraAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_accessories', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->timestamps();
            $table->string('name')->index();
            $table->string('slug');
            $table->string('short_description');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('extra_accessories');
    }
}
