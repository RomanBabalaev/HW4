<?php

require_once 'motor.php';
require_once 'transmission.php';

interface Movement
{
    public function move($distance, $speed, $tendence);
}

abstract class Car implements Movement

{
    protected $motor;   //Параметры мотор, коробка, весть путь и расстояние от старта
    protected $transmission;
    protected $travelDistance;
    protected $distanceStart;


    public function __construct($powerMotor, $transmissonType)
    {
        $this->motor = new Motor($powerMotor);
        if ($transmissonType = 'Mechanic') {
            $this->transmission = new TransmissionMech();
        } else {
            $this->transmission = new TransmissionAuto();
        }
        $this->travelDistance = 0;
        $this->distanceStart = 0;
    }
}

class Drive extends Car
{
    private $dist;// расстояние за время вызова move

    private function go()// начинаем двигаться
    {
        $this->motor->motorOn();
        $this->dist = 0;
    }

    private function stop()
    {
        $this->motor->motorOff();
    }

    public function move($distance, $speed, $tendence = 'forward')
    {
        $this->go();
        $this->transmission->setTrans($tendence);
        if (($this->transmission instanceof TransmissionMech) && ($tendence == 'forward')) {
            ($speed < 20) ? $this->transmission->setsubMiss(1) : $this->transmission->setsubMiss(2);
        }
        $diff = 0.0;
        while ($this->dist < $distance) {
            usleep(1000000);//0.1 секунда
            $this->dist += $speed * 0.1;

            $diff += $speed * 0.1;// нагрев двигателя
            if ($diff >= 10) {
                echo "Проехали $this->dist метров.<br>";
                flush();
                $this->motor->hotTemp(5 * intdiv($diff, 10));
                $diff = 0.0;
            }
        }
        $this->stop();

        $this->travelDistance += $this->dist;//общий пробег
        if ($tendence == 'backward') {
            $this->distanceStart -= $this->dist;
        } else {
            $this->distanceStart += $this->dist;
        }
        echo "Находимся на расстоянии $this->distanceStart метров от начала.<br>";
        echo "Всего пройденно $this->travelDistance метров.<br>";
        flush();
    }


}






/**
 * Created by PhpStorm.
 * User: 1
 * Date: 15.03.2018
 * Time: 22:07
 */