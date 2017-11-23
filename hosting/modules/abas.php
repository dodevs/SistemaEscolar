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
        
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="javascript:void(0)" onclick="showOrHidden('subtab-professor')">Professores</a>
            <a href="javascript:void(0)" onclick="showOrHidden('subtab-aluno')">Alunos</a>
            <a href="#">Disciplinas</a>
        </div>
        <span style="font-size: 30px; cursor: pointer" onclick="openNav()">&#9776; Opções</span>

        <div id="subtab-professor">
            <?php require "professor.php" ?>
        </div>

        <div id="subtab-aluno" style="display: none">
            <?php require "aluno.php" ?>
        </div>
    </div>
</div>

