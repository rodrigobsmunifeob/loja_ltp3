<?php
/**
 * Created by PhpStorm.
 * User: wendr
 * Date: 18/04/17
 * Time: 22:31
 */
include("header.php");
session_start()
?>



<h1 class="text-center text-primary">Formulario de Cadastro</h1>


<fieldset><legend></legend>


    <form action="../Controller/Register.php" method="post" class="form-signup-login w3-card-4 w3-container" name="formlogin">


        <div class="form-group box-login">
            <h4 style="text-align: center">Insira seus dados</h4>
            <input type="text" id="input_css" name="name_user" id="txt_name" maxlength="15"  required placeholder="Nome* ">
            <input type="text" id="input_css" name="cpf_user" id="sobrenome" maxlength="15"  required placeholder="CPF*"
            >

            <input type="date" id="input_css" name="rua_user" id="txt_datanasc" maxlength="8"  placeholder="Rua*" required>


            <input type="text" id="input_css" name="bairro_user" id="txt_name" maxlength="255"  required placeholder="Bairro*">

            <input type="text" id="input_css" name="complemento_user" id="txt_cidade" required  placeholder="Complemento*">
            <input type="text" id="input_css" name="cidade_user" id="txt_cidade" required  placeholder="Cidade*">

            <select name="estado_user" id="estado" style="min-width: 400px" >
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
            <input type="text" id="input_css" name="email_user" id="txt_name"   placeholder="Email*">
            <input type="text" id="input_css" name="senha_user" id="txt_name"   placeholder="Senha*">
            <p>* Campos obrigatórios</p>
            <p class="text-center"><button type="submit" class="btn btn-success btn-lg" href="contact.php" role="button">Enviar</button>
                <button type="reset" class="btn btn-danger btn-lg" href="contact.php" role="button">Cancelar</button></p>

        </div>


    </form>



    </form>
    </div>
    </div>






</fieldset>
<?php include("footer.php"); ?>

</body>
</html>




