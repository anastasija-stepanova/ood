<?php

class SqueakBehavior implements IQuackBehavior
{
    public function Quack(): void
    {
        echo "Squeek\n";
    }
}