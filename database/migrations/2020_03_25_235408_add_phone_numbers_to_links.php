<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneNumbersToLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->string('url')->nullable()->change();
            $table->string('phone')->nullable()->after('url');
            $table->string('phone_string')->nullable()->after('url');
            $table->boolean('phone_is_primary')->default(false)->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->string('url')->nullable()->change();
            $table->dropColumn('phone');
            $table->dropColumn('phone_string');
            $table->dropColumn('phone_is_primary');
        });
    }
}
