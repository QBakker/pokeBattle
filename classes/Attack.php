<?php

class Attack {

    public $name;
    public $damage;

    /**
     * Undocumented function
     *
     * @param [type] $name
     * @param [type] $damage
     */
    public function __construct($name, $damage)
    {
        $this->name = $name;
        $this->damage = $damage;
    }
}