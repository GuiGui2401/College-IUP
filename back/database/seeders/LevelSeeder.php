<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Section;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer les sections existantes
        $sections = Section::all();

        foreach ($sections as $section) {
            switch ($section->name) {
                case 'Section Francophone':
                    $levels = [
                        // 1er Cycle
                        ['name' => '6ème', 'order' => 1, 'cycle' => '1er Cycle'],
                        ['name' => '5ème', 'order' => 2, 'cycle' => '1er Cycle'],
                        ['name' => '4ème', 'order' => 3, 'cycle' => '1er Cycle'],
                        ['name' => '3ème', 'order' => 4, 'cycle' => '1er Cycle'],
                        // 2nd Cycle
                        ['name' => '2nde', 'order' => 5, 'cycle' => '2nd Cycle'],
                        ['name' => 'Terminale', 'order' => 6, 'cycle' => '2nd Cycle']
                    ];
                    break;
                case 'Section Anglophone':
                    $levels = [
                        ['name' => 'Form 1', 'order' => 1, 'cycle' => 'Lower Secondary'],
                        ['name' => 'Form 2', 'order' => 2, 'cycle' => 'Lower Secondary'],
                        ['name' => 'Form 3', 'order' => 3, 'cycle' => 'Lower Secondary'],
                        ['name' => 'Form 4', 'order' => 4, 'cycle' => 'Lower Secondary'],
                        ['name' => 'Form 5', 'order' => 5, 'cycle' => 'Upper Secondary'],
                        ['name' => 'Upper Sixth', 'order' => 6, 'cycle' => 'Upper Secondary']
                    ];
                    break;
                default:
                    $levels = [];
            }

            foreach ($levels as $levelData) {
                Level::create([
                    'name' => $levelData['name'],
                    'section_id' => $section->id,
                    'description' => "Niveau {$levelData['name']} - {$levelData['cycle']} ({$section->name})",
                    'order' => $levelData['order'],
                    'is_active' => true
                ]);
            }
        }

        echo "✅ Niveaux CBP créés avec succès !\n";
        echo "==========================================\n";
        echo "Section Francophone:\n";
        echo "• 1er Cycle: 6ème, 5ème, 4ème, 3ème\n";
        echo "• 2nd Cycle: 2nde, Terminale (toutes séries)\n";
        echo "\nSection Anglophone:\n";
        echo "• Lower Secondary: Form 1, Form 2, Form 3, Form 4\n";
        echo "• Upper Secondary: Form 5, Upper Sixth\n";
        echo "==========================================\n";
    }
}