<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilletCaissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*   'user_id',
        'beneficiaire',
        'type',
        'devise',
        'moyen',
        'piece',
        'num_piece',
        'date',
        'total',
        'secteur_id', */
        Schema::create('billet_caisses', function (Blueprint $table) {
            $table->id();
            $table->string('beneficiaire');
            $table->string('devise');
            $table->date('date');
            $table->string('moyen');
            $table->string('type');
            $table->integer('total')->default('0');
            $table->string('piece')->nullable();
            $table->string('num_piece')->nullable();
            $table->string('description')->nullable();

            $table->unsignedBigInteger('secteur_id');
            $table->unsignedBigInteger('financement_id');
            $table->unsignedBigInteger('centre_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            $table->softDeletes();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('billet_caisses');
    }
}
