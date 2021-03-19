<?php


// Создать абстрактный класс "животные"
abstract class Animals
{
    abstract function getAnimalType(): string;
}

//Создать наследников от животных - хищники, травоядные
class Predators extends Animals
{

    function getAnimalType(): string
    {
        return "Wolf";
    }
}

//Создать наследников от животных - хищники, травоядные
class GrassFeeding extends Animals
{

    function getAnimalType(): string
    {
        return "Zebra";
    }
}

//Создать абстрактный класс "Транспортные средства"
abstract class Transport
{
    abstract function getTransType(): string;
}

// Создать наследников от транспортных средств - лодки, легковые авто, грузовики
class Boat extends Transport
{

    function getTransType(): string
    {
        return "Boat";
    }
}

// Создать наследников от транспортных средств - лодки, легковые авто, грузовики
class Car extends Transport
{

    function getTransType(): string
    {
        return "Car";
    }
}

// Создать наследников от транспортных средств - лодки, легковые авто, грузовики
class heavyCar extends Transport
{

    function getTransType(): string
    {
        return "Heavy Car";
    }
}

//Создать хелпер работающий с массивами
class HelperArray
{
    static function array_move_elem($array, $from, $to)
    {
        if ($from == $to) {
            return $array;
        }
        $c = count($array);
        if (($c > $from) and ($c > $to)) {
            if ($from < $to) {
                $f = $array[$from];
                for ($i = $from; $i < $to; $i++) {
                    $array[$i] = $array[$i + 1];
                }
                $array[$to] = $f;
            } else {
                $f = $array[$from];
                for ($i = $from; $i > $to; $i--) {
                    $array[$i] = $array[$i - 1];
                }
                $array[$to] = $f;
            }

        }
        return $array;
    }

}

//cоздать хелпер работающий со строками
class HelperString
{

    static function contains($haystack, $needle)
    {
        if (!empty($haystack) && !empty($needle)) {
            if (strpos($haystack, $needle) !== false) {

                return true;
            }
            return false;
        }
        return false;
    }


}


$boat = new Boat();
$car = new Car();
$heavyCar = new heavyCar();
var_dump($array = [$boat->getTransType(), $car->getTransType(), $heavyCar->getTransType()]);

$Predator = new Predators();
$GrassFeeding = new GrassFeeding();

var_dump($array = [$Predator->getAnimalType(), $GrassFeeding->getAnimalType()]);

$arraytest = ['Test', 'Test1', 'Test2'];
$arraytest = HelperArray::array_move_elem($arraytest, 0, 1);
print_r($arraytest);

$test = 'SomeString Test';
var_dump(HelperString::contains($test, "Test"));