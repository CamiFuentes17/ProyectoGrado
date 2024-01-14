<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('status')->nullable();
            $table->string('area')->nullable();
            $table->string('requisition_type',60)->nullable();
            $table->string('deliverable_type',60)->nullable();
            $table->date('deliverable_date')->nullable();
            $table->string('safety_approval_file')->nullable();
            $table->string('safety_approval_file_detail')->nullable();
            $table->tinyInteger('periodicity')->nullable();
            $table->text('description')->nullable();
            $table->boolean('active')->default(1);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('requisitions');
    }
}
