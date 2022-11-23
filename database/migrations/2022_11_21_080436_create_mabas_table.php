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
        Schema::create('mabas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->nullable();
            $table->string('no_reg')->unique();
            $table->string('nama');
            $table->string('jk');
            $table->string('tl');
            $table->string('ttl');
            $table->string('agama');
            $table->string('alamat');
            $table->string('tlp');
            $table->string('asal_sekolah');
            $table->string('jurusan');
            $table->string('pk');
            $table->string('prodi');
            $table->string('email')->unique();
            $table->string('ukuran_baju');
            $table->string('photo');
            $table->string('angkatan');
            $table->boolean('terbayar')->default(false);
            $table->boolean('terima')->default(false);
            $table->text('bukti')->nullable();
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
        Schema::dropIfExists('mabas');
    }
};
