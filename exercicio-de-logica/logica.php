<?php

$array = [50, 1, 5, 65, 35, 22, 100, 300, 250];

/* Usando o sort */
ordenarCrescenteSort($array);

ordenarCrescente($array);

/**
 * Usando o sort
 * @param array $array
 * @return void
 */
function ordenarCrescenteSort(array $array)
{
    sort($array);
    foreach ($array as $key => $val) {
        echo '['.$key.'] => '. $val . "\n";
    }
}

/*
 * Função que ordena a array através do uso de for
 */
function ordenarCrescente(array $array)
{
    $tamanho = count($array); // tamanho da array

    for ($i = 0; $i < $tamanho; $i ++) {
        for ($j = 0; $j < ($tamanho - $i - 1); $j ++) {
            if ($array[$j] > $array[$j + 1]) {

                $temporario = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temporario;
            }
        }
    }

    print_r($array);
}