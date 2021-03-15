<?php

$list = [
    ['aaa', 'bbb', 'ccc', 'dddd'],
    ['123', '456', '789'],
    ['"aaa"', '"bbb"']
];

/**
 * функция записи в csv file
 * @param array $csv| massive of datagit init
 * @param null $file| your path to file
 * @return bool
 */
function writeCSV(Array $csv, $file = null):bool {
    if (!is_array($csv))
        return false;

    if ($file && !is_dir( dirname($file)))
        return false;
    $handle = fopen($file, "w");
    foreach ($csv as $value) {
        fputcsv($handle, $value, ";");
    }
    fclose($handle); //Закрываем
    return true;
}

/**
 *  функция чтения в csv file
 * @param null $file | your path to file
 * @return array
 */
function readCSV($file = null):array {
    $list = [];
    if ($file && ! is_dir(dirname($file)))
        return $list;

    if (($fp = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($fp, 0, ";")) !== FALSE) {
            $list[] = $data;
        }
        fclose($fp);
    }
    return $list;
}

function test(string $inputString):string
{
    return $inputString;
}

// фабрика вызова функций пользователя через closure
$callfunc = function(callable $nameFun, $args) {
    return $nameFun($args);
};

print_r($callfunc('readCSV', 'test.csv'));



