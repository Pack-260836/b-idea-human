<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_code', 20)->unique();
            $table->string('user_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('sys_users')->nullOnDelete();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->foreignId('dept_id')->nullable()->constrained('departments')->nullOnDelete();
            $table->foreignId('position_id')->nullable()->constrained('positions')->nullOnDelete();
            $table->foreignId('time_work_id')->nullable()->constrained('time_work_configs')->nullOnDelete();
            $table->string('prefix_th', 20)->nullable();
            $table->string('prefix_en', 20)->nullable();
            $table->string('name_th', 255);
            $table->string('name_en', 255)->nullable();
            $table->enum('gender', ['M', 'F', 'Other']);
            $table->date('birthday')->nullable();
            $table->string('citizen_id', 13)->nullable();
            $table->string('nationality', 50)->default('ไทย');
            $table->enum('emp_type', ['fulltime', 'parttime', 'contract', 'daily'])->default('fulltime');
            $table->enum('emp_status', ['active', 'resigned', 'terminated'])->default('active');
            $table->date('start_date')->nullable();
            $table->date('resign_date')->nullable();
            $table->decimal('base_salary', 10, 2)->default(0);
            $table->enum('salary_type', ['monthly', 'daily', 'hourly'])->default('monthly');
            $table->string('bank_name', 100)->nullable();
            $table->string('bank_account', 20)->nullable();
            $table->string('photo_path')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
