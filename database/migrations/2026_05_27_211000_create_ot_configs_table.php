<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtConfigsTable extends Migration
{
    public function up()
    {
        Schema::create('ot_configs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->enum('ot_type', ['weekday', 'weekend', 'holiday']);
            $table->decimal('rate_multiplier', 4, 2)->default(1.5);
            $table->decimal('max_hours_per_day', 4, 1)->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ot_configs');
    }
}
