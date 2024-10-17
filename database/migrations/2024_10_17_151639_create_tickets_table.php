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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');


            $table->foreignId('status_id')
                ->constrained('statuses')
                ->onDelete('cascade');


            $table->foreignId('priority_id')
                ->constrained('priorities')
                ->onDelete('cascade');


            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade');


            $table->foreignId('assigned_to')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');


            $table->foreignId('team_id')
                ->nullable()
                ->constrained('teams')
                ->onDelete('set null');


            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->onDelete('set null');


            $table->foreignId('channel_id')
                ->nullable()
                ->constrained('channels')
                ->onDelete('set null');

            $table->timestamp('due_date')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
