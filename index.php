<?php

// Создать интерфейсы и реализации к ним тип кузова
Interface Body
{
public function getBody():string;
}

// Создать интерфейсы и реализации к ним колесная формула
Interface WheelFormula
{
    public function getWheelF():string;
}
// Создать интерфейсы и реализации к ним двигатель
Interface Engine
{
    public function getEngineType():string;
    public function getEngineVolume():float;
    public function getEngineTurnovers():float;
}

// Создать интерфейсы и реализации к ним коробка передач
interface Transmission
{
    public function getTransmission(): string;
}

// трейт для рассчета мощности на основе обьема и оборотов двигателя
trait VehiclePowerEngine
{
    function calculatePowerEngine (): float
    {
     return $this->getEngineVolume()*($this->getEngineTurnovers()/60);
    }
}

class Car implements Body, WheelFormula, Engine, Transmission
{
    use VehiclePowerEngine;
    protected string $body = "minivan";
    protected string $wheelF = "2x4";
    protected string $engineType = "v10";
    protected float $engineVolume = 2.5;
    protected float $engineTurnovers = 1.1;
    protected string $transmission = "manual";

    public function getBody(): string
    {
        return $this->body;
    }

    public function getWheelF(): string
    {
        return $this->wheelF;
    }

    public function getEngineType(): string
    {
        return $this->engineType;
    }

    public function getEngineVolume(): float
    {
        return $this->engineVolume;
    }

    public function getTransmission(): string
    {
        return $this->transmission;
    }

    public function getEngineTurnovers(): float
    {
        return $this->engineTurnovers;
    }
}

$bmw = new car();
echo $bmw->getBody() . "<br/>",  $bmw->getWheelF() . "<br/>", $bmw->getEngineType() . "<br/>", $bmw->getEngineVolume() . "<br/>", $bmw->getTransmission(). "<br/>";
echo($bmw->calculatePowerEngine());