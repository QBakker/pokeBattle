<?php

class Charmeleon extends Pokemon
{
    /**
     * __construct
     *
     * Creates a new Charmeleon with the default values.
     * 
     * @param  string $pokemonName
     *
     * @return void
     */
    // the name of the pokemon is set by default to 'Charmeleon' and is changed when the value is given.
    public function __construct($pokemonName = 'Charmeleon')
    {
        $pokemonProperties = [
            'pokemonName' => $pokemonName,
            'energyType' => 'Fire',
            'hitpoints' => '60',
            'weaknesses' => [
                'Water' => 2
            ],
            'resistances' => [
                'Electric' => 10
            ],
            'attacks' => [
                new HeadButt(),
                new Flare()
            ]
        ];

        // sends all the values of the pokemon to the parent in one array.
        parent::__construct($pokemonProperties);
    }
}