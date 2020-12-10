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
    
    <script language="javascript" src="./../scripts/alterarSubmit.js"></script>
    <body>
        
        <?php include_once './components/menuBar.php' ?>

        <div class="conteudo">

            <h1>Alterar Pet</h1>
            <br>
            <form name="funcionario" method="POST" action="./alterar2.php">
                
                <fieldset class="busca">
                
                    <legend><h3>Insira o ID do Pet:</h3></legend>
                    <br>
                    <input type="text" name="txbBusca" size="60" min="1" placeholder="Insira apenas números">

                    <input type="hidden" name="doAction" value="false">

                </fieldset>

                <br>

                <fieldset name="opcoes">

                    <legend><h3>Opções</h3></legend>

                    <input type="button" name="btnBuscar" value="Alterar" onclick="isCampFilled(1);submitForm();">

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <input type="reset" name="btnLimpar" value="Limpar" onclick="document.funcionario.txbBusca.focus()">
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <a href="./menu.html"><input type="button" name="btnVoltar" value="Voltar"></a>
                
                </fieldset>

            </form>
        
        
        </div>

    </body>

</html>