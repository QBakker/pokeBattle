<?php

namespace classes;

use classes\Pokemon;

class Pikachu extends Pokemon
{
    /**
     * __construct
     *
     * Creates a new Pikachu with default values.
     * 
     * @param  string $pokemonName
     *
     * @return void
     */
    // the name of the pokemon is set by default to 'Charmeleon' and is changed when the value is given.
    public function __construct($pokemonName = 'Pikachu')
    {
        $pokemonProperties = [
            'pokemonName' => $pokemonName,
            'energyType' => 'Electric',
            'hitpoints' => '60',
            'weaknesses' => [
                'Fire' => 1.5
            ],
            'resistances' => [
                'Fighting' => 20
            ],
            'attacks' => [
                'Pika Punch' => 20,
                'Electric Ring' => 50
            ]
        ];

        // sends all the values of the pokemon to the parent in one array.
        parent::__construct($pokemonProperties);
    }
}