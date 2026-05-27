<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollPeriodsTable extends Migration
{
    public function up()
    {
        Schema::create('payroll_periods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->year('period_year');
            $table->tinyInteger('period_month')->unsigned();
            $table->string('period_name', 100);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['draft', 'processing', 'approved', 'paid'])->default('draft');
            $table->unsignedBigInteger('processed_by')->nullable();
            $table->dateTime('processed_at')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
            $table->unique(['company_id', 'period_year', 'period_month']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('payroll_periods');
    }
}
