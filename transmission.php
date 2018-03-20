<?php

trait Transmission
{
    protected $trans;

    public function getTrans()
    {
        $this->trans;
    }

    public function setTrans($trans)
    {
        $this->trans = $trans;
        if ($trans == 'forward') {
            echo '__ Выбран режим "Вперед"' . "<br>";
        } else {
            echo '__ Выбран режим "Назад"' . "<br>";
        }
    }
}


class TransmissionMech
{
    use Transmission;

    protected $submiss;

    public function getsubMiss()
    {
        return $this->submiss;
    }

    public
    function setsubMiss($submiss)
    {
        $this->submiss = $submiss;
        echo "__ Передача : $submiss.<br>";
    }
}

class TransmissionAuto
{
    use Transmission;
}






/**
 * Created by PhpStorm.
 * User: 1
 * Date: 16.03.2018
 * Time: 23:35
 */