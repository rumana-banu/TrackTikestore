<?php
class ElectronicItems
{

    public $items = array();

    /* public function __construct(array $items)
    {

        $this->items = $items;
    } */

    public function addToCart($item)
    {
        $this->items[] = $item;
    }
    /**
     * Returns the items depending on the sorting type requested
     *
     * @return array
     */
    /* public function getSortedItems($type)
    {

        $sorted = array();
        foreach ($this->items as $item) {

            $sorted[($item->price * 100)] = $item;
        }

        return ksort($sorted, SORT_NUMERIC);
    } */

    /**
     *
     * @param string $type
     * @return array
     */
    public function getItemsByType($type)
    {

        /*if (in_array($type, ElectronicItem::$types)) {

            $callback = function ($item) use ($type) {

                return $item->type == $type;
            };

            $items = array_filter($this->items, $callback);
        }*/

        return false;
    }

    /*
    * Sorts the items added to the cart based on the sort type passed
    * Return the cart items in a sorted fashion with indiviual, sub-total and total cost.
    * Along with the total cost for extras
    */
    public function getCartSummary($sortOrder = SORT_ASC)
    {
        $totalItems = count($this->items);
        $cartMessage = "";
        $totalPrice = 0;
        foreach ($this->items as $key => $item) {
            $cartPrice[$key]['type'] = $item->type;
            $cartPrice[$key]['price'] = $item->getPrice();
            $cartPrice[$key]['extrasCount'] = count($item->extras);
            $cartPrice[$key]['extrasPrice'] = $item->getExtrasPrice();
            $cartPrice[$key]['subTotal'] = $item->getPrice() + $item->getExtrasPrice();
        }

        $sortColumn = array();
        foreach ($cartPrice as $k => $kvalue) {
            $sortColumn[$k] = $kvalue['subTotal'];
            $totalPrice += $kvalue['subTotal'];
        }

        array_multisort($sortColumn, $sortOrder, $cartPrice);

        $result['items'] = $cartPrice;
        $result['totalPrice'] = $totalPrice;
        return $result;
    }
}
