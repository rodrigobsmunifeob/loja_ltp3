<?php include("header.php"); ?>

<div class="container" style="margin-top: 30px;">

    <div class="row" style="clear:both">

        <?php include("menu_cliente.php"); ?>

        <div class="col-sm-12 col-md-10 img-rounded" style="min-height: 400px; background: #fff;">



            <form action="#" method="post" class="form-signup-login w3-card-4 w3-container" name="formlogin">


                <div class="form-group box-login">
                    <h4 style="text-align: center">Identificação do Usuario</h4>
                    <label for="txt_name">Nome</label>
                    <input style="width: 45% ;display: inline-block; margin-bottom: 15px;" type="text" class="form-control text-center" name="name_user" id="txt_name" value="<?php echo $_SESSION['nome']; ?>" required disabled>
                    <label for="txt_cpf">CPF</label>
                    <input style="width: 30%; display: inline-block;" type="text" class="form-control text-center" name="cpf_user" id="txt_cpf" value="<?php echo $_SESSION['cpf']; ?>" required disabled>
                    <label for="txt_datanasc">Logradouro</label>
                    <input style="width: 74% ;display: inline-block; margin-bottom: 15px;" type="text" class="form-control text-center" name="rua_user" id="txt_rua" value="<?php echo $_SESSION['end_rua']; ?>" required disabled>
                    <br><label for="txt_bairro">Bairro</label>
                    <input style="width: 30%; display: inline-block; margin-bottom: 15px;  " type="text" class="form-control text-center" name="bairro_user" id="txt_bairro" value="<?php echo $_SESSION['end_bairro']; ?>" required disabled>
                    <label for="txt_complemento">Complemento</label>
                    <input style="width: 25%; display: inline-block;" type="text" class="form-control text-center" name="complemento_user" id="txt_complemento" value="<?php echo $_SESSION['end_complemento']; ?>" required disabled>
                    <label for="txt_cidade">Cidade</label>
                    <input style="width: 50%; display: inline-block;" type="text" class="form-control text-center" name="cidade_user" id="txt_cidade" value="<?php echo $_SESSION['end_cidade']; ?>" required disabled>

                    <select name="estado_user" id="estado" style="height: 35px;border-radius: 6px ;width: 30%" disabled>
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
                    <input style="width: 50%; display: inline-block;" type="text" class="form-control text-center" name="email_user" id="txt_email" value="<?php echo $_SESSION['email']; ?>"required disabled>

                    <h4>Qual é sua dúvida ?</h4>
                    <textarea class="form-control" id="input_css" rows="3" placeholder="Digite sua mensagem..."></textarea>
                    <p class="text-center"><button type="submit" class="btn btn-success btn-lg" href="contact.php" role="button">Enviar</button>
                        <button type="reset" class="btn btn-danger btn-lg" href="contact.php" role="button">Cancelar</button></p>
                </div>

            </form>

            </div>

        </div>

        <?php include("footer.php"); ?>


