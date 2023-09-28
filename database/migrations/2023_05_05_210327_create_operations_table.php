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
            $table->unsignedBigInteger('user_id');
            $table->date('libelle', 300);
            $table->date('secteur_id', 300);
            $table->date('financement_id', 300);
            $table->date('centre_id', 300);
            $table->date('devise', 300);
            $table->date('date', 300);
            $table->string('type', 300);
            $table->string('montant', 300);
            $table->string('beneficiaire', 300);
            $table->string('description', 300)->nullable();
            $table->string('status', 300)->default('encours');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->unUpdate('restrict');

            $table->foreign('secteur_id')
                ->references('id')
                ->on('secteurs')
                ->onDelete('restrict')
                ->unUpdate('restrict');

            $table->foreign('financement_id')
                ->references('id')
                ->on('financements')
                ->onDelete('restrict')
                ->unUpdate('restrict');

            $table->foreign('centre_id')
                ->references('id')
                ->on('centres')
                ->onDelete('restrict')
                ->unUpdate('restrict');

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
