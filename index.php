<?php

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

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
$pikachu = new Pikachu('Sparky');
$charmeleon = new Charmeleon('Blazy');

// Prints the values of the pokemons before the fight.
echo "<br>Status before the fight:<br><br>";
echoStatusPokemons([$pikachu, $charmeleon]);

// Pikachu attacks charmeleon with electric Ring.
$pikachu->attackPokemon(new ElectricRing(), $charmeleon);

echo $pikachu->pokemonName . " attacks " . $charmeleon->pokemonName . ": <br>";

// Prints the values of the attacked pokemon after the attack.
echo "<br>";
echoStatusPokemons([$charmeleon]);

// Charmeleon attacks Pikachu with Flare.
$charmeleon->attackPokemon(new Flare(), $pikachu);

echo $charmeleon->pokemonName . " attacks " . $pikachu->pokemonName . ": <br>";

// Prints the values of the attacked pokemon after the attack.
echo "<br>";
echoStatusPokemons([$pikachu]);