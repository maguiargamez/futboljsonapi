<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('home_team_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('home_team', 255);
            $table->foreignId('away_team_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('away_team', 255);
            $table->string('score', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
