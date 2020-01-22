<?php

class Pokemon
{
    protected $pokemonName;
	protected $energyType;

	protected $hitpoints;
	protected $health;

	protected $weaknesses;
	protected $resistances;

    protected $attacks;
    
    /**
     * __construct
     *
     * This function sets all properties in the Pokemon Class variables.
     * 
     * @param  array $pokemonProperties
     *
     * @return void
     */
    public function __construct(array $pokemonProperties)
	{

        $this->pokemonName = $pokemonProperties['pokemonName'];
        $this->energyType = $pokemonProperties['energyType'];
        $this->hitpoints = $pokemonProperties['hitpoints'];
        $this->weaknesses = $pokemonProperties['weaknesses'];
        $this->resistances = $pokemonProperties['resistances'];
        $this->attacks = $pokemonProperties['attacks'];
        $this->health = $this->hitpoints;
    }
    
    /**
     * __get
     *
     * Uses the default PHP function __get to return the variable that is given.
     * 
     * @param  string $property
     *
     * @return mixed
     */
    // final makes sure the function can't be rewritten in another class when the same name is used.
    final function __get($property)
    {
        // $property will be replaced by the name of the given variable
        return $this->$property;
    }

    /**
     * getHealth
     *
     * Returns the health variable and the total health (hitpoints).
     * 
     * @return void
     */
    final function getHealth()
	{
		return $this->health . '/' . $this->hitpoints;
    }
    
    
    /**
     * isAlive
     *
     * Checks the health. If its bigger then 0 it returns true, if the health is less or equal to 0 the function returns false.
     * 
     * @return void
     */
    final function isAlive()
    {
        return $this->health > 0;
    }

    /**
     * attackPokemon
     * 
     * Uses the name of the attack and the targetPokemon to get the amount of damage that has to be done by the attacking pokemon.
     *
     * @param  object $attack
     * @param  object $targetPokemon
     *
     * @return void
     */
    final function attackPokemon($attack, $targetPokemon) {
  
        // the default value of damage will be set by the name of the attack that is used by the attacking pokemon.
        $damage = $attack->damage;

        // array_key_exists checks if the array contains a specific value.
        if ( array_key_exists($this->energyType, $targetPokemon->weaknesses) ) {
            
            // The damage will be multiplied  by the targetPokemons weakness.
            $damage = $damage * $targetPokemon->weaknesses[$this->energyType];
            
        }
        
        // array_key_exists searches for a specific energyType in the targetPokemons resistances array.
        if ( array_key_exists($this->energyType, $targetPokemon->resistances) ) {
            
            // The resistance of the targetPokemon will be taken from the damage.
            $damage = $damage - $targetPokemon->resistances[$this->energyType];
        }

        $targetPokemon->recieveDamage($damage);
    }
    
    public function recieveDamage($damage) {
        // if the damage is below 0 the damage wouldn't be taken from targetPokemon.
        // -= is current - $damage.
        if ($damage > 0) $this->health -= $damage;
        
        // checks trough the boolean from isAlive() if the health is less then 0.
        // when the health is less then 0 the health is set to 0.
        if ( !$this->isAlive() ) $this->health = 0;
    }
}