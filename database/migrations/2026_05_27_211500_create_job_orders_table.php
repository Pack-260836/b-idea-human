<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('job_orders', function (Blueprint $table) {
            $table->id();
            $table->string('job_no', 30)->unique();
            $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
            $table->string('job_title', 255);
            $table->text('job_detail')->nullable();
            $table->decimal('job_amount', 10, 2)->default(0);
            $table->date('assign_date');
            $table->date('due_date')->nullable();
            $table->enum('status', ['assigned', 'inprogress', 'done', 'cancelled'])->default('assigned');
            $table->text('remark')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_orders');
    }
}
