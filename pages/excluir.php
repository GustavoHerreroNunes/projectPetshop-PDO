<html>

    <head>
        <meta charset="UTF-8" />
        <title>Snoopy's Petshop - Excluir</title>
        <link rel="icon" href="./../assets/img/logo/logo-sem_fonte.png" />
        <link rel="stylesheet" type="text/css" href="./../styles/reset.css"/>
        <link rel="stylesheet" type="text/css" href="./../styles/pgDefault.css"/>
    </head>
    <script language="javascript">
        
        function confirmExclusion(){
            var resp = confirm("Deseja mesmo excluir este registro?\nEssa ação não pode ser desfeita.");

            if(resp){
                isCampFilled(1);
            }
        }

    </script>
    <script language="javascript" src="./../scripts/analyzeFields.js"></script>
    <body>
        
        <?php include_once './components/menuBar.php' ?>

        <div class="conteudo">

            <h1>Exclusão do registro de Pets</h1>    

            <br>
            <form name="funcionario" method="POST" action="">

                <fieldset>
                
                    <legend><h3>Insira o ID do Pet:<h3></legend>
                    <br>
                    <input type="text" name="txbBusca" size="60" maxlenght="4" placeholder="Insira apenas números" id="txbBusca">

                    <input type="hidden" name="doAction" value="false">
                
                </fieldset>
                
                <br>

                <fieldset class="opcoes">

                    <legend><h3>Opções</h3></legend>

                    <input type="submit" name="btnExcluir" value="Excluir" onclick="confirmExclusion();">
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <input type="reset" name="btnLimpar" value="Limpar" onClick="document.funcionario.txbBusca.focus()">

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <a href="./menu.html"><input type="button" name="btnVoltar" value="Voltar"></a>

                </fieldset>

            </form>

            <br>

            <?php
            
                extract($_POST, EXTR_OVERWRITE);
                
                if(isset($btnExcluir) && $doAction == "true"){

                    echo "<b>Resultados</b> <br><br>";
                    
                    include_once './../connectionDB/animais.php';

                    $anm = new Animais();
                    $anm->setId($txbBusca);

                    $confirm = $anm->confirmarExistencia();

                    switch($confirm){
                        case 0:
                            echo "Erro ao excluir: Registro não encontrado";
                            break;
                        case 1:
                            echo $anm->excluir();
                            break;
                        default:
                            echo $confirm;
                            break;
                    }
                                    
                }
            
            ?>


        </div>

    </body>

</html>