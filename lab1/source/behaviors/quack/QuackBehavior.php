<?php

class QuackBehavior implements IQuackBehavior
{
    public function quack(): void
    {
        echo "Quack Quack\n";
    }
}