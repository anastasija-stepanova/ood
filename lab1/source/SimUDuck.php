<?php

class SimUDuck
{
    public function Main(): void
    {
        $mallardDuck = new MillardDuck();
        $this->PlayWithDuck($mallardDuck);

        $redheadDuck = new RedheadDuck();
        $this->PlayWithDuck($redheadDuck);

        $rubberDuck = new RubberDuck();
        $this->PlayWithDuck($rubberDuck);

        $decoyDuck = new DecoyDuck();
        $this->PlayWithDuck($decoyDuck);

        $modelDuck = new ModelDuck();
        $this->PlayWithDuck($modelDuck);
        $modelDuck->SetFlyBehavior(new FlyWithWings());
        $this->PlayWithDuck($modelDuck);
    }

    private function DrawDuck(Duck &$duck): void
    {
        $duck->Display();
    }

    private function PlayWithDuck(Duck &$duck): void
    {
        $this->DrawDuck($duck);
        $duck->Quack();
        $duck->Fly();
        $duck->Dance();
        echo "\n";
    }
}