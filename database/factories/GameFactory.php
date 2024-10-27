<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mascota>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gameNames = [
            'Dragon Realm', 'Shadow Quest', 'Mystic Legends', 'Solar Strike', 'Phantom Horizon', 'Steel Warriors', 
            'Neon Dreams', 'Eternal Battle', 'Lunar Chronicles', 'Cyber Odyssey', 'Inferno Dawn', 'Crystal Kingdom', 
            'Cosmic Drift', 'Arcane Expedition', 'Celestial Forge', 'Dark Tides', 'Ember Knights', 'Thunder Strike', 
            'Titan’s Wrath', 'Lost Realms', 'Neon Horizon', 'Savage Skies', 'Abyss Chronicles', 'Phoenix Reborn', 
            'Forgotten Lands', 'Solar Forge', 'Arcane Rites', 'Bloodstone Saga', 'Frostbound', 'Eternal Flames', 
            'Venom’s Edge', 'Infinite Void', 'Iron Quest', 'Divine Clash', 'Apex Legends', 'Iron Wolves', 
            'Zenith Battle', 'Titan Rift', 'Starbound Warriors', 'Twilight Kingdom', 'Ember Shadows', 'Nexus Heroes', 
            'Forbidden Path', 'Shattered Stars', 'Thunder Quest', 'Celestial Trials', 'Iron Reign', 'Galaxy Raiders', 
            'Spirit War', 'Dawnbound', 'Shining Forge', 'Phantom Legacy', 'Crimson Odyssey', 'Infinite Strife', 
            'Legacy of Shadows', 'Iron Souls', 'Phantom Warriors', 'Arcane Skies', 'Shadow Chronicles', 'Eternal Bond', 
            'Forgotten Sins', 'Mystic Realms', 'Cyber Hunter', 'Pixel Adventure', 'Battleforge', 'Lost Horizon', 
            'Celestial Gate', 'Enigma’s Path', 'Horizon Call', 'Shining Quest', 'Frozen Path', 'Mystic Tide', 
            'Thunder Legends', 'Crimson Shadows', 'Galactic Odyssey', 'Steel Warlords', 'Soulbound', 'Phoenix Valor', 
            'Shadowfire', 'Frost Knights', 'Forgotten Depths', 'Savage Lands', 'Titan Bound', 'Crystal Echoes', 
            'Ember Saga', 'Shattered Forge', 'Celestial Dawn', 'Mythic Skies', 'Iron Echoes', 'Solar Tide', 
            'Nexus Reborn', 'Silent Destiny', 'Arcane Legends', 'Shadowbound', 'Phantom Tide', 'Celestial Fire', 
            'Twilight Echo', 'Mystic Clans', 'Frostfire', 'Savage Saga', 'Phoenix Echoes', 'Legend’s Path', 
            'Legacy Forge', 'Shadowbound', 'Celestial Fury', 'Steel Saga', 'Abyss Rising', 'Darkfire Reign', 
            'Ironbound', 'Cosmic Skies', 'Apex Knights', 'Celestial Rift', 'Mythic Path', 'Shining Valor', 
            'Ironborn', 'Shattered Tide', 'Frostborn', 'Shadow Saga', 'Lost Skies', 'Venom Forge', 'Mythic Chronicles', 
            'Iron Rebirth', 'Thunderbound', 'Savage Reign', 'Dark Echoes', 'Celestial Saga', 'Mystic Echo', 
            'Ironheart', 'Spiritbound', 'Frozen Echoes', 'Eternal Skies', 'Phoenix Rising', 'Lost Echo', 
            'Celestial Reign', 'Abyss Saga', 'Soulbound Warriors', 'Thunder Echoes', 'Legend’s Call', 'Iron Legacy', 
            'Darkfire Legends', 'Arcane Echoes', 'Twilight Rebirth', 'Phantom Reign', 'Solar Knights', 'Savage Valor', 
            'Thunderfire', 'Shattered Path', 'Mythic Quest', 'Arcane Reign', 'Iron Tide', 'Frostfire Saga', 
            'Nexus Legends', 'Celestial Strike', 'Mythic Knights', 'Phoenix Saga', 'Soulfire', 'Mystic Fire', 
            'Venom Rebirth', 'Iron Forge', 'Darkfire Call', 'Thunder Saga', 'Celestial Path', 'Arcane Bond', 
            'Eternal Saga', 'Soulbound Knights', 'Phoenix Reign', 'Celestial Echo', 'Abyss Legends', 'Thunder Skies', 
            'Spirit Reborn', 'Phoenix Skies', 'Lost Echoes', 'Twilight Reign', 'Celestial Knights', 'Iron Strike', 
            'Dark Saga', 'Frozen Warriors', 'Iron Reign', 'Mystic Forge', 'Savage Call', 'Eternal Knights', 
            'Iron Reign', 'Soulbound Saga', 'Phoenix Path', 'Shattered Skies', 'Celestial Bond', 'Thunder Knights', 
            'Frostfire Echoes', 'Mystic Reign', 'Phoenix Rebirth', 'Celestial Quest', 'Arcane Knights', 'Abyss Bound', 
            'Thunder Reign', 'Celestial Fire', 'Darkfire Skies', 'Ironborn Saga', 'Soulfire Rebirth', 'Frost Knights', 
            'Celestial Fury', 'Abyss Call', 'Twilight Saga', 'Mythic Reign', 'Savage Rebirth', 'Phoenix Forge', 
            'Celestial Chronicles', 'Frozen Echo', 'Iron Quest', 'Mystic Path', 'Spirit Reign', 'Celestial Echoes', 
            'Shadowfire Saga', 'Thunderbound Warriors', 'Iron Warriors', 'Celestial Bound', 'Spirit Knights', 
            'Phoenix Legends', 'Ironborn Reign', 'Frostfire Reign', 'Mythic Forge', 'Celestial Warriors', 
            'Thunder Rebirth', 'Arcane Fury', 'Darkfire Knights', 'Lost Reign', 'Celestial Echo', 'Spirit Call', 
            'Frozen Fire', 'Phoenix Knights', 'Iron Echoes', 'Eternal Reign', 'Darkfire Path', 'Ironbound Call', 
            'Celestial Path', 'Spirit Echo', 'Phoenix Rebirth', 'Lostfire', 'Ironborn Call', 'Mythic Knights', 
            'Celestial Call', 'Frostfire Warriors', 'Thunder Skies', 'Celestial Saga', 'Soulbound Path', 'Phoenix Quest',
        ];

        return [
            'nombre' => $this->faker->randomElement($gameNames), 
            'descripcion' => $this->faker->sentence(),
            'fecha_lanzamiento' => $this->faker->date(),
            'categoria_id' => $this->faker->numberBetween(1, 7),
        ];
    }
}