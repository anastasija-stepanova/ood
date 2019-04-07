<?php

namespace graphics_lib_pro
{
    class RGBAColor
    {
        public $r;
        public $g;
        public $b;
        public $a;

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
         * @param mixed $r
         */
        public function setR($r): void
        {
            $this->r = $r;
        }

        /**
         * @return mixed
         */
        public function getG()
        {
            return $this->g;
        }

        /**
         * @param mixed $g
         */
        public function setG($g): void
        {
            $this->g = $g;
        }

        /**
         * @return mixed
         */
        public function getB()
        {
            return $this->b;
        }

        /**
         * @param mixed $b
         */
        public function setB($b): void
        {
            $this->b = $b;
        }

        /**
         * @return mixed
         */
        public function getA()
        {
            return $this->a;
        }

        /**
         * @param mixed $a
         */
        public function setA($a): void
        {
            $this->a = $a;
        }
    }
}