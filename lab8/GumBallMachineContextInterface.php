<?php
//использовать вложенный класс, чтобы клиенты не имели доступ к методам класса
//классы состояний должны использовать gumballmachineinterface
//quarter обернуть в методы gumballmachine и использовать уже в классах состояний
//разобраться с выводом returned
interface GumBallMachineContextInterface
{
    public function releaseBall(): void;

    public function getBallCount(): int;

    public function setSoldOutState(): void;

    public function setNoQuarterState(): void;

    public function setSoldState(): void;

    public function setHasQuarterState(): void;

    public function getQuarterController(): QuarterController;
}