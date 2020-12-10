<html>

    <head>
        <meta charset="UTF-8" />
        <title>Snoopy's Petshop - Listar</title>
        <link rel="icon" href="./../assets/img/logo/logo-sem_fonte.png" />
        <link rel="stylesheet" type="text/css" href="./../styles/reset.css"/>
        <link rel="stylesheet" type="text/css" href="./../styles/pgDefault.css"/>
        <link rel="stylesheet" type="text/css" href="./../styles/tables.css"/>
    </head>
    <body>
        
        <?php include_once './components/menuBar.php' ?>

        <div class="conteudo">

            <h1>Registros de Pets</h1>

            <br>

            <?php 
            
            include_once './../connectionDB/animais.php';

            $anm = new Animais();
            $anmBD = $anm->listar();

            ?>

            <table cellspacing=0>

                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Raça</th>
                    <th>Cor Principal</th>
                    <th>Nascimento</th>
                    <th>Sexo</th>
                </tr>

                <?php foreach($anmBD as $anmMostrar){ ?>
                    <tr>
                        <td><?php echo $anmMostrar[0] ?></td>
                        <td><?php echo $anmMostrar[1] ?></td>
                        <td><?php echo $anmMostrar[2] ?></td>
                        <td><?php echo $anmMostrar[3] ?></td>
                        <td><?php echo $anmMostrar[4] ?></td>
                        <td><?php echo $anmMostrar[5] ?></td>
                        <td><?php echo $anmMostrar[6] ?></td>
                    </tr>
                <?php } ?>
            
            </table>
            
            <br>
            
            <div class="opcoes">
                <h3>Opções</h3>
                <br>
                <a href="./menu.html"><button>Voltar</button></a>
            </div>

        </div>

    </body>

</html>