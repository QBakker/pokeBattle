<?php

include 'classes/Pokemon.php';
include 'classes/Pikachu.php';
include 'classes/Charmeleon.php';

/**
 * echoStatusPokemons
 *
 * Makes the variables visible in the browser.
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
        echo "<br>status: ";
        echo $pokemon->isAlive() ? 'Is alive' : 'Has fainted';
        echo "<br><br>";
    }
    echo "<br><br>";
}

// Creating Pokemons
$pikachu = new classes\Pikachu('Sparky');
$charmeleon = new classes\Charmeleon('Blazy');

// Prints the values of the pokemons before the fight.
echo "<br>Status before the fight:<br><br>";
echoStatusPokemons([$pikachu, $charmeleon]);

// Pikachu attacks charmeleon with electric Ring.
$pikachu->attackPokemon('Electric Ring', $charmeleon);

// Charmeleon attacks Pikachu with Flare.
$charmeleon->attackPokemon('Flare', $pikachu);

// Prints the values of the pokemons after the fight.
echo "<br>Status after the fight:<br><br>";
echoStatusPokemons([$pikachu, $charmeleon]);