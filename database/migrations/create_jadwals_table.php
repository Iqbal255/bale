<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // pastikan engine InnoDB (mendukung foreign keys)
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('hari')->nullable();
            // foreign keys stored as unsignedBigInteger to match $table->id() default
            $table->unsignedBigInteger('mata_kuliah_id')->nullable();
            $table->unsignedBigInteger('dosen_id')->nullable();
            $table->unsignedBigInteger('ruang_id')->nullable();
            $table->unsignedBigInteger('shift_id')->nullable();

            // waktu bisa disimpan sebagai time atau string; gunakan time jika ingin sort by time
            $table->time('waktu_mulai')->nullable();
            $table->time('waktu_selesai')->nullable();

            $table->text('keterangan')->nullable();
            $table->timestamps();

            // pastikan engine InnoDB
            $table->engine = 'InnoDB';
        });

        // Tambahkan foreign key constraints hanya jika tabel referensi sudah ada.
        // Ini mencegah "errno: 150" ketika urutan migrasi tidak tepat.
        if (Schema::hasTable('mata_kuliahs')) {
            Schema::table('jadwals', function (Blueprint $table) {
                $table->foreign('mata_kuliah_id')
                      ->references('id')->on('mata_kuliahs')
                      ->cascadeOnDelete();
            });
        }

        if (Schema::hasTable('dosens')) {
            Schema::table('jadwals', function (Blueprint $table) {
                $table->foreign('dosen_id')
                      ->references('id')->on('dosens')
                      ->cascadeOnDelete();
            });
        }

        if (Schema::hasTable('ruangs')) {
            Schema::table('jadwals', function (Blueprint $table) {
                $table->foreign('ruang_id')
                      ->references('id')->on('ruangs')
                      ->nullOnDelete();
            });
        }

        if (Schema::hasTable('shifts')) {
            Schema::table('jadwals', function (Blueprint $table) {
                $table->foreign('shift_id')
                      ->references('id')->on('shifts')
                      ->nullOnDelete();
            });
        }
    }

    public function down()
    {
        // drop constraints if exist, then drop table
        if (Schema::hasTable('jadwals')) {
            // attempt to drop foreign keys if they exist (safe)
            Schema::table('jadwals', function (Blueprint $table) {
                // use @ to silence if FK not present (but PHP doesn't support @ here),
                // so we check with DB before trying to drop names would be volatile.
                // Simpler: just drop table which will remove FKs as well.
            });

            Schema::dropIfExists('jadwals');
        }
    }
};
