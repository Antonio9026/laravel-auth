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
        Schema::table('projects', function (Blueprint $table) {

            // crea la nuova colonna di tipo unsignedBigInteger 
           $table->unsignedBigInteger("type_id")->nullable()->after("id");
        //    rendo la colonna type_id una foreign key che fa riferimento alla colonna id della tabella projects
           $table->foreign("type_id")->references("id")->on("projects")->onDelete("cascade");
           

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // rimuove la foreing key tramite l'id
            $table->dropForeign("projects_type_id_foreign");
            // rimuove la colonna type_id
            $table->dropColumn("type_id");
        });
    }
};
