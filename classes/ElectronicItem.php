<?php

namespace ElectronicItem;

use Exception;

abstract class ElectronicItem
{

    /**
     * @var float
     */
    public $price;

    /**
     * @var string
     */
    private $type;
    public $wired;
    public $extras = array();

    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
    const ELECTRONIC_ITEM_EXTRAS = 'controller';


    private static $types = array(
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE, self::ELECTRONIC_ITEM_TELEVISION
    );

    function getPrice()
    {
        return $this->price;
    }

    function getType()
    {
        return $this->type;
    }

    function getWired()
    {
        return $this->wired;
    }

    function setPrice($price)
    {
        $this->price = $price;
    }

    function setType($type)
    {
        $this->type = $type;
    }

    function setWired($wired)
    {
        $this->wired = $wired;
    }

    /*
    * Checks the limit od extras for each item
    * Adds the extra item to the @array
    */
    function addExtra($extraItem)
    {

        if (count($this->extras) == $this->maxExtras())
            throw new Exception("Maximum limit for extra controllers exceeded for " . $this->type);

        $this->extras[] = $extraItem;
    }

    /*
    * Calculates the total cost of all the controllers.
    */
    function getExtrasPrice()
    {
        $extrasPrice = 0;
        foreach ($this->extras as $key => $value) {
            $extrasPrice += $value->price;
        }
        return $extrasPrice;
    }

    abstract function maxExtras();
}
