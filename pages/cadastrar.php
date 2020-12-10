<html>

    <head>
        <meta charset="UTF-8" />
        <title>Snoopy's Petshop - Cadastrar</title>
        <link rel="icon" href="./../assets/img/logo/logo-sem_fonte.png" />
        <link rel="stylesheet" type="text/css" href="./../styles/reset.css"/>
        <link rel="stylesheet" type="text/css" href="./../styles/pgDefault.css"/>
    </head>
    <script language="javascript" src="./../scripts/analyzeFields.js"></script>
    <body>
        
        <?php include_once './components/menuBar.php' ?>

        <div class="conteudo">

            <h1>Cadastro de Animais</h1>    

            <br>
            <form name="funcionario" method="POST" action="">

                <fieldset>
                
                    <legend><h3>Insira os dados do novo animal (Pet)</h3></legend>
                    
                    <table cellspacing=12 style="font-size:inherit">
                        <tr>
                            <td>
                                <label for="txbNome">Nome:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txbNome" size="35" maxlength="15" placeholder="Qual o nome do pet?" id="txbNome">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="txbTipo">Tipo:</label>
                            </td>
                            <td>
                                <label for="txbRaca">Raça:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txbTipo" size="25" maxlength="8" placeholder="Qual o tipo do pet?" id="txbTipo">
                            </td>
                            <td>
                                <input type="text" name="txbRaca" size="25" maxlength="25" placeholder="Qual a raça do pet?" id="txbRaca">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="txbCorP">Cor:</label>
                            </td>
                            <td>
                                <label for="txbNasc">Nascimento:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txbCorP" size="25" maxlength="10" placeholder="Qual a Cor Principal do pet?" id="txbCorP">
                            </td>
                            <td>
                                <input type="date" name="txbNasc" size="20" id="txbNasc">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="txbSexo">Sexo:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txbSexo" size="20" maxlength="5" placeholder="Qual o sexo do pet?" id="txbSexo">
                            </td>
                        </tr>                    
                    </table>

                    <input type="hidden" name="doAction" value="false">
                </fieldset>
                
                <br>

                <fieldset class="opcoes">

                    <legend><h3>Opções</h3></legend>

                    <input type="submit" name="btnCadas" value="Cadastrar" onclick="isCampFilled(2)" class="botoes">
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <input type="reset" name="btnLimpar" value="Limpar" onClick="document.funcionario.txbNome.focus()" class="botoes">

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <a href="./menu.html"><input type="button" name="btnVoltar" value="Voltar" class="botoes"></a>

                </fieldset>

            </form>

            <?php

                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnCadas) && $doAction == "true"){

                    echo "<b>Resultados</b> <br><br>";

                    include_once './../connectionDB/animais.php';
                    $anm = new Animais();
                    $anm->setNome($txbNome);
                    $anm->setTipo($txbTipo);
                    $anm->setRaca($txbRaca);
                    $anm->setCorP($txbCorP);
                    $anm->setNasc($txbNasc);
                    $anm->setSexo($txbSexo);

                    echo $anm->cadastrar();

                }

            ?>

        </div>

    </body>

</html>