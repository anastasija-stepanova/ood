<?php

class SimUDuck
{
    public function main(): void
    {
        $mallardDuck = new MillardDuck();
        $this->playWithDuck($mallardDuck);

        $redheadDuck = new RedheadDuck();
        $this->playWithDuck($redheadDuck);

        $rubberDuck = new RubberDuck();
        $this->playWithDuck($rubberDuck);

        $decoyDuck = new DecoyDuck();
        $this->playWithDuck($decoyDuck);

        $modelDuck = new ModelDuck();
        $this->playWithDuck($modelDuck);
        $modelDuck->setFlyBehavior(flyWithWings());
        $this->playWithDuck($modelDuck);
    }

    private function drawDuck(Duck &$duck): void
    {
        $duck->display();
    }

    private function playWithDuck(Duck &$duck): void
    {
        $this->drawDuck($duck);
        $duck->quack();
        $duck->fly();
        $duck->fly();
        $duck->fly();
        $duck->fly();
        $duck->dance();
        echo "\n";
    }
}