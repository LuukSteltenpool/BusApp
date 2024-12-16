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
        Schema::disableForeignKeyConstraints(); // tijdelijk uitzetten zodat festival table gemaakt kan worden, hierdoor zit er geen null.
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->dateTime('Leaves_at');
            $table->dateTime('Arrives_at');
            $table->integer('ticket_price');
            $table->unsignedBigInteger('festival_id'); //foreign key festival
            $table->timestamps();



            $table->foreign('festival_id')
                ->references('id')
                ->on('festivals')
                ->onDelete('cascade'); // If a festival is deleted, its buses are also deleted
        });
        Schema::enableForeignKeyConstraints(); // Re-enable constraints
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
