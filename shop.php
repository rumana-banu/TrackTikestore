<?php

require "classes/ElectronicItems.php";
require "classes/ElectronicItem.php";
require "classes/Console.php";
require "classes/Television.php";
require "classes/Microwave.php";
require "classes/Controller.php";

$cart = new ElectronicItems();

$itemPrices = [110, 200, 300, 250]; // Prices of Console, TV and Microwave respectively.
$extraPrices = [30, 50]; // Price of Remote and Wired controller respectively.
echo "\n --- Welcome to the Online Electronic Store --- \n\n";
$itemCount =  readline("Please enter the number of electronic items that you wish to order: ");
validateInput($itemCount, FILTER_VALIDATE_INT);
for ($i = 0; $i < $itemCount; $i++) {
	echo "\n" . "Please select the item from the below list that you wish to buy:\n\n";
	echo "1 : Console priced at \$$itemPrices[0] \n",
	"2 : Television-1 priced at \$$itemPrices[1] \n",
	"3 : Television-2 priced at \$$itemPrices[2] \n",
	"4 : Microwave priced at \$$itemPrices[3] \n",
	"5 : I am done!";
	echo "\n";

	$item = readline("Enter your selection: ");
	validateInput($item, FILTER_VALIDATE_INT);

	if ($item != 5) {
		switch ($item) {
			case 1:
				$cartItem = new ElectronicItem\Console();
				break;
			case 2:
			case 3:
				$cartItem = new ElectronicItem\Television();
				break;
			case 4:
				$cartItem = new ElectronicItem\Microwave();
				break;
			default:
				break;
		}

		// Set Price for the items.
		$cartItem->setPrice($itemPrices[$item - 1]);

		/* Loop for the extra items permitted against each item
		*  to provide an option to select the extras
		*/
		$maxItems = $cartItem->maxExtras();
		for ($j = $maxItems; $j != 0; $j--) {
			echo "\nDo you want to add extra item to the Purchase? \n\n";
			echo "1: Yes \n",
			"2: No \n";
			$controllerMessage = readline("Please enter your choice: ");
			validateInput($controllerMessage, FILTER_VALIDATE_INT);

			if ($controllerMessage == 1) {
				echo "\nSelect the extras from below:\n";
				echo "1: Remote Controller priced at \$$extraPrices[0]\n",
				"2: Wired Controller priced at \$$extraPrices[1]\n";
			} else
				break;

			$extraItem = readline("Enter your selection: ");
			validateInput($extraItem, FILTER_VALIDATE_INT);
			if ($extraItem) {
				$extraCartItem = new ElectronicItem\Controller;
				$extraCartItem->setPrice($extraPrices[$extraItem - 1]);
				try {
					// Add extra item to the main item.
					$cartItem->addExtra($extraCartItem);
				} catch (exception $e) {
					echo $e->getMessage() . "\n";
				}
			} else
				break;
		}
		// Add item to the cart.
		$cart->addToCart($cartItem);
	} else
		exit;
}

// Calculate total price 
$priceDetails = $cart->getCartSummary(SORT_ASC);

$outputString = "\n--- Your bill summary is below: ---\n\n";
foreach ($priceDetails['items'] as $key => $value) {
	$outputString .= "\nItem #" . $key + 1 . "\n";
	$outputString .= $value['type'] . " = " . $value['price'] . "\n";
	if ($value['extrasCount'] > 0) {
		$outputString .=  $value['extrasCount'] . " extras = " . $value['extrasPrice'] . "\n";
		$outputString .= "Sub Total of " . $value['type'] . " with extras: " . $value['subTotal'] . "\n";
	}
}
$outputString .= "\n---------------------------------- \n";
$outputString .= "Total Price = " . $priceDetails['totalPrice'];
$outputString .= "\n---------------------------------- \n";

echo $outputString;

function validateInput($var, $type)
{
	if (!filter_var($var, $type) || $var < 0) {
		echo "Invalid Input!";
		exit;
	}
	return;
}
