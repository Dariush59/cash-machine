<?php

use PHPUnit\Framework\TestCase;
use CashMachine\Withdraw;
use CashMachine\Controller\WithdrawController;

class WithdrawTest extends TestCase
{
    public function testModelResponseIsArray()
    {
        $withdraw = new Withdraw( 500 );
        $this->assertInternalType('array', $withdraw->getWithdraw() );
    }

    public function testNoteUnavailableException()
    {
        $emess = NULL;
        try {
            $withdraw = new Withdraw( 115 );
            $withdraw->getWithdraw();
        } 
        catch (Throwable $e) { $emess = $e->getMessage(); }
        $this->assertEquals( $emess, 'throw NoteUnavailableException' );
    }

    public function testInvalidArgumentException()
    {
        $emess = NULL;
        try {
            $withdraw = new Withdraw( -115 );
            $withdraw->getWithdraw();
        } 
        catch (Throwable $e) { $emess = $e->getMessage(); }
        $this->assertEquals( $emess, 'throw InvalidArgumentException' );
    }

    public function testEmptyArgumentException()
    {
        $emess = NULL;
        try {
            $withdraw = new Withdraw();
        } 
        catch (Throwable $e) { $emess = $e->getMessage(); }
            $this->assertRegexp('/Too few arguments to function/', $emess);
    }

    public function testNotIntArgumentException()
    {
        $emess = NULL;
        try {
            $withdraw = new Withdraw('Dar');
        } 
        catch (Throwable $e) { $emess = $e->getMessage(); }
            $this->assertRegexp('/must be of the type integer/', $emess);
    }

}

?>