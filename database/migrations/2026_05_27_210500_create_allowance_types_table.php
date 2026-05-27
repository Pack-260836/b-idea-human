<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowanceTypesTable extends Migration
{
    public function up()
    {
        Schema::create('allowance_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->string('allowance_code', 20)->unique();
            $table->string('allowance_name', 255);
            $table->enum('calc_type', ['fixed', 'percent'])->default('fixed');
            $table->decimal('default_amount', 10, 2)->default(0);
            $table->boolean('taxable')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('allowance_types');
    }
}
