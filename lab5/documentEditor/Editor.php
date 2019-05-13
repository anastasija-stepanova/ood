<?php
//
//require_once("Include/inc.php");
//
//class Editor
//{
//    /** @var Menu */
//    private $menu;
//    /** @var DocumentInterface */
//    private $document;
//
//    public function start(): void
//    {
//        $this->menu->run();
//    }
//
//    private function addMenuItem(string $shortcut, $description, CommandInterface $command)
//    {
//        $this->menu->addItem($shortcut, $description, $command);
//    }
//
//    private function setTitle(): void
//    {
//        $title = trim(readline("> "));
//        $this->document->setTitle($title);
//    }
//}
//
//function main(): void
//{
//    $editor = new Editor();
//    $editor->start();
//}
//
//main();