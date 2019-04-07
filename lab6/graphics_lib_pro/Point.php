<?php

namespace graphics_lib_pro
{
    class Point
    {
        /**  @var int */
        private $x;
        /**  @var int */
        private $y;

        /**
         * Point constructor.
         * @param int $x
         * @param int $y
         */
        public function __construct(int $x, int $y)
        {
            $this->x = $x;
            $this->y = $y;
        }

        /**
         * @return int
         */
        public function getX(): int
        {
            return $this->x;
        }

        /**
         * @param int $x
         */
        public function setX(int $x): void
        {
            $this->x = $x;
        }

        /**
         * @return int
         */
        public function getY(): int
        {
            return $this->y;
        }

        /**
         * @param int $y
         */
        public function setY(int $y): void
        {
            $this->y = $y;
        }
    }
}