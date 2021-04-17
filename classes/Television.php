<?php

namespace ElectronicItem;

class Television extends ElectronicItem
{
    public function __construct()
	{
		$this->type = parent::ELECTRONIC_ITEM_TELEVISION;
    }

    public function maxExtras()
    {
        return -1;
    }
}