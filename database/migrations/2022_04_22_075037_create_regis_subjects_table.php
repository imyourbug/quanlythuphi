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
        Schema::create('regis_subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('MaMH');
            $table->string('MaSV');
            $table->timestamps();
            $table->primary(['MaMH', 'MaSV']);
            $table->foreign('MaMH')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('MaSV')->references('MaSV')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regis_subjects');
    }
};
