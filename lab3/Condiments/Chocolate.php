<?php
//
class Chocolate extends CondimentDecorator
{
    /**  @var int */
    private $count;

    public function __construct(BeverageInterface $beverage, int $count)
    {
        parent::__construct($beverage);

        if ($count < 0 || $count > 5)
        {
            throw new OutOfRangeException('Minimum zero slice and maximum five slices');
        }
        $this->count = $count;
    }

    public function getCondimentDescription(): string
    {
        return 'Chocolate ' . $this->count . ' slices';
    }

    public function getCondimentCost(): float
    {
        return 10 * $this->count;
    }
}