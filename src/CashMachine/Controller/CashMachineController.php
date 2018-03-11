<?php
namespace CashMachine\Controller;

use Exception;
use InvalidArgumentException;
use CashMachine\Exceptions\NoteUnavailableException;
use CashMachine\CashMachine;

class CashMachineController 
{
    function __construct( int $cash )
    {
        $this->cash = $cash;
    }

    public function getCash()
    {
        try{
            $cashMachine = new CashMachine( $this->cash );
            echo json_encode( $cashMachine->withdraw());
        }
        catch ( InvalidArgumentException $e ) {
            echo json_encode( $e->getMessage());
        }
        catch ( NoteUnavailableException $e ) {
            echo json_encode( $e->getMessage());
        }
        catch ( Exception $e ) {
            echo json_encode( $e->getMessage());
        }
        catch ( Error $error ) {
            echo json_encode( $error );
        }
    }
}


?>