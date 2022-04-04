<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('name');
            $table->string('image')->nullable();
            $table->text('title');
            $table->text('title_cana');
            $table->text('actor');
            $table->text('genre');
            $table->integer('rating');
            $table->text('comment');
            $table->timestamp('c_stamp')->nullable();
            $table->timestamp('u_stamp')->nullable();
            $table->timestamp('d_stamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('review', function (Blueprint $table) {
            //
        });
    }
}
