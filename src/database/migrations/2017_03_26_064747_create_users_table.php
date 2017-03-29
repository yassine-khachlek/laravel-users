<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( ! Schema::hasTable('users') ) {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
            });
        }

        Schema::table('users', function (Blueprint $table) {

            if (!Schema::hasColumn($table->getTable(), 'name')) {
                $table->string('name', 191);
            }

            if (!Schema::hasColumn($table->getTable(), 'email')) {
                $table->string('email', 191)->unique();
            }

            if (!Schema::hasColumn($table->getTable(), 'password')) {
                $table->string('password', 191);
            }

            if (!Schema::hasColumn($table->getTable(), 'remember_token')) {
                $table->string('remember_token', 100)->nullable();
            }

            if ( ! Schema::hasColumn($table->getTable(), 'created_at') ) {
                $table->dateTime('created_at');
            }

            if ( ! Schema::hasColumn($table->getTable(), 'updated_at') ) {
                $table->timestamp('updated_at');
            }

            if ( ! Schema::hasColumn($table->getTable(), 'deleted_at') ) {
                $table->dateTime('deleted_at')->nullable();
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('users');
    }
}
