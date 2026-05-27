<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesheetsTable extends Migration
{
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
            $table->date('work_date');
            $table->time('check_in_1')->nullable();
            $table->time('check_out_1')->nullable();
            $table->time('check_in_2')->nullable();
            $table->time('check_out_2')->nullable();
            $table->decimal('total_work_hours', 4, 2)->default(0);
            $table->decimal('ot_hours', 4, 2)->default(0);
            $table->decimal('ot_extra_hours', 4, 2)->default(0);
            $table->integer('late_minutes')->default(0);
            $table->integer('early_leave_minutes')->default(0);
            $table->enum('status', ['normal', 'late', 'absent', 'leave', 'holiday'])->default('normal');
            $table->text('remark')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
            $table->unique(['employee_id', 'work_date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
}
