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
        Schema::table('raid_taxes', function (Blueprint $table) {
            //
            $table->text('mythic_1')->after('body_1')->nullable();
            $table->text('mythic_2')->after('body_2')->nullable();
            $table->text('mythic_3')->after('body_3')->nullable();
            $table->text('mythic_4')->after('body_4')->nullable();
            $table->text('mythic_5')->after('body_5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('raid_taxes', function (Blueprint $table) {
            //
            $table->dropColumn('mythic_1');
            $table->dropColumn('mythic_2');
            $table->dropColumn('mythic_3');
            $table->dropColumn('mythic_4');
            $table->dropColumn('mythic_5');
        });
    }
};
