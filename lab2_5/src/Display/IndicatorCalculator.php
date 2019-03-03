<?php

class IndicatorCalculator
{
    /** @var float */
    public $min = PHP_FLOAT_MAX;
    /** @var float */
    public $max = PHP_FLOAT_MIN;
    /** @var float */
    public $average = 0;
    /** @var int */
    private $acc = 0;
    /** @var int */
    private $countAcc = 0;
    /** @var int */
    private $sumX = 0;
    /** @var int */
    private $sumY = 0;

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
        return $this->average;
    }

    public function updateIndicator($data): void
    {
        if (gettype($data) == "double") {
            $this->getMaxMin($data);

            $this->acc += $data;
            $this->average = $this->countAcc != 0 ? $this->acc / $this->countAcc : 0;
        } else {
            $this->getMaxMin($data->direction);

            $this->sumX += cos(($data->direction * M_PI) / 180);
            $this->sumY += sin(($data->direction * M_PI) / 180);

            $this->average = atan2($this->sumY / $this->countAcc, $this->sumX / $this->countAcc) * 180 / M_PI;
        }

        ++$this->countAcc;
    }

    private function getMaxMin(float $data): void
    {
        $this->max = max([$this->max, $data]);
        $this->min = min([$this->min, $data]);
    }
}
