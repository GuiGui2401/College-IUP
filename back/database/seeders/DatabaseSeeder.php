<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SchoolYear;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Données pour le Collège Bilingue de la Pointe (COBILANO)
     * Situé à Ndiengdam, Bafoussam - Cameroun
     */
    public function run(): void
    {
        echo "🏫 INITIALISATION DE LA BASE DE DONNÉES COBILANO\n";
        echo "================================================\n";
        echo "Collège Bilingue de la Pointe (COBILANO)\n";
        echo "Ndiengdam - Bafoussam, Cameroun\n";
        echo "B.P. 1362 - collegepointe2022@gmail.com\n";
        echo "================================================\n\n";

        $this->call([
            UserSeeder::class,
            SectionSeeder::class,          // Sections Francophone & Anglophone
            PaymentTrancheSeeder::class,   // Inscription, 3 tranches + livret médical
            LevelSeeder::class,            // 6ème-Tle (FR) + Form1-US (EN)
            SchoolClassSeeder::class,      // Classes avec barème 2023-2024
            SchoolYearSeeder::class,       // Année scolaire 2025-2026
            TeacherAttendanceSeeder::class, // Présences des enseignants
        ]);

        echo "\n✅ BASE DE DONNÉES COBILANO INITIALISÉE AVEC SUCCÈS !\n";
        echo "================================================\n";
        echo "📋 RÉSUMÉ DES DONNÉES CRÉÉES:\n";
        echo "• 2 Sections: Francophone + Anglophone\n";
        echo "• 12 Niveaux: 6ème→Tle + Form1→US\n";
        echo "• 5 Tranches de paiement\n";
        echo "• Barème scolarité 2023-2024 appliqué\n";
        echo "• Équipe pédagogique bilingue\n";
        echo "• Système de présence enseignants\n";
        echo "================================================\n";
        echo "🎯 OBJECTIFS COBILANO:\n";
        echo "• Pédagogie rénovée et participative\n";
        echo "• Discipline rigoureuse et formatrice\n";
        echo "• Encadrement moral et civique renforcé\n";
        echo "• Résultats scolaires probants\n";
        echo "• Salle multimédia connectée Internet\n";
        echo "• Cours de remise à niveau gratuits\n";
        echo "================================================\n\n";
    }
}
