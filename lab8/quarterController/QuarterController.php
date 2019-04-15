<?php

class QuarterController implements QuarterControllerInterface
{
    private const MAX_COUNT_QUARTER = 5;
    private $quarterCount;

    /**
     * QuarterController constructor.
     */
    public function __construct()
    {
        $this->quarterCount = 0;
    }

    public function addQuarter(): void
    {
        if ($this->quarterCount < self::MAX_COUNT_QUARTER) {
            ++$this->quarterCount;
            echo 'Inserted a quarter. Quarter count: ' . $this->quarterCount . PHP_EOL;
        } else {
            echo 'You can\'t insert more than 5 quarters' . PHP_EOL;
        }
    }

    public function useQuarter(): void
    {
        if ($this->quarterCount != 0) {
            --$this->quarterCount;
            echo 'You used one quarter. Quarters count: ' . $this->quarterCount . PHP_EOL;
        }
    }

    public function returnQuarter(): void
    {
        if ($this->quarterCount > 0) {
            echo $this->quarterCount . ' quarter' . $this->quarterCount != 1 ? 's' : '' . ' returned' . PHP_EOL;
        }
        $this->quarterCount = 0;
    }

    public function getQuarterCount(): int
    {
        return $this->quarterCount;
    }
}