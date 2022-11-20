<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raid_taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('raid_tax_category_id')->unsigned();
            $table->string('title_1');
            $table->text('body_1');
            $table->string('file_path_1')->nullable();
            $table->string('title_2')->nullable();
            $table->text('body_2')->nullable();
            $table->string('file_path_2')->nullable();
            $table->string('title_3')->nullable();
            $table->text('body_3')->nullable();
            $table->string('file_path_3')->nullable();
            $table->string('title_4')->nullable();
            $table->text('body_4')->nullable();
            $table->string('file_path_4')->nullable();
            $table->string('title_5')->nullable();
            $table->text('body_5')->nullable();
            $table->string('file_path_5')->nullable();
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
        Schema::dropIfExists('raid_taxes');
    }
};
