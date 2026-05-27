<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_users', function (Blueprint $table) {
            $table->string('user_id')->primary();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('prefix_th')->nullable();
            $table->string('prefix_en')->nullable();
            $table->string('name_th')->nullable();
            $table->string('name_en')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->string('citizen_id')->nullable();
            $table->string('nationality_id')->nullable();
            $table->string('emp_type')->nullable();
            $table->string('emp_work_status')->nullable();
            $table->date('start_date')->nullable();
            $table->decimal('wage_value', 10, 2)->nullable();
            $table->tinyInteger('emp_level')->default(3); // 1=admin, 2=chief, 3=user
            $table->timestamp('last_login_at')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('sys_users');
    }
}
