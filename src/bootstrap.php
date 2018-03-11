<?php

try {
    require_once __DIR__ . '/../vendor/autoload.php';

    require_once __DIR__ . '/../config/setting.php';

    require_once __DIR__ . '/CashMachine/routes.php';
}
catch (Throwable $e) {
    echo json_encode( $e->getMessage());
}

?>
