<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Administrateur COBILANO
        $this->createOrUpdateUser('admin.cobilano', [
            'name' => 'Administrateur COBILANO',
            'email' => 'admin@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'admin',
        ]);

        // Directeur
        $this->createOrUpdateUser('directeur', [
            'name' => 'Directeur COBILANO',
            'email' => 'directeur@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'admin',
        ]);

        // Surveillant Général
        $this->createOrUpdateUser('surveillant.general', [
            'name' => 'Surveillant Général',
            'email' => 'surveillant@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'surveillant_general',
        ]);

        // Comptable
        $this->createOrUpdateUser('comptable', [
            'name' => 'Comptable COBILANO',
            'email' => 'comptable@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'accountant',
        ]);

        // Enseignants Section Francophone
        $this->createOrUpdateUser('prof.francophone1', [
            'name' => 'Prof. Mathématiques',
            'email' => 'math@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'teacher',
        ]);

        $this->createOrUpdateUser('prof.francophone2', [
            'name' => 'Prof. Français',
            'email' => 'francais@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'teacher',
        ]);

        $this->createOrUpdateUser('prof.francophone3', [
            'name' => 'Prof. Sciences',
            'email' => 'sciences@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'teacher',
        ]);

        // Enseignants Section Anglophone
        $this->createOrUpdateUser('prof.anglophone1', [
            'name' => 'Teacher Mathematics',
            'email' => 'mathematics@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'teacher',
        ]);

        $this->createOrUpdateUser('prof.anglophone2', [
            'name' => 'Teacher English',
            'email' => 'english@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'teacher',
        ]);

        $this->createOrUpdateUser('prof.anglophone3', [
            'name' => 'Teacher Science',
            'email' => 'science@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'teacher',
        ]);

        // Responsable Multimédia
        $this->createOrUpdateUser('multimedia', [
            'name' => 'Responsable Multimédia',
            'email' => 'multimedia@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'user',
        ]);

        // Responsable Transport
        $this->createOrUpdateUser('transport', [
            'name' => 'Responsable Transport',
            'email' => 'transport@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'user',
        ]);

        // Secrétaire
        $this->createOrUpdateUser('secretaire', [
            'name' => 'Secrétaire COBILANO',
            'email' => 'secretaire@cobilano.cm',
            'password' => Hash::make('cobilano2024'),
            'role' => 'user',
        ]);

        echo "✅ Utilisateurs COBILANO créés avec succès !\n";
        echo "==========================================\n";
        echo "🏫 COLLÈGE BILINGUE DE LA POINTE (COBILANO)\n";
        echo "📍 Ndiengdam, Bafoussam - B.P. 1362\n";
        echo "📧 collegepointe2022@gmail.com\n";
        echo "📞 +237 655 12 49 21 / +237 692 15 09 52\n";
        echo "==========================================\n";
        echo "COMPTES D'ACCÈS (mot de passe: cobilano2024):\n";
        echo "• Administrateur:     admin.cobilano\n";
        echo "• Directeur:          directeur\n";
        echo "• Surveillant Gén.:   surveillant.general\n";
        echo "• Comptable:          comptable\n";
        echo "• Prof. Math (FR):    prof.francophone1\n";
        echo "• Prof. Français:     prof.francophone2\n";
        echo "• Prof. Sciences:     prof.francophone3\n";
        echo "• Teacher Math (EN):  prof.anglophone1\n";
        echo "• Teacher English:    prof.anglophone2\n";
        echo "• Teacher Science:    prof.anglophone3\n";
        echo "• Multimédia:         multimedia\n";
        echo "• Transport:          transport\n";
        echo "• Secrétaire:         secretaire\n";
        echo "==========================================\n";
    }

    /**
     * Créer ou mettre à jour un utilisateur (force TOUJOURS la mise à jour du mot de passe)
     */
    private function createOrUpdateUser($username, $userData)
    {
        // TOUJOURS supprimer et recréer pour garantir un mot de passe fonctionnel
        $existingUser = User::where('username', $username)->first();
        if ($existingUser) {
            $existingUser->delete();
            echo "🗑️ Ancien utilisateur supprimé: {$username}\n";
        }
        
        // Créer avec un nouveau hash
        User::create(array_merge(['username' => $username], $userData));
        echo "✨ Utilisateur créé/recréé: {$username}\n";
    }
}