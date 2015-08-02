<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecretsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secrets', function (Blueprint $table) {
            // IDs
            $table->increments('id');
            $table->text('uuid4');

            // Timestamps
            $table->timestamps();
            $table->timestamp('expires_at');

            // Views
            $table->bigInteger('count_views')->unsigned()->default(0);
            $table->bigInteger('expires_views')->unsigned()->default(1);

            // Secret
            $table->text('secret');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('secrets');
    }
}
