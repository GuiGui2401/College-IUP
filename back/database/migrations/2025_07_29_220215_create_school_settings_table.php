<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('school_settings', function (Blueprint $table) {
            $table->id();
            $table->string('school_name')->default('COLLÈGE BILINGUE DE LA POINTE');
            $table->string('school_motto')->nullable();
            $table->text('school_address')->nullable();
            $table->string('school_phone')->nullable();
            $table->string('school_email')->nullable();
            $table->string('school_website')->nullable();
            $table->string('school_logo')->nullable();
            $table->string('currency', 10)->default('FCFA');
            $table->string('bank_name')->default('Banque Camerounaise');
            $table->string('country')->default('Cameroun');
            $table->string('city')->default('Bafoussam');
            $table->text('footer_text')->nullable();
            $table->date('scholarship_deadline')->nullable()->comment('Date limite pour bénéficier des bourses');
            $table->decimal('reduction_percentage', 5, 2)->default(5.00)->comment('Pourcentage de réduction pour anciens étudiants');
            $table->timestamps();
        });

        // Insérer les paramètres par défaut COBILANO
        DB::table('school_settings')->insert([
            'school_name' => 'COLLÈGE BILINGUE DE LA POINTE',
            'school_motto' => 'Excellence, Discipline, Innovation',
            'school_address' => 'Ndiengdam, à l\'entrée principale de Bafoussam (derrière l\'immeuble Afrique Construction), B.P. 1362 Bafoussam, Cameroun',
            'school_phone' => '+237 6 55 12 49 21 / +237 6 92 15 09 52',
            'school_email' => 'collegepointe2022@gmail.com',
            'school_website' => 'www.cobilano.cm',
            'currency' => 'FCFA',
            'bank_name' => 'Banque Camerounaise',
            'country' => 'Cameroun',
            'city' => 'Bafoussam',
            'footer_text' => 'Une pédagogie rénovée et participative • Une discipline rigoureuse et formatrice • Un encadrement moral et civique renforcé • Des résultats scolaires probants',
            'scholarship_deadline' => '2025-12-31',
            'reduction_percentage' => 5.00,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_settings');
    }
};
