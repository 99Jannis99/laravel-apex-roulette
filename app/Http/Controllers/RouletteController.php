<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Weapon;
use Illuminate\Http\Request;

class RouletteController extends Controller
{
    /**
     * Show the roulette page
     */
    public function index()
    {
        return view('roulette');
    }

    /**
     * Get random character and filtered weapons
     */
    public function spinFiltered(Request $request)
    {
        $character = Character::getRandom();
        
        // Get weapon classes from request
        $weapon1Classes = $request->input('weapon1_classes', []);
        $weapon2Classes = $request->input('weapon2_classes', []);
        
        // Convert comma-separated strings to arrays if needed
        if (is_string($weapon1Classes)) {
            $weapon1Classes = explode(',', $weapon1Classes);
        }
        if (is_string($weapon2Classes)) {
            $weapon2Classes = explode(',', $weapon2Classes);
        }
        
        // Get random weapons from selected classes
        $weapon1 = null;
        $weapon2 = null;
        
        if (!empty($weapon1Classes)) {
            $weapon1 = Weapon::whereIn('type', $weapon1Classes)->inRandomOrder()->first();
        }
        
        if (!empty($weapon2Classes)) {
            $weapon2 = Weapon::whereIn('type', $weapon2Classes)->inRandomOrder()->first();
        }

        return response()->json([
            'character' => $character,
            'weapon1' => $weapon1,
            'weapon2' => $weapon2
        ]);
    }
}
