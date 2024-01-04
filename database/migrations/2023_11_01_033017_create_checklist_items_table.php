<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistItemsTable extends Migration
{
    public function up()
    {
        Schema::create('checklist_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('unit_id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('stars')->nullable();
            $table->string('description');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();

            $table->foreign('unit_id')->references('iid')->on('skills_checklist_unit');
        });
    }

    public function down()
    {
        Schema::dropIfExists('checklist_items');
    }
}