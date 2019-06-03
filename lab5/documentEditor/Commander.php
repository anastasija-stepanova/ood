<?php

class Commander
{
    /** @var Menu  */
    private $menu;
    private $document;
    const INSERT_PARAGRAPH = "ip";
    const INSERT_IMAGE = "ii";
    const SET_TITLE = "st";
    const LIST = "List";
    const REPLACE_TEXT = "rt";
    const RESIZE_IMAGE = "ri";
    const DELETE_ITEM = "di";
    const HELP = "Help";
    const UNDO = "Undo";
    const REDO = "Redo";
    const SAVE = "Save";
    const EXIT = "Exit";
    const WITHOUT_PARAMETERS = "Without parameters.";
    const END_POSITION = "end";

    public function __construct()
    {
        $this->menu = new Menu();
        $this->document = new Document();

        $iP = new InsertParagraph();
        $ii = new InsertImage();
        $sT = new SetTitle();
        $l = new Logout();
        var_dump($iP->action());
        $this->menu->addItem("1", "2", $iP->action());
        $this->menu->showInstructions();
//        $this->menu->addItem(self::INSERT_PARAGRAPH,
//            self::INSERT_PARAGRAPH . " <position> <text>. Position can be \"end\"", $iP->action());
//        $this->menu->addItem(self::INSERT_IMAGE,
//            self::INSERT_IMAGE . " <position> <width> <height> <file path>. Position can be \"end\"",
//            $ii->action());
//        $this->menu->addItem(self::SET_TITLE, self::SET_TITLE . " <title>", $sT->action());
//        $this->menu->addItem(self::LIST, self::LIST . ". " . self::WITHOUT_PARAMETERS, $this->showDocument());
//        $this->menu->addItem(self::REPLACE_TEXT, self::REPLACE_TEXT . " <position> <text>", $this->replaceText());
//        $this->menu->addItem(self::RESIZE_IMAGE, self::RESIZE_IMAGE . " <position> <width> <height>",
//            $this->resizeImage());
//        $this->menu->addItem(self::DELETE_ITEM, self::DELETE_ITEM . " <position>", $this->deleteItem());
//        $this->menu->addItem(self::HELP, self::HELP . ". " . self::WITHOUT_PARAMETERS, $this->showHelpBlock());
//        $this->menu->addItem(self::UNDO, self::UNDO . ". " . self::WITHOUT_PARAMETERS, $this->undo());
//        $this->menu->addItem(self::REDO, self::REDO . ". " . self::WITHOUT_PARAMETERS, $this->redo());
//        $this->menu->addItem(self::SAVE, self::SAVE . " <path to save>", $this->save());
//        $this->menu->addItem(self::EXIT, self::EXIT . ". " . self::WITHOUT_PARAMETERS, $l->action());
    }

    public function start(): void
    {
        $this->menu->run();
    }
}