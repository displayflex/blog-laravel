<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsRolesPivotTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permission_role', function (Blueprint $table) {
			$table->integer('permission_id')
				->unsigned()
				->nullable();
			$table->foreign('permission_id')
				->references('id')
				->on('permissions')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->integer('role_id')
				->unsigned()
				->nullable();
			$table->foreign('role_id')
				->references('id')
				->on('roles')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('permission_role');
	}
}
