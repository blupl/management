<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBcbManagementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bcb_managements', function(Blueprint $table)
		{
			$table->increments('id');
            $table->tinyInteger('user_id');
            $table->string('name');
            $table->string('gender');
            $table->string('role');
            $table->string('department');
            $table->string('organization');
            $table->string('mobile');
            $table->string('personal_id');
            $table->string('email');
            $table->string('present_address1');
            $table->string('present_address2')->nullable();
            $table->string('present_district');
            $table->string('present_zip');
            $table->string('permanent_address1');
            $table->string('permanent_address2')->nullable();
            $table->string('permanent_district');
            $table->string('permanent_zip');
            $table->string('workstation');
            $table->string('card_collection_point');
            $table->string('photo');
            $table->string('attachment');
            $table->tinyInteger('status')->default('0');
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
		Schema::drop('bcb_managements');
	}

}
