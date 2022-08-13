<?php

use App\Models\Analyst;
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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->text('alamat');
            $table->string('status');
            $table->string('namainstansi');
            $table->string('alamatinstansi');
            $table->string('jabatan');
            $table->boolean('submitmarketing')->default(false);
            $table->boolean('submitanalis')->default(false);
            $table->boolean('selesaimanajer')->default(false);
            $table->boolean('selesaidirut')->default(false);
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
        Schema::dropIfExists('applicants');
    }
};
