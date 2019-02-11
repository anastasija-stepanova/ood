<?php

class SqueakBehavior implements IQuackBehavior
{
    public function quack(): void
    {
        echo "Squeek\n";
    }
}