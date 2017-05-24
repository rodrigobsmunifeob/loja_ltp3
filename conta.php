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
                        <option <?php if ($user['end_estado'] == "AC") echo 'selected="selected"'; ?> value="Acre">AC</option>
                        <option <?php if ($user['end_estado'] == "AL") echo 'selected="selected"'; ?> value="Alagoas" >AL</option>
                        <option <?php if ($user['end_estado'] == "AP") echo 'selected="selected"'; ?> value="Amapá" >AP</option>
                        <option <?php if ($user['end_estado'] == "AM") echo 'selected="selected"'; ?> value="Amazonas" >AM</option>
                        <option <?php if ($user['end_estado'] == "BA") echo 'selected="selected"'; ?> value="Bahia" >BA</option>
                        <option <?php if ($user['end_estado'] == "CE") echo 'selected="selected"'; ?> value="Ceará" >CE</option>
                        <option <?php if ($user['end_estado'] == "DF") echo 'selected="selected"'; ?> value="Distrito Federal" >DF</option>
                        <option <?php if ($user['end_estado'] == "ES") echo 'selected="selected"'; ?> value="Espírito Santo" >ES</option>
                        <option <?php if ($user['end_estado'] == "GO") echo 'selected="selected"'; ?> value="Goiás" >GO</option>
                        <option <?php if ($user['end_estado'] == "MA") echo 'selected="selected"'; ?> value="Maranhão" >MA</option>
                        <option <?php if ($user['end_estado'] == "MT") echo 'selected="selected"'; ?> value="Mato Grosso" >MT</option>
                        <option <?php if ($user['end_estado'] == "MS") echo 'selected="selected"'; ?> value="Mato Grosso do Sul" >MS</option>
                        <option <?php if ($user['end_estado'] == "MG") echo 'selected="selected"'; ?> value="Minas Gerais" >MG</option>
                        <option <?php if ($user['end_estado'] == "PA") echo 'selected="selected"'; ?> value="Pará" >PA</option>
                        <option <?php if ($user['end_estado'] == "PB") echo 'selected="selected"'; ?> value="Paraíba" >PB</option>
                        <option <?php if ($user['end_estado'] == "PR") echo 'selected="selected"'; ?> value="Paraná" >PR</option>
                        <option <?php if ($user['end_estado'] == "PE") echo 'selected="selected"'; ?> value="Pernambuco" >PE</option>
                        <option <?php if ($user['end_estado'] == "PI") echo 'selected="selected"'; ?> value="Piauí" >PI</option>
                        <option <?php if ($user['end_estado'] == "RJ") echo 'selected="selected"'; ?> value="Rio de Janeiro" >RJ</option>
                        <option <?php if ($user['end_estado'] == "RN") echo 'selected="selected"'; ?> value="Rio Grande do Norte" >RN</option>
                        <option <?php if ($user['end_estado'] == "RS") echo 'selected="selected"'; ?> value="Rio Grande do Sul" >RS</option>
                        <option <?php if ($user['end_estado'] == "RO") echo 'selected="selected"'; ?> value="Rondônia" >RO</option>
                        <option <?php if ($user['end_estado'] == "RR") echo 'selected="selected"'; ?> value="Roraima" >RR</option>
                        <option <?php if ($user['end_estado'] == "SC") echo 'selected="selected"'; ?> value="Santa Catarina" >SC</option>
                        <option <?php if ($user['end_estado'] == "SP") echo 'selected="selected"'; ?> value="São Paulo" >SP</option>
                        <option <?php if ($user['end_estado'] == "SE") echo 'selected="selected"'; ?> value="Sergipe" >SE</option>
                        <option <?php if ($user['end_estado'] == "TO") echo 'selected="selected"'; ?> value="Tocantins" >TO</option>
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