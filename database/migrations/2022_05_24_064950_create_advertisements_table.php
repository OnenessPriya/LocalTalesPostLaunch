<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('business_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('page')->nullable();
            $table->string('slot_id')->nullable();
            $table->string('image')->nullable();
            $table->string('redirect_link')->nullable();
            $table->string('target_postcode')->nullable();
            $table->string('target_city')->nullable();
            $table->string('target_state')->nullable();
            $table->bigInteger('click_count')->default(0);
            $table->tinyInteger('status')->comment('1: active, 0: inactive')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
