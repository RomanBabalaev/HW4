<?php

trait Back//задний ход
{
    protected function backGear()
    {
        echo "Задняя передача" . PHP_EOL;
    }
}

trait TransmissionMech//механическа коробка
{
    use Back;
    protected function oneGear()
    {
        echo "Первая передача" . PHP_EOL;
    }
    protected function twoGear()
    {
        echo "Вторая передача" . PHP_EOL;
    }
}

trait TransmissionAuto //автомат коробка
{
    use Back;
    protected function go()
    {
        echo "Едем вперед" . PHP_EOL;
    }
}

