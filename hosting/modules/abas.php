<?php
/**
 * Created by PhpStorm.
 * User: dodev
 * Date: 25/10/17
 * Time: 15:57
 */
?>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1"><img class="aba_icon" src="../Resources/img/alunos.png"> </a></li>
        <li><a href="#tabs-2"><img class="aba_icon" src="../Resources/img/professor.png"></a></li>
        <li><a href="#tabs-3"><img class="aba_icon" src="../Resources/img/secretaria.png"></a></li>
    </ul>

    <div id="tabs-1">
        Funcionalidades referentes ao Aluno
    </div>

    <div id="tabs-2">
        Funcionalidades referentes ao Professor.
    </div>

    <div id="tabs-3">
        <?php include "secretaria.php"?>
    </div>
</div>

