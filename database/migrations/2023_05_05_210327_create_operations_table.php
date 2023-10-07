<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('devise', 300);
            $table->date('date');
            $table->string('moyen', 300);
            $table->string('type', 300);
            $table->integer('montant'); // Remove 300, as integers do not have a length.
            $table->string('beneficiaire', 300);
            $table->string('description', 300)->nullable();
            $table->unsignedBigInteger('secteur_id');
            $table->unsignedBigInteger('financement_id');
            $table->unsignedBigInteger('centre_id');
            $table->unsignedBigInteger('user_id');
            $table->string('status', 300)->default('encours');

            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
