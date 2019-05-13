<?php

interface CommandInterface
{
    public function execute();
    public function unexecute();
    public function destroy();
}