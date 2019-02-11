<?php

class NoDance implements IDanceBehavior
{
    public function dance(): void
    {
        echo "I can not dance\n";
    }
}