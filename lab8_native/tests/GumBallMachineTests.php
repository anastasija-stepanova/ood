<?php

require_once("../inc/inc.php");

use \PHPUnit\Framework\TestCase;


class GumBallMachineTests extends TestCase
{
    /** @var string */
    private $expectedFileName;
    /** @var string */
    private $actualFileName;

    public function testGMWithZeroBall(): void
    {
        $gm = new GumballMachine(0);
        $this->assertEquals($gm->getBallCount(), 0);
    }

    public function testGMInfoWhenGMIsNotEmpty(): void
    {
        $count = 2;
        $expectedOutput = <<<EOF
Mighty Gumball, Inc.
PHP-enabled Standing Gumball Model #2019 (with state)
Inventory: {$count} gumballs
Machine is waiting for quarter
EOF;
        $gm = new GumballMachine($count);
        $this->executeTestCase(function () use ($gm)
        {
            echo $gm->toString();
        }, $expectedOutput);
    }

    public function testImpossibleTurnCrankWhenGMIsNotEmpty(): void
    {
        $expectedOutput = 'You turned but there\'s no quarter' . PHP_EOL;
        $expectedOutput .= 'You need to pay first' . PHP_EOL;
        $gm = new GumballMachine(1);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->turnCrank();
        }, $expectedOutput);
    }

    public function testImpossibleEjectQuarterWhenGMIsNotEmptyAndDidNotInsertedQuarter(): void
    {
        $expectedOutput = 'You haven\'t inserted a quarter' . PHP_EOL;
        $gm = new GumballMachine(1);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->ejectQuarter();
        }, $expectedOutput);
    }

    public function testImpossibleTwiceInsertQuarterWhenGMIsNotEmpty(): void
    {
        $expectedOutput = 'Inserted a quarter. Quarter count: 1' . PHP_EOL;
        $expectedOutput .= 'Inserted a quarter. Quarter count: 2' . PHP_EOL;
        $gm = new GumballMachine(1);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->insertQuarter();
            $gm->insertQuarter();
        }, $expectedOutput);
    }

    public function testImpossibleTwiceEjectQuarterWhenGMIsNotEmpty(): void
    {
        $expectedOutput = 'Inserted a quarter. Quarter count: 1' . PHP_EOL;
        $expectedOutput .= ' returned' . PHP_EOL;
        $expectedOutput .= 'You haven\'t inserted a quarter' . PHP_EOL;
        $gm = new GumballMachine(1);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->insertQuarter();
            $gm->ejectQuarter();
            $gm->ejectQuarter();
        }, $expectedOutput);
    }

    public function testImpossibleTurnCrankWhenGMIsNotEmptyAndDidNotInsertedQuarter(): void
    {
        $expectedOutput = 'You turned but there\'s no quarter' . PHP_EOL;
        $expectedOutput .= 'You need to pay first' . PHP_EOL;
        $gm = new GumballMachine(1);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->turnCrank();
        }, $expectedOutput);
    }

    public function testTurnCrankTwiceWhenGMHaveOneBallAndInsertedQuarter(): void
    {
        $expectedOutput = 'Inserted a quarter. Quarter count: 1' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'You used one quarter. Quarters count: 0' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'Oops, out of gumballs' . PHP_EOL;
        $expectedOutput .= 'You turned but there\'s no gumballs' . PHP_EOL;
        $expectedOutput .= 'No gumball dispensed' . PHP_EOL;
        $gm = new GumballMachine(1);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->turnCrank();
        }, $expectedOutput);
    }

    public function testTurnCrankTwiceWhenGMIsNotEmptyAndInsertedQuarter(): void
    {
        $expectedOutput = 'Inserted a quarter. Quarter count: 1' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'You used one quarter. Quarters count: 0' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'You turned but there\'s no quarter' . PHP_EOL;
        $expectedOutput .= 'You need to pay first' . PHP_EOL;
        $gm = new GumballMachine(2);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->turnCrank();
        }, $expectedOutput);
    }

    public function testGMInfoWhenGMIsEmpty(): void
    {
        $expectedOutput = <<<EOF
Mighty Gumball, Inc.
PHP-enabled Standing Gumball Model #2019 (with state)
Inventory: 0 gumballs
Machine is delivering a gumball 
EOF;
        $gm = new GumballMachine(0);
        $this->executeTestCase(function () use ($gm)
        {
            echo $gm->toString();
        }, $expectedOutput);
    }

    public function testTurnCrankWhenGMIsEmpty(): void
    {
        $expectedOutput = 'Turning twice doesn\'t get you another gumball' . PHP_EOL;
        $expectedOutput .= 'Oops, out of gumballs' . PHP_EOL;
        $gm = new GumballMachine(0);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->turnCrank();
        }, $expectedOutput);
    }

    public function testInsertQuarterWhenGMIsEmpty(): void
    {
        $expectedOutput = 'Inserted a quarter. Quarter count: 1' . PHP_EOL;
        $gm = new GumballMachine(0);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->insertQuarter();
        }, $expectedOutput);
    }

    public function testEjectQuarterWhenGMIsEmpty(): void
    {
        $expectedOutput = 'Sorry you already turned the crank' . PHP_EOL;
        $gm = new GumballMachine(0);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->ejectQuarter();
        }, $expectedOutput);
    }

    public function testInsertQuarterWhenTurnedCrankAndGMHaveOneGumball(): void
    {
        $expectedOutput = 'Inserted a quarter. Quarter count: 1' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'You used one quarter. Quarters count: 0' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'Oops, out of gumballs' . PHP_EOL;
        $expectedOutput .= 'You can\'t insert a quarter, the machine is sold out' . PHP_EOL;
        $gm = new GumballMachine(1);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->insertQuarter();
        }, $expectedOutput);
    }

    public function testInsertQuarterWhenTurnedCrankAndGMHaveMoreOneGumball(): void
    {
        $expectedOutput = 'Inserted a quarter. Quarter count: 1' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'You used one quarter. Quarters count: 0' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'Inserted a quarter. Quarter count: 1' . PHP_EOL;
        $gm = new GumballMachine(2);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->insertQuarter();
        }, $expectedOutput);
    }

    public function testEjectQuarterWhenTurnedCrankAndGMHaveOneGumball(): void
    {
        $expectedOutput = 'Inserted a quarter. Quarter count: 1' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'You used one quarter. Quarters count: 0' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'Oops, out of gumballs' . PHP_EOL;
        $expectedOutput .= 'You can\'t eject, you haven\'t inserted a quarter yet' . PHP_EOL;
        $gm = new GumballMachine(1);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->ejectQuarter();
        }, $expectedOutput);
    }

    public function testEjectQuarterWhenTurnedCrankAndGMHaveMoreOneGumball(): void
    {
        $expectedOutput = 'Inserted a quarter. Quarter count: 1' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'You used one quarter. Quarters count: 0' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'You haven\'t inserted a quarter' . PHP_EOL;
        $gm = new GumballMachine(2);
        $this->executeTestCase(function () use ($gm)
        {
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->ejectQuarter();
        }, $expectedOutput);
    }

    private function executeTestCase(callable $instruction, string $expectedOutput): void
    {
        ob_start();
        call_user_func($instruction);
        $result = ob_get_clean();
        file_put_contents($this->expectedFileName, $expectedOutput);
        file_put_contents($this->actualFileName, $result);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    protected function setUp(): void
    {
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