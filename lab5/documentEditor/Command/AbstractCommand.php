<?php

class AbstractCommand implements CommandInterface
{
    private $executed = false;

    public function execute()
    {
        $this->execute();
        $this->executed = true;
    }

    public function unexecute()
    {
        if ($this->executed) {
            $this->unexecute();
            $this->executed = false;
        }
    }

    public function destroy()
    {

    }
}