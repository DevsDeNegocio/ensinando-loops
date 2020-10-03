<?php

require('./Resposta.php');

function validate($name){
    if($name === 'resposta1'){
        global $resposta1;
        return json_encode($resposta1) === '[1,2,3,4,5,6,7,8,9,10]';
    }
}
function validateClass($name){
    return validate($name) ? 'right' : 'wrong';
}
function resposta($name){
    global $resposta1;
    $respostas = ['resposta1' => $resposta1];
    return json_encode($respostas[$name]);
}
function expect($name){
    if($name === 'resposta1') return '[1,2,3,4,5,6,7,8,9,10]';
    return '[]';
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Resposta</title>
    <link rel="stylesheet" href="https://raw.githubusercontent.com/DevsDeNegocio/ensinando-loops/master/common/style.css"/>
</head>
<body>
<section>
    <h2>$resposta1</h2>
    <article class="<?=validateClass('resposta1')?>">
        <label>
            $resposta1 deve ser um array de 1 a 10
        </label>
        <div class="description">
            Resposta esperada:
        </div>
        <b><?=expect('resposta1')?></b>
        <div class="description">
            Resposta encontrada:
        </div>
        <b><?=resposta('resposta1')?></b>
    </article>
</section>
</body>
</html>
