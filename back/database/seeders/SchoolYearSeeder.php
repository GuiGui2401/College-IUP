<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SchoolYear;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "📅 Création des années scolaires COBILANO...\n";
        
        // Années scolaires pour COBILANO
        $schoolYears = [
            [
                'name' => '2023-2024',
                'start_date' => '2023-09-01',
                'end_date' => '2024-07-31',
                'is_current' => false,
                'is_active' => true
            ],
            [
                'name' => '2024-2025',
                'start_date' => '2024-09-01',
                'end_date' => '2025-07-31',
                'is_current' => false,
                'is_active' => true
            ],
            [
                'name' => '2025-2026',
                'start_date' => '2025-09-01',
                'end_date' => '2026-07-31',
                'is_current' => true,
                'is_active' => true
            ],
            [
                'name' => '2026-2027',
                'start_date' => '2026-09-01',
                'end_date' => '2027-07-31',
                'is_current' => false,
                'is_active' => false
            ]
        ];

        foreach ($schoolYears as $year) {
            SchoolYear::updateOrCreate(
                ['name' => $year['name']],
                $year
            );
        }

        echo "✅ Années scolaires créées avec succès !\n";
        echo "==========================================\n";
        foreach ($schoolYears as $year) {
            $status = $year['is_current'] ? '✅ ACTUELLE' : ($year['is_active'] ? '📝 Active' : '⏸️ Inactive');
            echo "• {$year['name']}: {$year['start_date']} → {$year['end_date']} {$status}\n";
        }
        echo "==========================================\n";
    }
}
