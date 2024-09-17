<?php
function addData(){
    $VIN_KMS = $_POST['VIN_KMS'];
    $RELEASE_KMS = $_POST['RELEASE_KMS'];
    $BRAND_KMS = $_POST['BRAND_KMS'];
    $COLOUR_KMS = $_POST['COLOUR_KMS'];
    $DATE_KMS = $_POST['DATE_KMS'];

    // Проверка переменной $VIN
    if (!preg_match("/^XTA\d{6}[A-Z0-9]\d{7}$/", $VIN_KMS)) {
        echo "Ошибка в переменной VIN";
        return; // останавливаем выполнение функции, если есть ошибка
    }

    // Проверка переменной $RELEASE
    if (!preg_match("/^(19[0-9][0-9]|20[0-1][0-9]|202[0-3])$/", $RELEASE_KMS)) {
        echo "Ошибка в переменной RELEASE";
        return; // останавливаем выполнение функции, если есть ошибка
    }

    // Проверка переменной $BRAND
    if (!preg_match("/^[A-Z]+$/", $BRAND_KMS)) {
        echo "Ошибка в переменной BRAND";
        return; // останавливаем выполнение функции, если есть ошибка
    }

    // Проверка переменной $DATE
    $depTimestamp_KMS = strtotime($DATE_KMS); // преобразование в тип "date"
    $currentTimestamp_KMS = time(); // текущая дата и время

    if ($depTimestamp_KMS >= $currentTimestamp_KMS) {
        echo "Ошибка: дата DATE должна быть раньше текущей даты";
        return; // останавливаем выполнение функции, если дата позже текущей даты
    }

    // Загрузка данных из csv файла
    $csvData_KMS = file_get_contents('data.csv');

    // Проверка наличия VIN в csv данных
    $VINExists_KMS = strpos($csvData_KMS, $VIN_KMS);

    if ($VINExists_KMS !== false) {
        echo "Данный VIN уже существует в файле";
        return; // останавливаем выполнение функции, если VIN уже существует
    }

    // Если все проверки пройдены успешно и VIN не существует, продолжаем дальше

    $str_KMS = "\n$VIN_KMS;$RELEASE_KMS;$BRAND_KMS;$COLOUR_KMS;$DATE_KMS";
    $buffer_KMS = fopen('data.csv', 'a+');
    fputs($buffer_KMS, $str_KMS);
    fclose($buffer_KMS);
}


function deleteData(){
    $buffer_KMS=fopen("data.csv", "a+");
    while (($data_KMS = fgetcsv($buffer_KMS, 0, ";")) !== FALSE) {
        $list_KMS[] = $data_KMS; }
    fclose($buffer_KMS);
    $buffer_KMS=fopen("data.csv", "w+");
    unset($list_KMS[$_GET["N"]]);
    foreach ($list_KMS as $iter) {
        fputcsv($buffer_KMS, $iter, ";");
    }
    fclose($buffer_KMS);
}
function updateData()
{
    $buffer_KMS=fopen("data.csv", "a+");
    while (($data = fgetcsv($buffer_KMS, 0, ";")) !== FALSE) {
        $list[] = $data; }
    fclose($buffer_KMS);
    $temp=$list[$_GET["N"]];
    if ($_GET["a"]=="a"){
        $temp[0]=$_POST['VIN_KMS'];
        $temp[3]=$_POST['COLOUR_KMS'];

        // Проверка по шаблону для переменных
        if (!preg_match("/^XTA\d{6}[A-Z0-9]\d{7}$/", $temp[0])) {
            // Вывод ошибки или другие действия
            echo "Ошибка: Некорректное значение VIN";
            return;
        }
        $found = false; // флаг для проверки наличия совпадения

        foreach ($list as $index => $row) {
            if ($index != $_GET["N"] && $row[0] == $temp[0]) {
                $found = true;
                break;
            }
        }

        if ($found) {
            // Вывод ошибки или другие действия при наличии совпадения
            echo "Ошибка: Новое значение VIN уже существует в таблице";
            return;
        }

    }
    if ($_GET["a"]=="b"){
        $temp[0]=$_POST['VIN_KMS'];
        $temp[4]=$_POST['DATE_KMS'];
        if (!preg_match("/^XTA\d{6}[A-Z0-9]\d{7}$/", $temp[0])) {
            // Вывод ошибки или другие действия
            echo "Ошибка: Некорректное значение VIN";
            return;

        }
        $found = false; // флаг для проверки наличия совпадения

        foreach ($list as $index => $row) {
            if ($index != $_GET["N"] && $row[0] == $temp[0]) {
                $found = true;
                break;
            }
        }

        if ($found) {
            // Вывод ошибки или другие действия при наличии совпадения
            echo "Ошибка: Новое значение VIN уже существует в таблице";
            return;
        }
        // Проверка переменной $DATE
        $depTimestamp_KMS = strtotime($temp[4]); // преобразование в тип "date"
        $currentTimestamp_KMS = time(); // текущая дата и время

        if ($depTimestamp_KMS >= $currentTimestamp_KMS) {
            echo "Ошибка: дата DATE должна быть раньше текущей даты";
            return; // останавливаем выполнение функции, если дата позже текущей даты
        }

    }
    if ($_GET["a"]=="c"){
        $temp[0]=$_POST['VIN_KMS'];
        $temp[1]=$_POST['RELEASE_KMS'];
        $temp[2]=$_POST['BRAND_KMS'];
        if (!preg_match("/^(19[0-9]{2}|20[0-2][0-9]|202[0-3])$/", $temp[1])) {
            echo "Ошибка в переменной RELEASE";
            return; // останавливаем выполнение функции, если есть ошибка
        }

        // Проверка переменной $BRAND
        if (!preg_match("/^[A-Z]+$/", $temp[2])) {
            echo "Ошибка в переменной BRAND";
            return; // останавливаем выполнение функции, если есть ошибка
        }
        $found = false; // флаг для проверки наличия совпадения

        foreach ($list as $index => $row) {
            if ($index != $_GET["N"] && $row[0] == $temp[0]) {
                $found = true;
                break;
            }
        }

        if ($found) {
            // Вывод ошибки или другие действия при наличии совпадения
            echo "Ошибка: Новое значение VIN уже существует в таблице";
            return;
        }

    }

    $list[$_GET["N"]]=$temp;
    $buffer_KMS=fopen("data.csv", "w+");
    foreach ($list as $iter) {
        fputcsv($buffer_KMS, $iter, ";");
    }
    fclose($buffer_KMS);
}
function addLineToCsv(){
    $line_KMS = ";;;;";

    // Открываем файл для записи существующего содержимого
    $file_KMS = fopen('data.csv', 'a+');

    // Записываем строку в файл
    fwrite($file_KMS, $line_KMS . PHP_EOL);

    // Закрываем файл
    fclose($file_KMS);
}
if (isset($_GET['action'])){
    if ($_GET['action'] == "addData"){
        addData();
    }
    if ($_GET['action'] == "deleteData"){
        deleteData();
    }
    if ($_GET['action'] == "updateData"){
        updateData();
    }
    if ($_GET['action'] == "addLineToCsv"){
        addLineToCsv();
    }
}
require 'list.php';
?>