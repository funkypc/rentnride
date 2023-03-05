<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->timestamps();
            $table->bigInteger('setting_category_id')->unsigned()->nullable()->index();
            $table->foreign('setting_category_id')
                ->references('id')->on('setting_categories')
                ->onDelete('set null');
            $table->string('name');
            $table->text('value');
            $table->string('label');
            $table->text('description');
            $table->integer('display_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
