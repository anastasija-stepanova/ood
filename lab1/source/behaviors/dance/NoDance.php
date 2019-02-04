<?php

class NoDance implements IDanceBehavior
{
    public function Dance(): void
    {
        echo "I can not dance\n";
    }
}