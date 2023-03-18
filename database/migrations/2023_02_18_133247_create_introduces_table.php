<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
/**
 * Class CreateIntroducePeoplesTable.
 */
class CreateIntroducesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('introduces', function(Blueprint $table) {
            $table->id();
            $table->integer('category_id')->default(0);
            $table->string('title');
            $table->string('description');
            $table->tinyInteger('status');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('introduces');
	}
}
