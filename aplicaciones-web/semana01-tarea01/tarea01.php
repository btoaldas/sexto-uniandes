<?php
// Declaración de Variables
$integerVar = 10;
$floatVar = 20.5;
$stringVar = "Hola, mundo";
$booleanVar = true;
$arrayVar = array(1, 2, 3, 4, 5);

// Operaciones Aritméticas
$sum = $integerVar + $floatVar;
$product = $integerVar * $floatVar;

echo "Suma: " . $sum . "<br>";
echo "Producto: " . $product . "<br>";

// Manipulación de Cadenas
$anotherString = " Tarea 01 de la Semana 01 Realizado por Alberto Aldás";
$concatenatedString = $stringVar . $anotherString;
$stringLength = strlen($stringVar);

echo "Concatenación: " . $concatenatedString . "<br>";
echo "Longitud de la cadena: " . $stringLength . "<br>";

// Uso de Condicionales
if ($booleanVar) {
    echo "La variable booleana es verdadera.<br>";
} else {
    echo "La variable booleana es falsa.<br>";
}

// Creación de un Array
echo "Elemento específico del arreglo: " . $arrayVar[2] . "<br>";
?>