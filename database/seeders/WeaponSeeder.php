<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Weapon;

class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weapons = [
            // Assault Rifles
            [
                'name' => 'R-301 Carbine',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'assault rifle',
                'ammo_type' => 'light'
            ],
            [
                'name' => 'Flatline',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'assault rifle',
                'ammo_type' => 'heavy'
            ],
            [
                'name' => 'Hemlok Burst AR',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'assault rifle',
                'ammo_type' => 'heavy'
            ],
            [
                'name' => 'Havoc Rifle',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'assault rifle',
                'ammo_type' => 'energy'
            ],
            [
                'name' => 'Nemesis Burst AR',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'assault rifle',
                'ammo_type' => 'energy'
            ],

            // SMGs
            [
                'name' => 'R-99 SMG',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'smg',
                'ammo_type' => 'light'
            ],
            [
                'name' => 'Prowler Burst PDW',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'smg',
                'ammo_type' => 'heavy'
            ],
            [
                'name' => 'Alternator SMG',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'smg',
                'ammo_type' => 'light'
            ],
            [
                'name' => 'Volt SMG',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'smg',
                'ammo_type' => 'energy'
            ],
            [
                'name' => 'C.A.R. SMG',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'smg',
                'ammo_type' => 'light'
            ],

            // Snipers
            [
                'name' => 'Longbow DMR',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'sniper',
                'ammo_type' => 'sniper'
            ],
            [
                'name' => 'Kraber .50-Cal Sniper',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'sniper',
                'ammo_type' => 'sniper'
            ],
            [
                'name' => 'Sentinel',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'sniper',
                'ammo_type' => 'sniper'
            ],
            [
                'name' => 'Charge Rifle',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'sniper',
                'ammo_type' => 'energy'
            ],

            // Shotguns
            [
                'name' => 'EVA-8 Auto',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'shotgun',
                'ammo_type' => 'shotgun'
            ],
            [
                'name' => 'Mastiff Shotgun',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'shotgun',
                'ammo_type' => 'shotgun'
            ],
            [
                'name' => 'Peacekeeper',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'shotgun',
                'ammo_type' => 'shotgun'
            ],
            [
                'name' => 'Mozambique',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'shotgun',
                'ammo_type' => 'shotgun'
            ],

            // LMGs
            [
                'name' => 'Spitfire',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'lmg',
                'ammo_type' => 'heavy'
            ],
            [
                'name' => 'L-STAR EMG',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'lmg',
                'ammo_type' => 'energy'
            ],
            [
                'name' => 'Devotion LMG',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'lmg',
                'ammo_type' => 'energy'
            ],
            [
                'name' => 'Rampage LMG',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'lmg',
                'ammo_type' => 'heavy'
            ],

            // Pistols
            [
                'name' => 'Wingman',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'pistol',
                'ammo_type' => 'heavy'
            ],
            [
                'name' => 'P2020',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'pistol',
                'ammo_type' => 'light'
            ],
            [
                'name' => 'RE-45 Auto',
                'image_url' => 'https://www.svgrepo.com/show/449375/gun.svg',
                'type' => 'pistol',
                'ammo_type' => 'light'
            ]
        ];

        foreach ($weapons as $weapon) {
            Weapon::create($weapon);
        }
    }
}
