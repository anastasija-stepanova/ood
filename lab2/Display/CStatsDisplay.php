<?php

class CStatsDisplay implements IObserver
{
    /** @var float */
    private $min = PHP_FLOAT_MIN;
    /** @var float */
    private $max = PHP_FLOAT_MAX;
    /** @var int */
    private $acc= 0;
    /** @var int */
    private $countAcc = 0;
    /** @var string */
    private $indicatorName;
    /**  @var callable */
    private $indicatorValue;


    public function __construct(string $indicatorName, callable $indicatorValue)
    {
        $this->indicatorName = $indicatorName;
        $this->indicatorValue = $indicatorValue;
    }

    public function update(SWeatherInfo $data): void
    {
        $info = call_user_func($this->indicatorValue, $data);
        $this->max = max([$this->max, $info]);
        $this->min = min([$this->min, $info]);
        $this->acc += $info;
        ++$this->countAcc;

        $this->getInformation();
    }

    private function getInformation()
    {
        echo "Max " . $this->indicatorName . " " . round($this->max, 3) . "\n";
        echo "Min " . $this->indicatorName . " " . round($this->min, 3) . "\n";
        echo "Average " . $this->indicatorName . " " . round(($this->acc / $this->countAcc), 3) . "\n";
        echo "----------------" . "\n";
    }
}