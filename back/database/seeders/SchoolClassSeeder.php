<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SchoolClass;
use App\Models\ClassSeries;
use App\Models\ClassPaymentAmount;
use App\Models\Level;
use App\Models\PaymentTranche;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = Level::all();
        $tranches = PaymentTranche::all();

        foreach ($levels as $level) {
            // Créer une classe de base pour chaque niveau
            $schoolClass = SchoolClass::create([
                'name' => $level->name,
                'level_id' => $level->id,
                'description' => "Classe de {$level->name} - COBILANO",
                'is_active' => true
            ]);

            // Créer des séries pour certaines classes
            $series = $this->getSeriesForLevel($level->name);
            foreach ($series as $seriesName) {
                ClassSeries::create([
                    'class_id' => $schoolClass->id,
                    'name' => $seriesName,
                    'capacity' => 40,
                    'is_active' => true
                ]);
            }

            // Configurer les montants de paiement selon le barème COBILANO 2023-2024
            $this->configurePaymentsForClass($schoolClass, $tranches, $level);
        }

        echo "✅ Classes COBILANO créées avec succès !\n";
        echo "==========================================\n";
        echo "Barème scolarité 2023-2024 appliqué:\n";
        echo "• Form 1/6ème: 120 000 FCFA (65k+35k+20k)\n";
        echo "• Form 2/5ème: 120 000 FCFA (65k+35k+20k)\n";
        echo "• Form 3/4ème: 130 000 FCFA (70k+35k+25k)\n";
        echo "• Form 4/3ème: 140 000 FCFA (70k+40k+30k)\n";
        echo "• Form 5/2nde: 160 000 FCFA (80k+45k+35k)\n";
        echo "• US/Tle: 180 000 FCFA (90k+50k+40k)\n";
        echo "• + Inscription: 3 500 FCFA\n";
        echo "• + Livret médical: 1 000 FCFA\n";
        echo "==========================================\n";
    }

    private function getSeriesForLevel($levelName)
    {
        switch ($levelName) {
            case '6ème':
            case 'Form 1':
            case '5ème':
            case 'Form 2':
                return ['A', 'B'];
            case '4ème':
            case 'Form 3':
            case '3ème':
            case 'Form 4':
                return ['A', 'B', 'C'];
            case '2nde':
            case 'Form 5':
                return ['A', 'C']; // Littéraire et Scientifique
            case 'Terminale':
                return ['A', 'C', 'D']; // Toutes séries
            case 'Upper Sixth':
                return ['Arts', 'Science'];
            default:
                return ['A'];
        }
    }

    private function configurePaymentsForClass($schoolClass, $tranches, $level)
    {
        foreach ($tranches as $tranche) {
            // Définir les montants selon le barème COBILANO 2023-2024
            $amounts = $this->getAmountsForLevel($level->name, $tranche->name);
            
            ClassPaymentAmount::create([
                'class_id' => $schoolClass->id,
                'payment_tranche_id' => $tranche->id,
                'amount' => $amounts['amount'],
                'is_required' => $amounts['required']
            ]);
        }
    }

    private function getAmountsForLevel($levelName, $trancheName)
    {
        // Barème officiel COBILANO 2023-2024
        $scolarityAmounts = [
            // Section Francophone
            '6ème' => ['1ere' => 65000, '2eme' => 35000, '3eme' => 20000],
            '5ème' => ['1ere' => 65000, '2eme' => 35000, '3eme' => 20000],
            '4ème' => ['1ere' => 70000, '2eme' => 35000, '3eme' => 25000],
            '3ème' => ['1ere' => 70000, '2eme' => 40000, '3eme' => 30000],
            '2nde' => ['1ere' => 80000, '2eme' => 45000, '3eme' => 35000],
            'Terminale' => ['1ere' => 90000, '2eme' => 50000, '3eme' => 40000],
            
            // Section Anglophone (mêmes tarifs)
            'Form 1' => ['1ere' => 65000, '2eme' => 35000, '3eme' => 20000],
            'Form 2' => ['1ere' => 65000, '2eme' => 35000, '3eme' => 20000],
            'Form 3' => ['1ere' => 70000, '2eme' => 35000, '3eme' => 25000],
            'Form 4' => ['1ere' => 70000, '2eme' => 40000, '3eme' => 30000],
            'Form 5' => ['1ere' => 80000, '2eme' => 45000, '3eme' => 35000],
            'Upper Sixth' => ['1ere' => 90000, '2eme' => 50000, '3eme' => 40000],
        ];

        $levelAmounts = $scolarityAmounts[$levelName] ?? ['1ere' => 65000, '2eme' => 35000, '3eme' => 20000];

        switch ($trancheName) {
            case 'Frais d\'inscription':
                return [
                    'amount' => 3500, // Montant fixe COBILANO
                    'required' => true
                ];
            case '1ère Tranche':
                return [
                    'amount' => $levelAmounts['1ere'],
                    'required' => true
                ];
            case '2ème Tranche':
                return [
                    'amount' => $levelAmounts['2eme'],
                    'required' => true
                ];
            case '3ème Tranche':
                return [
                    'amount' => $levelAmounts['3eme'],
                    'required' => true
                ];
            case 'Livret médical':
                return [
                    'amount' => 1000, // Montant fixe COBILANO
                    'required' => true
                ];
            default:
                return [
                    'amount' => 25000,
                    'required' => true
                ];
        }
    }
}