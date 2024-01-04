<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skills_checklist_item', function (Blueprint $table) {
            $table->id('iid');
            $table->string('item_name');
            $table->string('item_slug');
            // Add the 'cid' column as an unsigned big integer
            $table->unsignedBigInteger('cid')->nullable();
            // Define the foreign key constraint for 'cid'
            $table->foreign('cid')
                ->references('id')
                ->on('skills_checklist')
                ->onDelete('cascade'); // Specify the desired onDelete behavior

            $table->string('description');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills_checklist_item');
    }
};
