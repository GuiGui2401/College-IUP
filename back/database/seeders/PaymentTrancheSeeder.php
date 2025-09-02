<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentTranche;

class PaymentTrancheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tranches = [
            [
                'name' => 'Frais d\'inscription',
                'description' => 'Frais d\'inscription annuelle - 3 500 FCFA',
                'order' => 1,
                'is_active' => true
            ],
            [
                'name' => '1ère Tranche',
                'description' => 'Première tranche de scolarité',
                'order' => 2,
                'is_active' => true
            ],
            [
                'name' => '2ème Tranche',
                'description' => 'Deuxième tranche de scolarité',
                'order' => 3,
                'is_active' => true
            ],
            [
                'name' => '3ème Tranche',
                'description' => 'Troisième tranche de scolarité',
                'order' => 4,
                'is_active' => true
            ],
            [
                'name' => 'Livret médical',
                'description' => 'Frais pour le livret médical - 1 000 FCFA',
                'order' => 5,
                'is_active' => true
            ]
        ];

        foreach ($tranches as $tranche) {
            PaymentTranche::create($tranche);
        }

        echo "✅ Tranches de paiement COBILANO créées avec succès !\n";
        echo "==========================================\n";
        echo "• Frais d'inscription: 3 500 FCFA\n";
        echo "• 1ère Tranche: Variable selon le niveau\n";
        echo "• 2ème Tranche: Variable selon le niveau\n";
        echo "• 3ème Tranche: Variable selon le niveau\n";
        echo "• Livret médical: 1 000 FCFA\n";
        echo "==========================================\n";
    }
}