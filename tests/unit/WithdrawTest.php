<?php

use PHPUnit\Framework\TestCase;
use CashMachine\CashMachine;
use CashMachine\Controller\CashMachineController;
use CashMachine\Exceptions\NoteUnavailableException;

class CashMashineTest extends TestCase
{

    public function testReturnResponseIsTrue()
    {
        $cashMachine = new cashMachine( 500 );
        $expectedRes = [100,100,100,100,100];
        $this->assertEquals($cashMachine->withdraw(), $expectedRes );
    }

    public function testNoteUnavailableException()
    {
        $this->expectException( NoteUnavailableException::class );
        $cashMachine = new CashMachine( 115 );
        $cashMachine->withdraw();
    }

    public function testInvalidArgumentException()
    {
        $this->expectException( InvalidArgumentException::class );
        $cashMachine = new CashMachine( -115 );
        $cashMachine->withdraw();
    }

    public function testEmptyArgumentException()
    {
        $emess = NULL;
        try {
            $cashMachine = new CashMachine();
        } 
        catch (Throwable $e) { $emess = $e->getMessage(); }
            $this->assertRegexp( '/Too few arguments to function/', $emess );
    }

    public function testNotIntArgumentException()
    {
        $emess = NULL;
        try {
            $cashMachine = new CashMachine( 'Dar' );
        } 
        catch (Throwable $e) { $emess = $e->getMessage(); }
            $this->assertRegexp( '/must be of the type integer/', $emess );
    }

}

?>