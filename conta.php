<?php include("header.php"); 

$user = mysqli_fetch_array(mysqli_query($conexao,
		"SELECT * FROM cliente WHERE id_cliente = ".$_SESSION['id_cliente'].";"));
?>

<div class="container">
	<h2>Conta</h2>
	<hr>

	<form action="sign_up.php" method="post" class="form-signup-login w3-card-4 w3-container" name="formlogin">
            <div class="form-group box-login">
                <p></p>
                <div class="form-group ">

                    <label for="txt_name">Nome</label>
                    <input disabled value="<?=$user['nome']?>" style="width: 45% ;display: inline-block; margin-bottom: 15px;" type="text" class="form-control text-center" name="name_user" id="txt_name" required>
                    <label for="txt_cpf">CPF</label>
                    <input disabled value="<?=$user['cpf']?>" style="width: 30%; display: inline-block;" type="text" class="form-control text-center" name="cpf_user" id="txt_cpf" required>
                    <label for="txt_datanasc">Logradouro</label>
                    <input value="<?=$user['end_rua']?>" style="width: 74% ;display: inline-block; margin-bottom: 15px;" type="text" class="form-control text-center" name="rua_user" id="txt_datanasc" required>
                    <br><label for="txt_bairro">Bairro</label>
                    <input value="<?=$user['end_bairro']?>" style="width: 30%; display: inline-block; margin-bottom: 15px;  " type="text" class="form-control text-center" name="bairro_user" id="txt_bairro" required>
                    <label for="txt_complemento">Complemento</label>
                    <input value="<?=$user['end_complemento']?>" style="width: 25%; display: inline-block;" type="text" class="form-control text-center" name="complemento_user" id="txt_complemento" required>
                    <label for="txt_cidade">Cidade</label>
                    <input value="<?=$user['end_cidade']?>" style="width: 50%; display: inline-block;" type="text" class="form-control text-center" name="cidade_user" id="txt_cidade" required>
                    <select name="estado_user" id="estado" style="height: 35px;border-radius: 6px ;width: 30%" >
                        <option <?php if ($user['end_estado'] == "Acre") echo 'selected="selected"'; ?> value="Acre">AC</option>
                        <option <?php if ($user['end_estado'] == "Alagoas") echo 'selected="selected"'; ?> value="Alagoas" >AL</option>
                        <option <?php if ($user['end_estado'] == "Amapá") echo 'selected="selected"'; ?> value="Amapá" >AP</option>
                        <option <?php if ($user['end_estado'] == "Amazonas") echo 'selected="selected"'; ?> value="Amazonas" >AM</option>
                        <option <?php if ($user['end_estado'] == "Bahia") echo 'selected="selected"'; ?> value="Bahia" >BA</option>
                        <option <?php if ($user['end_estado'] == "Ceará") echo 'selected="selected"'; ?> value="Ceará" >CE</option>
                        <option <?php if ($user['end_estado'] == "Distrito Federal") echo 'selected="selected"'; ?> value="Distrito Federal" >DF</option>
                        <option <?php if ($user['end_estado'] == "Espírito Santo") echo 'selected="selected"'; ?> value="Espírito Santo" >ES</option>
                        <option <?php if ($user['end_estado'] == "Goiás") echo 'selected="selected"'; ?> value="Goiás" >GO</option>
                        <option <?php if ($user['end_estado'] == "Maranhão") echo 'selected="selected"'; ?> value="Maranhão" >MA</option>
                        <option <?php if ($user['end_estado'] == "Mato Grosso") echo 'selected="selected"'; ?> value="Mato Grosso" >MT</option>
                        <option <?php if ($user['end_estado'] == "Mato Grosso do Sul") echo 'selected="selected"'; ?> value="Mato Grosso do Sul" >MS</option>
                        <option <?php if ($user['end_estado'] == "Minas Gerais") echo 'selected="selected"'; ?> value="Minas Gerais" >MG</option>
                        <option <?php if ($user['end_estado'] == "Pará") echo 'selected="selected"'; ?> value="Pará" >PA</option>
                        <option <?php if ($user['end_estado'] == "Paraíba") echo 'selected="selected"'; ?> value="Paraíba" >PB</option>
                        <option <?php if ($user['end_estado'] == "Paraná") echo 'selected="selected"'; ?> value="Paraná" >PR</option>
                        <option <?php if ($user['end_estado'] == "Pernambuco") echo 'selected="selected"'; ?> value="Pernambuco" >PE</option>
                        <option <?php if ($user['end_estado'] == "Piauí") echo 'selected="selected"'; ?> value="Piauí" >PI</option>
                        <option <?php if ($user['end_estado'] == "Rio de Janeiro") echo 'selected="selected"'; ?> value="Rio de Janeiro" >RJ</option>
                        <option <?php if ($user['end_estado'] == "Rio Grande do Norte") echo 'selected="selected"'; ?> value="Rio Grande do Norte" >RN</option>
                        <option <?php if ($user['end_estado'] == "Rio Grande do Sul") echo 'selected="selected"'; ?> value="Rio Grande do Sul" >  RS   </option>
                        <option <?php if ($user['end_estado'] == "Rondônia") echo 'selected="selected"'; ?> value="Rondônia" >RO</option>
                        <option <?php if ($user['end_estado'] == "Roraima") echo 'selected="selected"'; ?> value="Roraima" >RR</option>
                        <option <?php if ($user['end_estado'] == "Santa Catarina") echo 'selected="selected"'; ?> value="Santa Catarina" >SC</option>
                        <option <?php if ($user['end_estado'] == "São Paulo") echo 'selected="selected"'; ?> value="São Paulo" >SP</option>
                        <option <?php if ($user['end_estado'] == "Sergipe") echo 'selected="selected"'; ?> value="Sergipe" >SE</option>
                        <option <?php if ($user['end_estado'] == "Tocantins") echo 'selected="selected"'; ?> value="Tocantins" >TO</option>
                    </select>
                    <label for="txt_email">Email</label>
                    <input value="<?=$user['email']?>" style="width: 50%; display: inline-block;" type="text" class="form-control text-center" name="email_user" id="txt_email" required>
                    <label for="txt_senha">Senha</label>
                    <input style="width: 20%; display: inline-block;"type="password" class="form-control text-center" name="senha_user" id="txt_senha" required>

                </div>
                <p class="text-center"><button type="submit" class="btn btn-success btn-lg" role="button">Atualizar</button></p>

            </div>
        </form>
	
</div>

<?php include("footer.php"); ?>