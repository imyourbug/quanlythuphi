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
        Schema::create('students', function (Blueprint $table) {
            $table->string('MaSV');
            $table->string('TenSV');
            $table->integer('GioiTinh');
            $table->date('NgaySinh');
            $table->unsignedBigInteger('MaDT');
            $table->string('Lop');
            $table->timestamps();
            $table->primary('MaSV');
            $table->foreign('Lop')->references('MaLop')->on('lops')->onDelete('cascade');
            $table->foreign('MaDT')->references('id')->on('discounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
