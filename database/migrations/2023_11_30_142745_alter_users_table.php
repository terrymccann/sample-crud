<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('name');
            $table->integer('account_id')->index();
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->boolean('owner')->default(false);
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
        Schema::table('users', function($table) {
            $table->dropColumn('account_id');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('owner');
        });
    }
};
