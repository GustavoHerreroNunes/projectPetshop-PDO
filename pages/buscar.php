<html>

    <head>
        <meta charset="UTF-8" />
        <title>Snoopy's Petshop - Buscar</title>
        <link rel="icon" href="./../assets/img/logo/logo-sem_fonte.png" />
        <link rel="stylesheet" type="text/css" href="./../styles/reset.css"/>
        <link rel="stylesheet" type="text/css" href="./../styles/pgDefault.css"/>
        <link rel="stylesheet" type="text/css" href="./../styles/tables.css"/>
    </head>
    <script language="javascript">

        check = false;
        rdSelect = 0;

        function selectRadio(radio){
            if(!check){
                check = true;
                document.funcionario.txbBusca.type = "text";
                document.funcionario.btnBuscar.type = "submit";
                document.funcionario.btnLimpar.type = "reset";
            }
            
            rdSelect = radio;
            hint = "";
            switch(rdSelect){
                case 1:
                    hint = "Digite o Nome do pet";
                    break;
                case 2:
                    hint = "Digite o Tipo do pet";
                    break;
                case 3:
                    hint = "Digite a Raça do pet";
                    break;
                case 4:
                    hint = "Digite a Cor Principal do pet";
                    break;
                case 5:
                    hint = "Digite o Sexo do pet";
                    break;
                default:
                    console.log("Erro: 'radio' enviado não exite.");
                    break;
            }
            document.funcionario.txbBusca.placeholder = hint;         
        }
    </script>
    <script language="javascript" src="./../scripts/analyzeFields.js"></script>
    <body>
        
        <?php include_once './components/menuBar.php' ?>

        <div class="conteudo">

            <h1>Pesquisa de Pets</h1>    

            <br>
            <form name="funcionario" method="POST" action="">


                <fieldset>
                    
                    <legend><h3>Selecione uma campo para busca:</h3></legend>
                    <br>
                    <input type="radio" name="btnrdOpCampos" value="1" id="Nome" onClick="selectRadio(1)">
                    <label for="Nome">Nome</label>
                    <br>
                    <input type="radio" name="btnrdOpCampos" value="2" id="Tipo" onClick="selectRadio(2)">
                    <label for="Tipo">Tipo</label>
                    <br>
                    <input type="radio" name="btnrdOpCampos" value="3" id="Raca" onClick="selectRadio(3)">
                    <label for="Raca">Raça</label>
                    <br>
                    <input type="radio" name="btnrdOpCampos" value="4" id="CorP" onClick="selectRadio(4)">
                    <label for="CorP">CorP</label>
                    <br>
                    <input type="radio" name="btnrdOpCampos" value="5" id="Sexo" onClick="selectRadio(5)">
                    <label for="Sexo">Sexo</label>
                    <br>
                
                </fieldset>
                <fieldset>
                
                    <input type="hidden" name="txbBusca" size="60" placeholder="">

                    <input type="hidden" name="doAction" value="false">
                
                </fieldset>
                
                <br>

                <fieldset class="opcoes">

                    <legend><h3>Opções</h3></legend>

                    <input type="hidden" name="btnBuscar" value="Buscar" onClick="isCampFilled(1);">
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <input type="hidden" name="btnLimpar" value="Limpar" onClick="document.funcionario.txbBusca.focus()">

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <a href="./menu.html"><input type="button" name="btnVoltar" value="Voltar"></a>

                </fieldset>

            </form>

            <br>

            <?php
            
            extract($_POST, EXTR_OVERWRITE);

            if(isset($btnBuscar) && $doAction == "true"){
                
                    include_once './../connectionDB/animais.php';

                    $anm = new Animais();

                    switch($btnrdOpCampos){
                        case 1:
                            $anm->setNome($txbBusca.'%');
                            break;
                        case 2:
                            $anm->setTipo($txbBusca.'%');
                            break;
                        case 3: 
                            $anm->setRaca($txbBusca.'%');
                            break;
                        case 4:
                            $anm->setCorP($txbBusca.'%');
                            break;
                        case 5:
                            $anm->setSexo($txbBusca.'%');
                            break;
                    }
                    $anm_db = $anm->buscar($btnrdOpCampos);

                    ?>
                    <table cellspacing=0>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Raça</th>
                            <th>Cor Principal</th>
                            <th>Nascimento</th>
                            <th>Sexo</th>
                        </tr>
                    <?php
                        $existe = false;
                        foreach($anm_db as $anm_mostrar){
                            $existe = true;
                            ?>
                            <tr>
                                <td><?php echo $anm_mostrar[0] ?></td>
                                <td><?php echo $anm_mostrar[1] ?></td>
                                <td><?php echo $anm_mostrar[2] ?></td>
                                <td><?php echo $anm_mostrar[3] ?></td>
                                <td><?php echo $anm_mostrar[4] ?></td>
                                <td><?php echo $anm_mostrar[5] ?></td>
                                <td><?php echo $anm_mostrar[6] ?></td>
                            </tr>
                            <?php
                        }

                        if(!$existe){
                            ?>

                            <td colspan=7><b>Registro(s) não encontrado(s)</b></td>
                            
                            <?php
                        } 
                        ?>

                        </table>

                        <?php
            }
            
            ?>


        </div>

    </body>

</html>