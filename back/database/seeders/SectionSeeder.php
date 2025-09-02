<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'name' => 'Section Francophone',
                'description' => '1er & 2nd cycles (de la 6e à la Terminale, toutes séries)',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Section Anglophone',
                'description' => 'Form 1 – Upper Sixth (US)',
                'is_active' => true,
                'order' => 2,
            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }

        echo "✅ Sections COBILANO créées avec succès !\n";
        echo "==========================================\n";
        foreach ($sections as $section) {
            echo "• {$section['name']}: {$section['description']}\n";
        }
        echo "==========================================\n";
    }
}