<?php

namespace ElectronicItem;

class Console extends ElectronicItem
{

    public function __construct()
    {
        $this->type = parent::ELECTRONIC_ITEM_CONSOLE;
    }

    public function maxExtras()
    {
        return 4;
    }
}
