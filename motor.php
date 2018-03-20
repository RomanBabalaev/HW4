<?php

require_once "fan.php";

class Motor
{
    protected $horsPower;
    protected $fan;
    protected $temperature;

    public function __construct($horsPower)//параметры силошадиные силы, охлаждение, температура
    {
        $this->horsPower = $horsPower;
        $this->temperature = 20;
        $this->fan = new Fan();
    }

    public function motorOn()
    {
        echo "Машина заведена.<br>";
    }

    public function motorOff()
    {
        echo "Машина заглушена.<br>";
    }

    public function hotTemp($upTemp)
    {
        $this->temperature += $upTemp;
        echo "температору двигателя= $this->temperature.<br> ";

        if ($this->temperature >= 90) {
            $this->chill();
        }
    }

    public function chill()
    {
        $this->fan->fanWork();
        $this->temperature -= 10;
        $this->fan->fanOff();
    }

}


/**
 *
 *
 * Created by PhpStorm.
 * User: 1
 * Date: 18.03.2018
 * Time: 23:18
 */