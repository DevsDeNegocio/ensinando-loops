<?php

require('./Resposta.php');
if(!isset($resposta1)) $resposta1 = null;
if(!isset($resposta2)) $resposta2 = null;
if(!isset($resposta3)) $resposta3 = null;
if(!isset($resposta4)) $resposta4 = null;
if(!isset($resposta5)) $resposta5 = null;
if(!isset($resposta6)) $resposta6 = null;
if(!isset($resposta7)) $resposta7 = null;

$respostas = ['resposta1' => $resposta1, 'resposta2' => $resposta2, 'resposta3' => $resposta3, 'resposta4' => $resposta4, 'resposta5' => $resposta5, 'resposta6' => $resposta6, 'resposta7' => $resposta7, 'resposta8' => $resposta8];

function validateClass($name){
    global $respostas;
    return json_encode($respostas[$name]) === expect($name) ? 'right' : 'wrong';
}

function expect($name){
    if(in_array($name, ['resposta1', 'resposta2'])) return '[1,2,3,4,5,6,7,8,9,10]';
    if($name === 'resposta3') return '[8,9,10,11,12,13,14,15,16,17]';
    if($name === 'resposta4') return '[50,49,48,47,46,45,44,43,42,41]';
    if($name === 'resposta5') return '[0,-1,-2,-3,-4,-5,-6,-7,-8,-9,-10,-11,-12,-13,-14,-15,-16,-17,-18,-19,-20,-21,-22,-23,-24,-25,-26,-27,-28,-29,-30,-31,-32,-33,-34,-35,-36,-37,-38,-39,-40,-41,-42,-43,-44,-45,-46,-47,-48,-49,-50]';
    if($name === 'resposta6') return '[0,0,2,0,4,0,6,0,8,0,10,0,12,0,14,0,16,0,18,0,20,0,22,0,24,0,26,0,28,0,30,0,32,0,34,0,36,0,38,0,40,0,42,0,44,0,46,0,48,0,50]';
    if($name === 'resposta7') return '[1,2,3,4,0,6,7,8,9,0,11,12,13,14,0,16,17,18,19,0,21,22,23,24,0,26,27,28,29,0,31,32,33,34,0,36,37,38,39,0,41,42,43,44,0,46,47,48,49]';
    if($name === 'resposta8') return '[1,2,3,4,6,7,8,9,11,12,13,14,16,17,18,19,21,22,23,24,26,27,28,29,31,32,33,34,36,37,38,39,41,42,43,44,46,47,48,49]';
    return '[]';
}
function session($label, $name){
    global $respostas;
    $x = json_encode($respostas[$name]);
    if($respostas[$name] === null){
        $x = "Variável \$$name não encontrada";
    }
    return "<section>
    <h2>\$$name</h2>
    <article class=\"".validateClass($name)."\">
        <label>
            $label
        </label>
        <div class=\"description\">
            Resposta esperada:
        </div>
        <b>".expect($name)."</b>
        <div class=\"description\">
            Resposta encontrada:
        </div>
        <b>".$x."</b>
    </article>
</section>";
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Resposta</title>
    <link rel="stylesheet" href="https://devsdenegocio.github.io/ensinando-loops/common/style.css"/>
    <style>
        article{
            width: calc(100% - 32px);
            overflow-x: scroll
        }
    </style>
</head>
<body>
<?=session('$resposta1 deve ser um array de 1 a 10', 'resposta1')?>
<?=session('$resposta2 deve ser um array de 1 a 10', 'resposta2')?>
<?=session('$resposta3 deve ser um array de 8 a 17', 'resposta3')?>
<?=session('$resposta4 deve ser um array de 50 a 41', 'resposta4')?>
<?=session('$resposta5 deve ser um array de 0 a -50', 'resposta5')?>
<?=session('$resposta6 deve ser um array de 0 a 100 com os ímprares = 0', 'resposta6')?>
<?=session('$resposta7 deve ser um array de 1 ao 49 mas com todos os multiplos de 5 = 0', 'resposta7')?>
<?=session('$resposta8 deve ser um array de 1 ao 49 mas SEM os múltiplos de 5 ', 'resposta8')?>
</body>
</html>
