<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_code', 25)->unique();
            $table->string('company_name_th', 255);
            $table->string('company_name_en', 255)->nullable();
            $table->string('tax_id', 13)->nullable();
            $table->text('address')->nullable();
            $table->string('tel', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('logo_path')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
