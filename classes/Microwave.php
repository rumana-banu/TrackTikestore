<?php

namespace ElectronicItem;

class Microwave extends ElectronicItem
{
    public function __construct()
    {
        $this->type = parent::ELECTRONIC_ITEM_MICROWAVE;
    }

    public function maxExtras()
    {
        return 0;
    }
}
