<?php

use App\Models\Donation;
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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->enum('faculty',[
                "Biologi", "Ekonomi Bisnis", "Filsafat", "Fisipol", "Geografi", 
                "Hukum", "Ilmu Budaya", "Kedokteran", "Kedokteran Gigi", 
                "Kedokteran Hewan", "Kehutanan", "MIPA", "Pascasarjana", 
                "Pertanian", "Peternakan", "Psikologi", "Teknologi Pertanian", 
                "Vokasi","Lainnya","Kontributor"
              ]
              );
            $table->enum('status',['sudah','belum']);
            $table->foreignIdFor(Donation::class,'donation');
            $table->char('code',6)->nullable();
            $table->timestamps();
        });
        Schema::create('backups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->enum('faculty',[
                "Biologi", "Ekonomi Bisnis", "Filsafat", "Fisipol", "Geografi", 
                "Hukum", "Ilmu Budaya", "Kedokteran", "Kedokteran Gigi", 
                "Kedokteran Hewan", "Kehutanan", "MIPA", "Pascasarjana", 
                "Pertanian", "Peternakan", "Psikologi", "Teknologi Pertanian", 
                "Vokasi","Lainnya","Kontributor"
              ]
              );
            $table->foreignIdFor(Donation::class,'donation');
            $table->char('code',6)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
