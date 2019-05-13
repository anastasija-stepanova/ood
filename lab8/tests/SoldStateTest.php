<?php

require_once("../inc/inc.php");

use \PHPUnit\Framework\TestCase;

final class SoldStateTest extends TestCase
{
    /** @var GumballMachineContext */
    private $gm;
    /** @var string */
    private $expectedFileName;
    /** @var string */
    private $actualFileName;

    public function testStateToString(): void
    {
        $state = new SoldState($this->gm);
        $expectedResult = 'delivering a gumball';
        $actualResult = $state->ToString();
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testInsertQuarter(): void
    {
        $expectedResult = 'Inserted a quarter. Quarter count: 1' . PHP_EOL;
        $state = new SoldState($this->gm);
        ob_start();
        $state->insertQuarter();
        $actualResult = ob_get_clean();
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testEjectQuarter(): void
    {
        $expectedResult = '0 quarters  returned' . PHP_EOL;
        $expectedResult .= 'Sorry you already turned the crank' . PHP_EOL;
        $state = new SoldState($this->gm);
        ob_start();
        $state->ejectQuarter();
        $actualResult = ob_get_clean();
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testTurnCrank(): void
    {
        $expectedResult = 'Turning twice doesn\'t get you another gumball' . PHP_EOL;
        $state = new SoldState($this->gm);
        ob_start();
        $state->turnCrank();
        $actualResult = ob_get_clean();
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testDispenseWhenGumballMachineIsEmpty(): void
    {
        $expectedResult = 'Oops, out of gumballs' . PHP_EOL;
        $expectedResult .= 'Set sold out state' . PHP_EOL;
        $state = new SoldState($this->gm);
        ob_start();
        $state->dispense();
        $actualResult = ob_get_clean();
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testDispenseWhenGumballMachineHasOneGumball(): void
    {
        $expectedResult = 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedResult .= 'Oops, out of gumballs' . PHP_EOL;
        $expectedResult .= 'Set sold out state' . PHP_EOL;
        $gm = new GumballMachineContextMock(1);
        $state = new SoldState($gm);
        ob_start();
        $state->dispense();
        $actualResult = ob_get_clean();
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testDispenseWhenGumballMachineHasMoreOneGumball(): void
    {
        $expectedResult = 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedResult .= 'Set no quarter state' . PHP_EOL;
        $gm = new GumballMachineContextMock(2);
        $state = new SoldState($gm);
        ob_start();
        $state->dispense();
        $actualResult = ob_get_clean();
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    protected function setUp(): void
    {
        $this->gm = new GumballMachineContextMock(0);
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