<?php

interface Executor
{
    public function addAndExecuteCommand(CommandInterface $command): void;
}