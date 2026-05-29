<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->json('genres')->nullable()->after('sinopsis');
        });

        // logic ambil data lama
        $posts = DB::table('posts')->get();

        foreach ($posts as $post) {

            DB::table('posts')
                ->where('id', $post->id)
                ->update([
                    'genres' => json_encode([$post->genre])
                ]);
        }

        Schema::table('posts', function (Blueprint $table) {

            $table->dropColumn('genre');
        });

        Schema::table('posts', function (Blueprint $table) {

            $table->renameColumn('genres', 'genre');
        });
    }

    public function down(): void
    {
        //
    }
};
