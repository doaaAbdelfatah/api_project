<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('certificate_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('mobile');
            $table->string('img')->default("images/customers/default.png");

            $table->enum("type",["Individual","Corporate"])->nullable();
            $table->text("comments")->nullable();

            $table->unsignedBigInteger("created_by")->nullable();
            $table->foreign("created_by")->references("id")->on("users");
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
        Schema::dropIfExists('customers');
    }
}
