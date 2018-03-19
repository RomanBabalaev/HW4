<?php

require_once 'motor.php';
require_once 'transmission.php';


class Car
{
    use Motor;
    protected $distance;//задаем параметры
    protected $speed;
    protected $tendence;
    protected $j = 0;

    public function move()
    {
        $this->dist = 0;

        while (dist < $this->distance) {
            sleep(1);//1 секунда
            $this-> speed += dist;
            echo "Всего в пути" .dist. "метров" . PHP_EOL;

            for (;$this->j < dist; $this->j = $this->j + 10) {
                $this->temperature += 5;
                echo "Двигатель нагрелся на 5 градусов, всего $this->temperature" . PHP_EOL;
            }
            while ($this->temperature > 90) {
                $this->Fan();
            }
        }
    }
}

class anifCar extends Car
{
    use Motor;
    use TransmissionMech;

    function __construct($distance, $speed, $tendence)
    {
        $this->distance = $distance;
        $this->speed = $speed;
        $this->tendence = $tendence;
    }

    public function getanifCar()
    {
        if ($this->speed > ($this->horsePower * 2)) {
            echo "Максимальная". $this->horsePower * 2 . "скорость км" . PHP_EOL;
        } elseif ($this->distance == 1 && $this->speed < 20) {
            $this->start();
            $this->oneGear();
            $this->move();
            $this->stop();
        } elseif ($this->distance == 1 && $this->speed > 20) {
            $this->start();
            $this->twoGear();
            $this->move();
            $this->stop();
        } elseif ($this->distance == 0) {
            $this->start();
            $this->backGear();
            $this->move();
            $this->stop();
        }
    }
}
