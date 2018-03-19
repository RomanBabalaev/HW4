<?php

require_once "fan.php";

trait Motor
{
    private $horsePower= 0;
    protected $temperature = 25;

    public function start()
    {
        echo "Машина заведена" . PHP_EOL;
    }

    public function stop()
    {
        echo "Машина заглушена" . PHP_EOL;
    }

    public function hotTemp($upTemp)
    {
        $this->temperature += $upTemp;
        echo "__ температору двигателя= $this->temperature.<br> ";

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
