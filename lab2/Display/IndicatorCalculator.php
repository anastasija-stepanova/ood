<?php

class IndicatorCalculator
{
    /** @var float */
    public $min = PHP_FLOAT_MAX;
    /** @var float */
    public $max = PHP_FLOAT_MIN;
    /** @var int */
    public $acc= 0;
    /** @var int */
    public $countAcc = 0;

    public function updateIndicator(float $data): void
    {
        $this->max = max([$this->max, $data]);
        $this->min = min([$this->min, $data]);
        $this->acc += $data;
        ++$this->countAcc;

        $this->getInformation();
    }

    private function getInformation()
    {
        echo "Max " . round($this->max, 3) . "\n";
        echo "Min " . round($this->min, 3) . "\n";
        echo "Average " . round(($this->acc / $this->countAcc), 3) . "\n";
        echo "----------------" . "\n";
    }
}
