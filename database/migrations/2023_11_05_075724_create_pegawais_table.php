<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // nama pegawai
            $table->string('nama');
            // nip
            $table->string('nip')->nullable();
            // jabatan fungsional
            $table->string('jabatan_fungsional')->nullable();
            // TMT jabatan fungsional
            $table->date('tmt_jabatan_fungsional')->nullable();
            // pendidikan terakhir
            $table->string('pendidikan_terakhir')->nullable();
            // unit kerja
            $table->string('unit_kerja')->nullable();
            // jenis kelamin
            $table->string('jenis_kelamin')->nullable();
            // status pegawai
            $table->string('status')->nullable();
            // tanggal masuk
            $table->date('tanggal_masuk')->nullable();
            // masa kerja
            // $table->string('masa_kerja'); //nanti pake for human dari tanggal masuk sampe date now
            // tempat lahir
            $table->string('tempat_lahir')->nullable();
            // tanggal lahir
            $table->date('tanggal_lahir')->nullable();
            // umur
            // $table->string('umur'); // nanti pake for human dari tanggal lahir sampe date now
            // email
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
