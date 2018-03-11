<?php

use CashMachine\Controller\WithdrawController;
use CashMachine\Route;

$route = new Route();

$route->add('/withdraw', function() {
	echo json_encode( "Empty Set" );
});

$route->add('/withdraw/.+', function( int $cash) {
    $withdraw = new WithdrawController( $cash );
    $withdraw->getCash();
});

$route->listen();
