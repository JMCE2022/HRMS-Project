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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->tinyInteger('user_type');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('lastname', 255);
            $table->string('middlename', 30);
            $table->enum('suffix', ['Jr.','Sr.','I','II','III'])->nullable();
            $table->enum('sex', ['Male','Female','Other']);
            $table->integer('age')->default(18);
            $table->date('birth_date')->nullable();
            $table->string('phonenumber', 20);
            $table->enum('department', ['Department 1','Department 2','Department 3','Department 4','Department 5','Department 6','Department 7']);
            $table->enum('position', ['Position 1','Position 2','Position 3','Position 4','Position 5','Position 6','Position 7','Position 8','Position 9','Position 10']);
            $table->decimal('daily_rate', 10, 2);
            $table->decimal('credit', 10, 2)->default(0.00);
            $table->string('custom_id', 20)->nullable();
            $table->date('end_of_contract')->nullable();
            $table->enum('is_archive', ['1','2'])->default('1');
            $table->datetime('date_archive')->nullable();
            $table->enum('civil_status', ['Single','Married','Widowed'])->nullable();
            $table->text('fulladdress')->nullable();
            $table->string('emergency_fullname', 255)->nullable();
            $table->text('emergency_fulladdress')->nullable();
            $table->string('emergency_phonenumber', 20)->nullable();
            $table->string('emergency_relationship', 50)->nullable();
            $table->string('profile_pic', 255)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
