<?php

class Menu implements MenuInterface
{
    /** @var Item[] */
    private $items;
    private $exit = false;

    public function addItem(string $shortcut, string $description, Functions $function): void
    {
        $this->items []= new Item($shortcut, $description, $function);
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
            echo 1;
            echo $item->getShortcut() . ": " . $item->getDescription() . "\n";
        }
    }

    public function exit()
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