<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateReceptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('reception')) {
            return;
        }

        Schema::create('reception', function (Blueprint $table) {
            $table->id();
            $table->uuid('object_id');
            $table->uuid('card_id');
            $table->timestamp('entry_date');
            $table->timestamps();
        });

        // Manually define indexes.
        Schema::table('reception', function (Blueprint $table) {
            $table->index(['object_id'], 'object_index')->change();
            $table->index(['card_id'], 'card_index')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('reception');
    }
}
