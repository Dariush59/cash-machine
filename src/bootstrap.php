<?php

try {
    require_once __DIR__ . '/../vendor/autoload.php';

    require_once __DIR__ . '/../config/setting.php';

    require_once __DIR__ . '/routes.php';
}
catch (Throwable $e) {
    echo json_encode( $e->getMessage());
}
catch ( Error $error ) {
    echo json_encode( $error );
}

?>
