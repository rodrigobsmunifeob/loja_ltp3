<?php
/**
 * Created by PhpStorm.
 * User: wendr
 * Date: 18/04/17
 * Time: 22:31
 */

require_once 'header.php';

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['name_user'])) {
            $sql = "INSERT INTO cliente(nome, cpf, end_rua, end_bairro, end_complemento, end_cidade, end_estado, email, senha)
                VALUES
                  (  '" . mysqli_real_escape_string($conexao, $_POST['name_user']) . "', 
                     '" . mysqli_real_escape_string($conexao, $_POST['cpf_user']) . "', 
                     '" . mysqli_real_escape_string($conexao, $_POST['rua_user']) . "', 
                     '" . mysqli_real_escape_string($conexao, $_POST['bairro_user']) . "',
                     '" . mysqli_real_escape_string($conexao, $_POST['complemento_user']) . "',
                     '" . mysqli_real_escape_string($conexao, $_POST['cidade_user']) . "',
                     '" . mysqli_real_escape_string($conexao, $_POST['estado_user']) . "',
                     '" . mysqli_real_escape_string($conexao, $_POST['email_user']) . "',
                     '" . mysqli_real_escape_string($conexao, $_POST['senha_user']) . "'
                  );";

            mysqli_query($conexao, $sql); mysqli_error($conexao);

            $_SESSION['Registered'] = "true";
            $msg = true;

        } else { ?>
            <div style="margin:0;" class="alert alert-danger text-center" role="alert"><b>Ops! Algum dado está errado ou
                    já existe, verifique os campos.</b></div>
            <?php
        }
 }

 if (isset($msg)) { ?>
        <div style="margin:0;" class="alert alert-success text-center" role="alert"><b>Parabéns! Cadastro realizado com sucesso!</b></div>
                    <?php } ?>
    <?php if (!isset($_SESSION['Registered'])) {?>
    <h1 class="text-center text-primary">Formulario de Cadastro</h1>


    <fieldset><legend></legend>

        <form action="sign_up.php" method="post" class="form-signup-login w3-card-4 w3-container" name="formlogin">
            <div class="form-group box-login">
                <h4 style="text-align: center">Insira seus dados</h4>
                <div class="form-group ">

                    <label for="txt_name">Nome</label>
                    <input style="width: 45% ;display: inline-block; margin-bottom: 15px;" type="text" class="form-control text-center" name="name_user" id="txt_name" required>
                    <label for="txt_cpf">CPF</label>
                    <input style="width: 30%; display: inline-block;" type="text" class="form-control text-center" name="cpf_user" id="txt_cpf" required>
                    <label for="txt_datanasc">Logradouro</label>
                    <input style="width: 74% ;display: inline-block; margin-bottom: 15px;" type="text" class="form-control text-center" name="rua_user" id="txt_datanasc" required>
                    <br><label for="txt_bairro">Bairro</label>
                    <input style="width: 30%; display: inline-block; margin-bottom: 15px;  " type="text" class="form-control text-center" name="bairro_user" id="txt_bairro" required>
                    <label for="txt_complemento">Complemento</label>
                    <input style="width: 25%; display: inline-block;" type="text" class="form-control text-center" name="complemento_user" id="txt_complemento" required>
                    <label for="txt_cidade">Cidade</label>
                    <input style="width: 50%; display: inline-block;" type="text" class="form-control text-center" name="cidade_user" id="txt_cidade" required>
                    <select name="estado_user" id="estado" style="height: 35px;border-radius: 6px ;width: 30%" >
                        <option value="Acre">AC</option>
                        <option value="Alagoas" >AL</option>
                        <option value="Amapá" >AP</option>
                        <option value="Amazonas" >AM</option>
                        <option value="Bahia" >BA</option>
                        <option value="Ceará" >CE</option>
                        <option value="Distrito Federal" >DF</option>
                        <option value="Espírito Santo" >ES</option>
                        <option value="Goiás" >GO</option>
                        <option value="Maranhão" >MA</option>
                        <option value="Mato Grosso" >MT</option>
                        <option value="Mato Grosso do Sul" >MS</option>
                        <option value="Minas Gerais" >MG</option>
                        <option value="Pará" >PA</option>
                        <option value="Paraíba" >PB</option>
                        <option value="Paraná" >PR</option>
                        <option value="Pernambuco" >PE</option>
                        <option value="Piauí" >PI</option>
                        <option value="Rio de Janeiro" >RJ</option>
                        <option value="Rio Grande do Norte" >RN</option>
                        <option value="Rio Grande do Sul" >  RS   </option>
                        <option value="Rondônia" >RO</option>
                        <option value="Roraima" >RR</option>
                        <option value="Santa Catarina" >SC</option>
                        <option value="São Paulo" >SP</option>
                        <option value="Sergipe" >SE</option>
                        <option value="Tocantins" >TO</option>
                        </optgroup>

                    </select>
                    <label for="txt_email">Email</label>
                    <input style="width: 50%; display: inline-block;" type="text" class="form-control text-center" name="email_user" id="txt_email" required>
                    <label for="txt_senha">Senha</label>
                    <input style="width: 20%; display: inline-block;"type="password" class="form-control text-center" name="senha_user" id="txt_senha" required>

                </div>
                <p>* Campos obrigatórios</p>
                <p class="text-center"><button type="submit" class="btn btn-success btn-lg" href="contact.php" role="button">Enviar</button>
                    <button type="reset" class="btn btn-danger btn-lg" href="contact.php" role="button">Cancelar</button></p>

            </div>
        </form>
        <?php
 }  else{
        ?><h1 class="text-center text-primary"><a href="index.php"><input type="button" class="btn btn-link"  value="Ir a Home"/></a></h1><?php

        unset($_SESSION['Registered']);
    }
         ?>
    </div> </div>

</fieldset>
<?php include("footer.php"); ?>





