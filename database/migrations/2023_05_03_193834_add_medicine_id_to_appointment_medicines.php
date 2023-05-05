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
        Schema::table('appointment_medicines', function (Blueprint $table) {
            //if medicine_id does not exist, add it with references from medicine_inventory table
            if (!Schema::hasColumn('appointment_medicines', 'medicine_id')) {
                $table->foreignId('medicine_id')->references('id')->on('medicine_inventories')->cascadeOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment_medicines', function (Blueprint $table) {
            $table->dropColumn('medicine_id');
        });
    }
};
