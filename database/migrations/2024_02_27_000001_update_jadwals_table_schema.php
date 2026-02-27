<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jadwals', function (Blueprint $table) {
            // Drop old date/time columns
            $table->dropColumn(['tanggal', 'waktu_mulai', 'waktu_selesai']);
        });

        Schema::table('jadwals', function (Blueprint $table) {
            // Add new merged datetime columns
            $table->datetime('waktu_mulai')->after('id');
            $table->datetime('waktu_selesai')->after('waktu_mulai');
            // Add new columns from spreadsheet
            $table->string('instansi')->nullable()->after('agenda');
            $table->string('status')->nullable()->after('instansi');
            $table->integer('jumlah_peserta')->nullable()->after('status');
            $table->string('no_surat')->nullable()->after('jumlah_peserta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->dropColumn(['waktu_mulai', 'waktu_selesai', 'instansi', 'status', 'jumlah_peserta', 'no_surat']);
        });

        Schema::table('jadwals', function (Blueprint $table) {
            $table->date('tanggal')->after('id');
            $table->time('waktu_mulai')->after('tanggal');
            $table->time('waktu_selesai')->after('waktu_mulai');
        });
    }
};
