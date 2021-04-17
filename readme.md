# TrackTik Back-end Challenge

## Assumptions

1. Prices are hardcoded for testing purpose considering the scenarios mentioned and can be made dynamic too.
2. Sorting is done on the sub-total price of an item; i.e. cost of the main item and the extras.
3. No limitations on the type of the controllers has been considered. If this has to be done, please let me know and I shall improvise it.
4. For Question 2, any item's total cost can be determined by the sub-total of an item in the Bill summary.

## Execution of the code

### 1. Docker
Run the below commands to execute in docker being in the root folder of this code
```
docker build -t tracktikestore .
docker run -it --rm tracktikestore
```

### 2. Commond Line Interface
php shop.php
