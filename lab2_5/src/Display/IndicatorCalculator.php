<?php

class IndicatorCalculator
{
    /** @var float */
    public $min = PHP_FLOAT_MAX;
    /** @var float */
    public $max = PHP_FLOAT_MIN;
    /** @var int */
    public $acc = 0;
    /** @var int */
    public $countAcc = 0;
    public $angle;
    public $sumX = 0;
    public $sumY = 0;

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

    public function getAngle()
    {
        return $this->angle;
    }

    public function updateIndicator(float $data): void
    {
        $this->max = max([$this->max, $data]);
        $this->min = min([$this->min, $data]);
        $this->acc += $data;
        ++$this->countAcc;
    }

    public function updateCompositeIndicator(Wind $data): void
    {
        $x = cos($data->direction);
        $y = sin($data->direction);

        $x *= $data->speed;
        $y *= $data->speed;

        $this->sumX += $x;
        $this->sumY += $y;

        $this->acc += $data->speed;
        ++$this->countAcc;

        $argX = $this->sumX / $this->countAcc;
        $argY = $this->sumY / $this->countAcc;
        $angle = atan2($argY, $argX);

        $this->angle = rad2deg($angle);
//        $this->angle = $angle * (180 / M_PI);
//        if ($this->angle < 0) {
//            $this->angle += 360;
//        }
    }
}
