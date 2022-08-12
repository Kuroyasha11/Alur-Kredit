<?php

use App\Models\Applicant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Applicant::class);
            $table->string('nik')->unique();
            $table->bigInteger('gaji')->nullable();
            $table->bigInteger('biaya')->nullable();
            $table->bigInteger('kewajiban')->nullable();
            $table->bigInteger('plafon')->nullable();
            $table->integer('tenor')->nullable();
            $table->integer('angsuran')->nullable();
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
        Schema::dropIfExists('analysts');
    }
};
