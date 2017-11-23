<?php
/**
 * Created by PhpStorm.
 * User: dodev
 * Date: 20/11/17
 * Time: 16:30
 */
$link = mysqli_connect('127.0.0.1', 'application', 'client777', 'sghe');
$query = "select * from aluno inner join login where login.login_id = aluno.login_id";
$result = $link->query($query)
?>

<form id="cadastro-form">
    <input type="text" name="nome" id="nome-onSec" autocomplete="off" placeholder="Nome">
    <input type="text" name="usuario" id="usuario-onSec" autocomplete="off" placeholder="Usuario">
    <input type="password" name="senha" id="senha-onSec" autocomplete="off" placeholder="Senha">
    <select name="tipo" id="tipo-onSec" size="0">
        <option value="Aluno" >Aluno</option>
        <option value="Professor" disabled>Professor</option>
        <option value="Secretaria" disabled>Secretaria</option>
    </select>
    <select name="status" id="status-onSec">
        <option value="Ativo">Ativo</option>
        <option value="Inativo">Inativo</option>
    </select>
    <input type="submit" id="cadastrar-onSec" value="Cadastrar">
</form>

<div class="professores">
    <table id="professores-table" class="scroll-table" border=1>
        <thead>
        <tr>
            <th>Nome</th>
            <th>Usuario</th>
            <th>Senha</th>
            <th>Tipo</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
            while($line = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td contenteditable='true'>".$line['aluno_name']."</td>";
                echo "<td>".$line['login_user']."</td>";
                //preg_replace("/[^0-9\s]/", "", $example4);
                echo "<td>**********</td>";
                echo "<td>".$line['login_type']."</td>";
                echo "<td>".$line['login_status']."</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</div>


