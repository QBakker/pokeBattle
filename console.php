<?php

include 'classes/Pokemon.php';
include 'classes/Pikachu.php';
include 'classes/Charmeleon.php';

/**
 * echoStatusPokemons
 *
 * Makes the variables visible in the console.
 * 
 * @param  array $pokemons
 *
 * @return void
 */
function echoStatusPokemons(array $pokemons) {
    
     // Loops it as many times as there are pokemons in the given array.
    foreach($pokemons as $pokemon)
    {
        echo $pokemon->__get('pokemonName') . ': ' . $pokemon->getHealth() . ' HP';
        echo "\nstatus: ";
        echo $pokemon->isAlive() ? 'Is alive' : 'Has fainted';
        echo "\n\n";
    }
    echo "\n\n";
}

// Creating Pokemons
$pikachu = new classes\Pikachu('Sparky');
$charmeleon = new classes\Charmeleon('Blazy');

// Prints the values of the pokemons before the fight.
echo "\nStatus before the fight:\n\n";
echoStatusPokemons([$pikachu, $charmeleon]);

// Pikachu attacks charmeleon with electric Ring.
$pikachu->attackPokemon('Electric Ring', $charmeleon);

// Charmeleon attacks Pikachu with Flare.
$charmeleon->attackPokemon('Flare', $pikachu);

// Prints the values of the pokemons after the fight.
echo "\nStatus after the fight:\n\n";
echoStatusPokemons([$pikachu, $charmeleon]);