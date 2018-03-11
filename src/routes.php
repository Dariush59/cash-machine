<?php

use CashMachine\Controller\CashMachineController;
use CashMachine\Route;

$route = new Route();

$route->add('/withdraw', function() {
	echo json_encode( [] );
});

$route->add('/withdraw/.+', function( int $cash) {
    $cashMachine = new CashMachineController( $cash );
    $cashMachine->getCash();
});

$route->listen();
