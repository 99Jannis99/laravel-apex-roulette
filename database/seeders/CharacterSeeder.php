<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $characters = [
            [
                'name' => 'Wraith',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Interdimensional Skirmisher',
                'type' => 'assault'
            ],
            [
                'name' => 'Bloodhound',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Technological Tracker',
                'type' => 'recon'
            ],
            [
                'name' => 'Gibraltar',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Defensive Bombardier',
                'type' => 'defensive'
            ],
            [
                'name' => 'Lifeline',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Combat Medic',
                'type' => 'support'
            ],
            [
                'name' => 'Pathfinder',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Forward Scout',
                'type' => 'recon'
            ],
            [
                'name' => 'Mirage',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Holographic Trickster',
                'type' => 'assault'
            ],
            [
                'name' => 'Caustic',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Toxic Trapper',
                'type' => 'defensive'
            ],
            [
                'name' => 'Octane',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Adrenaline Junkie',
                'type' => 'assault'
            ],
            [
                'name' => 'Wattson',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Static Defender',
                'type' => 'defensive'
            ],
            [
                'name' => 'Crypto',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Surveillance Expert',
                'type' => 'recon'
            ],
            [
                'name' => 'Revenant',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Synthetic Nightmare',
                'type' => 'assault'
            ],
            [
                'name' => 'Loba',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Translocating Thief',
                'type' => 'support'
            ],
            [
                'name' => 'Rampart',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Modder',
                'type' => 'defensive'
            ],
            [
                'name' => 'Horizon',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Gravitational Manipulator',
                'type' => 'assault'
            ],
            [
                'name' => 'Fuse',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Explosive Enthusiast',
                'type' => 'assault'
            ],
            [
                'name' => 'Valkyrie',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Winged Avenger',
                'type' => 'recon'
            ],
            [
                'name' => 'Seer',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Ambush Artist',
                'type' => 'recon'
            ],
            [
                'name' => 'Ash',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Incisive Instigator',
                'type' => 'assault'
            ],
            [
                'name' => 'Mad Maggie',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Explosive Warlord',
                'type' => 'assault'
            ],
            [
                'name' => 'Newcastle',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Heroic Defender',
                'type' => 'defensive'
            ],
            [
                'name' => 'Vantage',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Adrenaline Hunter',
                'type' => 'recon'
            ],
            [
                'name' => 'Catalyst',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Defensive Conjurer',
                'type' => 'defensive'
            ],
            [
                'name' => 'Ballistic',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Weapons Master',
                'type' => 'assault'
            ],
            [
                'name' => 'Conduit',
                'image_url' => 'https://www.svgrepo.com/show/483912/person.svg',
                'description' => 'Savior of Soldiers',
                'type' => 'support'
            ]
        ];

        foreach ($characters as $character) {
            Character::create($character);
        }
    }
}
