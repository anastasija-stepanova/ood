<?php

require_once("../inc/inc.php");

use \PHPUnit\Framework\TestCase;

final class HasQuarterStateTest extends TestCase
{
    /** @var GumballMachineContext */
    private $gm;
    /** @var string */
    private $expectedFileName;
    /** @var string */
    private $actualFileName;

    public function testStateToString(): void
    {
        $state = new HasQuarterState($this->gm);
        $actualResult = $state->ToString();
        $expectedResult = 'waiting for turn of crank';
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testInsertQuarter(): void
    {
        $state = new HasQuarterState($this->gm);
        ob_start();
        $state->insertQuarter();
        $actualResult = ob_get_clean();
        $expectedResult = 'Inserted a quarter. Quarter count: 1' . PHP_EOL;
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testEjectQuarter(): void
    {
        $state = new HasQuarterState($this->gm);
        ob_start();
        $state->ejectQuarter();
        $actualResult = ob_get_clean();
        $expectedResult = '0 quarters  returned' . PHP_EOL;
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testTurnCrank(): void
    {
        $state = new HasQuarterState($this->gm);
        ob_start();
        $state->turnCrank();
        $actualResult = ob_get_clean();
        $expectedResult = 'You turned...' . PHP_EOL;
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testDispense(): void
    {
        $state = new HasQuarterState($this->gm);
        ob_start();
        $state->dispense();
        $actualResult = ob_get_clean();
        $expectedResult = 'No gumball dispensed' . PHP_EOL;
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    protected function setUp(): void
    {
        $this->gm = new GumballMachineContext(0);
        $this->expectedFileName = uniqid() . '.txt';
        $this->actualFileName = uniqid() . '.txt';
        parent::setUp();
    }

    protected function tearDown(): void
    {
        if (file_exists($this->expectedFileName)) {
            unlink($this->expectedFileName);
        }
        if (file_exists($this->actualFileName)) {
            unlink($this->actualFileName);
        }
        parent::tearDown();
    }
}