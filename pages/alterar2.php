<html>

    <head>
        <meta charset="UTF-8" />
        <title>Snoopy's Petshop - Alterar</title>
        <link rel="icon" href="./../assets/img/logo/logo-sem_fonte.png" />
        <link rel="stylesheet" type="text/css" href="./../styles/reset.css"/>
        <link rel="stylesheet" type="text/css" href="./../styles/pgDefault.css"/>
        <link rel="stylesheet" type="text/css" href="./../styles/tables.css"/>
    </head>
    <script language="javascript" src="./../scripts/analyzeFields.js"></script>
    <body>
        
        <?php include_once './components/menuBar.php' ?>

        <div class="conteudo">

            <h1>Alterar Pet</h1>
            <br>
            <?php
                $id = $_POST["txbBusca"];

                include_once './../connectionDB/animais.php';
                $anm1 = new Animais();
                $anm1->setId($id);
                $anmDB = $anm1->alterar1();
            
            ?>

            <script language="javascript">
                    valTxbBusca = <?php echo $id?>;
            </script>

            <form name="funcionario" method="POST">

                <?php
                $existe = false;
                foreach($anmDB as $anmMostrar){
                    $existe = true;
                
                ?>

                    <fieldset>

                        <legend><h3>Dados do Pet</h3></legend>

                        <b>ID: </b><?php echo $anmMostrar[0] ?>
                        <input type="hidden" name="txbId" value='<?php echo $anmMostrar[0] ?>'>
                        <br>
                        <br>
                        <label for="txbNome">Nome:</label>
                        <input type="text" name="txbNome" size="35" maxlength="60" value='<?php echo $anmMostrar[1] ?>' id="txbNome">
                        <br>
                        <br>
                        <label for="txbTipo">Tipo:</label>
                        <input type="text" name="txbTipo" size="20" maxlength="10" value='<?php echo $anmMostrar[2] ?>' id="txbTipo">
                    
                        <label for="txbRaca">Raça:</label>
                        <input type="text" name="txbRaca" min="1960" max="3000" value='<?php echo $anmMostrar[3] ?>' id="txbRaca">
                        <br>
                        <br>
                        <label for="txbCorP">Cor Principal:</label>
                        <input type="text" name="txbCorP" size="20" maxlength="8" value='<?php echo $anmMostrar[4] ?>' id="txbCorP">
                        
                        <label for="txbNasc">Nascimento:</label>
                        <input type="date" name="txbNasc" size="20" maxlength="20" value='<?php echo $anmMostrar[5] ?>' id="txbNasc">
                        <br>
                        <br>
                        <laber for="txbSexo">Sexo:</label>
                        <input type="text" name="txbSexo" size="50" value='<?php echo $anmMostrar[6] ?>' id="txbSexo">

                        <input type="hidden" name="doAction" value="false">

                
                    </fieldset>
                <?php
                }
                if($existe){
                    ?>
                    <fieldset class="opcoes">

                    <legend><h3>Opções</h3></legend>

                    <input type="submit" name="btnAlterar" value="Alterar">

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <a href="./menu.html"><input type="button" name="btnVoltar" value="Voltar"></a>

                    </fieldset>

                <?php
                }else{
                    ?>

                    <h3 style="font-weight: normal">Registro não encontrado</h3>

                    <br>

                    <fieldset class="opcoes">

                    <legend><h3>Opções</h3></legend>

                    <a href="./menu.html"><input type="button" name="btnVoltar" value="Voltar"></a>

                </fieldset>

                    
                <?php
                }
                ?>
                
            </form>

            <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnAlterar)){

                    include_once './../connectionDB/animais.php';
                    $anm2 = new Animais();
                    $anm2->setId($txbId);
                    $anm2->setNome($txbNome);
                    $anm2->setTipo($txbTipo);
                    $anm2->setRaca($txbRaca);
                    $anm2->setCorP($txbCorP);
                    $anm2->setNasc($txbNasc);
                    $anm2->setSexo($txbSexo);

                    echo "<b>Resultados</b> <br><br>";
                    echo $anm2->alterar2();

                    header("location:./alterar.php");
                }

            ?>
        
        
        </div>

    </body>

</html>