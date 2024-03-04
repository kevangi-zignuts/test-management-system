<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        \DB::statement("ALTER TABLE`results`
        DROP FOREIGN KEY `results_test_id_foreign`");

        \DB::statement("
        ALTER TABLE `results`
        ADD CONSTRAINT `results_test_id_foreign`
        FOREIGN KEY (`test_id`)
        REFERENCES `tests` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
        ");

        Schema::table('user_tests', function (Blueprint $table) {
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::statement("ALTER TABLE `results` DROP FOREIGN KEY `results_test_id_foreign`");

        \DB::statement("ALTER TABLE `results`
            ADD CONSTRAINT `results_test_id_foreign`
            FOREIGN KEY (`test_id`)
            REFERENCES `tests` (`id`)
            ON DELETE RESTRICT
            ON UPDATE RESTRICT
        ");

        Schema::table('user_tests', function (Blueprint $table) {
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade')->onUpdate('cascade');
        });
    }
};
