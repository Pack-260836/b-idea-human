<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeWorkConfigsTable extends Migration
{
    public function up()
    {
        Schema::create('time_work_configs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->string('config_name', 100);
            $table->time('work_in');
            $table->time('work_out');
            $table->time('break_start')->nullable();
            $table->time('break_end')->nullable();
            $table->decimal('work_hours_per_day', 4, 2)->default(8);
            $table->tinyInteger('work_days_per_week')->default(5);
            $table->boolean('is_active')->default(true);
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('time_work_configs');
    }
}
