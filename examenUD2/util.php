<?php

function getCssClass(int $codigo_error): string
{
    if ($codigo_error === 0) {
        return "ok";
    } else {
        return "error";
    }
}
/**
 * Amosa unha táboa HTML cos datos de $_FILES.
 * @param string $nomeInput nome do input de tipo file
 * @return void
 */
function amosarTaboa(string $nomeInput): void
{
    global $num_erros;

    echo "<table> <tr> <th>Número </th> <th>Nome </th> <th>Tipo </th>  <th>Tamaño </th>";
    echo "<th>Error </th> <th>Nome temporal </th> <th>Nome completo </th> </tr>";


    $contador = 0;
    foreach ($_FILES[$nomeInput]["name"] as $i => $value) {
        echo "<tr>";
        echo "<td>" . ++$contador . "</td>";
        echo "<td>{$_FILES[$nomeInput]["name"][$i]}</td>";
        echo "<td>{$_FILES[$nomeInput]["type"][$i]}</td>";
        // Amosar en KB
        $tamanho_kb = $_FILES[$nomeInput]["size"][$i] / KILOBYTES_FACTOR;
        echo "<td>";
        printf("%.2f", $tamanho_kb);
        //outra opción:
        // $redondeado = round($tamanho_kb, 2);
        // echo $redondeado;
        echo "</td>";
        if($_FILES[$nomeInput]["error"][$i]!==0){
            $num_erros++;
        }

        $claseCSS = getCssClass($_FILES[$nomeInput]["error"][$i]);
        echo "<td class=\"" . $claseCSS . "\">{$_FILES[$nomeInput]["error"][$i]}</td>";


        echo "<td>{$_FILES[$nomeInput]["tmp_name"][$i]}</td>";
        echo "<td>{$_FILES[$nomeInput]["full_path"][$i]}</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function isInArray(string $nome):bool{
    global $usuarios;

    foreach ($usuarios as $key => $subarray) {
        foreach ($subarray as $i => $value) {
           if($nome == $value){
                return true;
           }
        }
    }
    return false; 

}
