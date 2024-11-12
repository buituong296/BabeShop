<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('type'); // Type of notification (e.g., 'info', 'warning', etc.)
            $table->text('message'); // The notification message
            $table->unsignedBigInteger('user_id')->nullable(); // ID of the user the notification is for (can be nullable)
            $table->boolean('is_read')->default(false); // Status to check if the notification is read
            $table->timestamps(); // Created at and updated at timestamps

            // Add a foreign key if needed, for example:
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
