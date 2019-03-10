<?php

require_once("inc/include.php");

function execute(): void
{
    dialogWithUser();
    echo "\n";
    {
        $latte = new Latte();
        $cinnamon = new Cinnamon($latte);
        $lemon = new Lemon($cinnamon, 2);
        $iceCubes = new IceCubes($lemon, 2);
        $beverage = new ChocolateCrumbs($iceCubes, 2);
        echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . "\n";
    }
    {
        $beverage = new Tea();
        $beverage = new Lemon($beverage, 2);
        $beverage = new IceCubes($beverage, 3, IceCubeType::Water());
        echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . "\n";
    }
    {
        $beverage = new HerbalTea();
        $beverage = new Syrup($beverage, SyrupType::Maple());
        $beverage = new IceCubes($beverage, 3, IceCubeType::Water());
        echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . "\n";
    }
    {
        $beverage = new Milkshake();
        $beverage = new Syrup($beverage, SyrupType::Maple());
        $beverage = new CoconutFlakes($beverage, 8);
        echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . "\n";
    }
    {
        $beverage = new DoubleCapuccino();
        $beverage = new IceCubes($beverage, 2, IceCubeType::Dry());
        $beverage = new CoconutFlakes($beverage, 12);
        echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . "\n";
    }
    {
        $beverage = new BlackTea();
        $beverage = new Liquor($beverage, LiquorType::Chocolate());
        $beverage = new Chocolate($beverage, 5);
        echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . "\n";
    }
    try {
        $beverage = new DoubleLatte();
        $beverage = new IceCubes($beverage, 1, IceCubeType::Water());
        $beverage = new Chocolate($beverage, 6);
        echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . "\n";
    } catch (OutOfRangeException $exception) {
        echo $exception->getMessage();
    }
}

function dialogWithUser(): void
{
    $beverageChoice = readline('Type 1 for coffee or 2 for tea ');
    $beverage = getBeverageByChoice($beverageChoice);
    if (!isset($beverage)) {
        return;
    }
    for (; ;) {
        $condimentChoice = readline('1 - Lemon, 2 - Cinnamon, 0 - Checkout ');
        if ($condimentChoice == 0) {
            break;
        }
        if (!is_numeric($condimentChoice)) {
            return;
        }
        $beverage = addCondimentByChoice($beverage, $condimentChoice);
    }
    echo $beverage->getDescription() . ', cost: ' . $beverage->getCost() . "\n";
}

function getBeverageByChoice($choice): BeverageInterface
{
    $beverage = null;
    if ($choice == 1) {
        $beverage = new Coffee();
    } elseif ($choice == 2) {
        $beverage = new Tea();
    }

    return $beverage;
}

function addCondimentByChoice(BeverageInterface $beverage, int $choice): BeverageInterface
{
    if ($choice == 1) {
        $beverage = new Lemon($beverage, 2);
    } elseif ($choice == 2) {
        $beverage = new Cinnamon($beverage);
    }

    return $beverage;
}

execute();
    