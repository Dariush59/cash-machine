<?php
namespace CashMachine;

use Exception;

class Withdraw
{
    protected $cash;

    function __construct( int $cash )
    {
        $this->cash = $cash;
    }

    public function getWithdraw() : array
    {
        if ( $this->cash < 0 )
            throw new Exception( "throw InvalidArgumentException" );

        if ( $this->cash % 10 != 0 )
            throw new Exception( "throw NoteUnavailableException" );

        $cashList = [];
        while ( $this->cash >= 100){
            $this->cash -= 100;
            $cashList[] = 100;
        }
        while ( $this->cash >= 50){
            $this->cash -= 50;
            $cashList[] = 50;
        }
        while ( $this->cash >= 20){
            $this->cash -= 20;
            $cashList[] = 20;
        }
        while ( $this->cash >= 10){
            $this->cash -= 10;
            $cashList[] = 10;
        }

        return $cashList;
    }   
}

?>