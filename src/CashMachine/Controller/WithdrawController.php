<?php
namespace CashMachine\Controller;

use Exception;
use CashMachine\Withdraw;

class WithdrawController 
{
    function __construct( int $cash )
    {
        $this->cash = $cash;
    }

    public function getCash()
    {
        try{
            $withdraw = new Withdraw( $this->cash );
            echo json_encode( $withdraw->getWithdraw());
        }
        catch (Exception $e) {
            echo json_encode( $e->getMessage());
        }
        
    }

}


?>