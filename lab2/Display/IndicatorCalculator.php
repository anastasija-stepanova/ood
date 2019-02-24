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

    /**
     * @return float
     */
    public function getMin(): float
    {
        return $this->min;
    }

    /**
     * @return float
     */
    public function getMax(): float
    {
        return $this->max;
    }

    /**
     * @return float
     */
    public function getAverage(): float
    {
        return $this->countAcc != 0 ? $this->acc / $this->countAcc : 0;
    }

    public function updateIndicator(float $data): void
    {
        $this->max = max([$this->max, $data]);
        $this->min = min([$this->min, $data]);
        $this->acc += $data;
        ++$this->countAcc;
    }
}
