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
        Schema::table('users', function (Blueprint $table) {
            // Add the 'lastname' column first if it doesn't exist
            if (!Schema::hasColumn('users', 'lastname')) {
                $table->string('lastname')->after('name');
            }

            $table->string('middlename', 30)->after('lastname');
            $table->integer('suffix')->after('middlename')->nullable();
            $table->enum('sex', ['Male', 'Female', 'Other'])->after('suffix');
            $table->integer('age')->after('sex')->nullable()->default(18);
            $table->date('birth_date')->after('age')->nullable();
            $table->string('phonenumber', 20)->after('birth_date');
            $table->integer('department')->after('phonenumber');
            $table->decimal('daily_rate', 10, 2)->after('department')->default(0.00);
            $table->decimal('credit', 10, 2)->after('daily_rate')->default(0.00);
            $table->string('custom_id', 20)->after('credit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['middlename', 'suffix', 'sex', 'age', 'birth_date', 'phonenumber', 'department', 'daily_rate', 'credit', 'custom_id']);
        });
    }
};
