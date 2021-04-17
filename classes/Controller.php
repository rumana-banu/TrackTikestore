<?php

namespace ElectronicItem;

class Controller extends ElectronicItem
{

    public function __construct()
    {
        $this->type = parent::ELECTRONIC_ITEM_EXTRAS;
    }

    public function maxExtras()
    {
        return 0;
    }
}
