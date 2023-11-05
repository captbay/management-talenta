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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // nama lengkap
            $table->string('nama');
            // NIDN
            $table->string('nidn')->nullable();
            // NIP
            $table->string('nip')->nullable();
            // kode dosen
            $table->string('kode_dosen')->nullable();
            // JFA
            $table->string('jfa')->nullable();
            // TMT JAD
            $table->date('tmt_jad')->nullable();
            // masa TMT JAD
            // $table->string('masa_tmt_jad'); // nanti pake for human dari tmt_jad sampe date now
            // golongan/inpassing
            $table->string('golongan')->nullable();
            // TMT inpassing
            $table->date('tmt_inpassing')->nullable();
            // masa TMT inpassing
            // $table->string('masa_tmt_inpassing'); // nanti pake for human dari tmt_inpassing sampe date now
            // no serdos
            $table->string('no_serdos')->nullable();
            // pendidikan terakhir
            $table->string('pendidikan_terakhir')->nullable();
            // jurusan pendidikan terakhir
            $table->string('jurusan_pendidikan_terakhir')->nullable();
            // universitas pendidikan terakhir
            $table->string('universitas_pendidikan_terakhir')->nullable();
            // kelompok keahlian
            $table->string('kelompok_keahlian')->nullable();
            // prodi
            $table->string('prodi')->nullable();
            // jenis kelamin
            $table->string('jenis_kelamin')->nullable();
            // status pegawai
            $table->string('status_pegawai')->nullable();
            // tanggal masuk
            $table->date('tanggal_masuk')->nullable();
            // masa kerja
            // $table->string('masa_kerja'); // nanti pake for human dari tanggal_masuk sampe date now
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
        Schema::dropIfExists('dosens');
    }
};
