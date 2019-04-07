<?php

class Menu
{
    /** @var bool */
    private $exit = false;
    /** @var Item [] */
    private $items = [];

    public function addItem(string $shortcut, string $description, CommandInterface $command): void
    {
        $this->items [] = new Item($shortcut, $description, $command);
    }

    public function run(): void
    {
        $this->showInstructions();

        while (!$this->exit)
        {
            $command = trim(readline("> "));
            $this->executeCommand($command);
        }
    }

    public function showInstructions(): void
    {
        echo "Commands list:\n";
        foreach ($this->items as $item) {
            echo $item->getShortcut() . ": " . $item->getDescription() . "\n";
        }
    }

    public function logout()
    {
        $this->exit = true;
    }

    private function executeCommand(string $command): bool
    {
        $this->exit = false;

        foreach ($this->items as $item) {
            if ($item->getShortcut() == $command) {
                if (in_array($item->getShortcut(), $this->items)) {
                    $item->getCommand()->execute();
                } else {
                    echo "Unknown command\n";
                }

                return !$this->exit;
            }
        }

        return $this->exit;
    }
}