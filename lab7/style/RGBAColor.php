<?php

class RGBAColor
{
    private $r;
    private $g;
    private $b;
    private $a;

    /**
     * RGBAColor constructor.
     * @param $r
     * @param $g
     * @param $b
     * @param $a
     */
    public function __construct($r, $g, $b, $a)
    {
        $this->r = $r;
        $this->g = $g;
        $this->b = $b;
        $this->a = $a;
    }

    /**
     * @return mixed
     */
    public function getR()
    {
        return $this->r;
    }

    /**
     * @return mixed
     */
    public function getG()
    {
        return $this->g;
    }

    /**
     * @return mixed
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * @return mixed
     */
    public function getA()
    {
        return $this->a;
    }
}