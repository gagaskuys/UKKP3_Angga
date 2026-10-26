<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->string('kategori')->nullable()->after('kategori_id');
        });

        $kategori = DB::table('kategori')->pluck('nama_kategori', 'id');

        foreach (DB::table('pengaduan')->whereNotNull('kategori_id')->get(['id', 'kategori_id']) as $pengaduan) {
            if ($kategori->has($pengaduan->kategori_id)) {
                DB::table('pengaduan')->where('id', $pengaduan->id)->update([
                    'kategori' => $kategori[$pengaduan->kategori_id],
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};