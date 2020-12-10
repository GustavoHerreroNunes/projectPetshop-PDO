<?php
    include_once 'connect.php';

    class Animais{

        /*Atributos*/
    
        private $conn;
    
        private $id;
        private $nome;
        private $tipo;
        private $raca;
        private $corP;
        private $nasc;
        private $sexo;
    
        /*Getters e Setters*/
    
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
    
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
    
        public function getTipo(){
            return $this->tipo;
        }
        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
    
        public function getRaca(){
            return $this->raca;
        }
        public function setRaca($raca){
            $this->raca = $raca;
        }
    
        public function getCorP(){
            return $this->corP;
        }
        public function setCorP($corP){
            $this->corP = $corP;
        }
    
        public function getNasc(){
            return $this->nasc;
        }
        public function setNasc($nasc){
            $this->nasc = $nasc;
        }
    
        public function getSexo(){
            return $this->sexo;
        }
        public function setSexo($sexo){
            $this->sexo = $sexo;
        }
    
        /*Funções para realizar as operações de CRUD na tabela "animais"*/
    
        /*Função para cadastrar novo registro*/
        function cadastrar(){
            try{
    
                $this->conn = new Connect();
                $sql = $this->conn->prepare("insert into animais values (null,?,?,?,?,?,?)");
                @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
                @$sql->bindParam(2, $this->getTipo(), PDO::PARAM_STR);
                @$sql->bindParam(3, $this->getRaca(), PDO::PARAM_STR);
                @$sql->bindParam(4, $this->getCorP(), PDO::PARAM_STR);
                @$sql->bindParam(5, $this->getNasc(), PDO::PARAM_STR);
                @$sql->bindParam(6, $this->getSexo(), PDO::PARAM_STR);

                if($sql->execute() == 1){
                    return "Registro cadastrado com sucesso!!";
                }
    
                $this->conn = null;
    
            }catch(PDOException $exc){
    
                return "Erro ao cadastrar registro: ".$exc->getMessage();
    
            }
        }
    
        /*Funções para alterar registro:*/
        /*1º Função para pesquisar um registro pelo seu 'idCarro' e retornar seus dados*/
        function alterar1(){
            try{

                $this->conn = new Connect();
                $sql = $this->conn->prepare("select * from animais where Id = ?");
                @$sql->bindParam(1, $this->getId(), PDO::PARAM_STR);
                $sql->execute();
                return $sql->fetchAll();
                $this->conn = null;

            }catch(PDOException $exc){

                echo "Erro ao buscar por registro: ".$exc.getMessage();
            }
        }

        /*2º Função para salvar alterações feitas nas text boxes*/
        function alterar2(){
            try{

                $this->conn = new Connect();
                $sql = $this->conn->prepare("update animais set Nome = ?, Tipo = ?, Raca = ?, CorP = ?, Nasc = ?, Sexo = ? where Id = ?");
                @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
                @$sql->bindParam(2, $this->getTipo(), PDO::PARAM_STR);
                @$sql->bindParam(3, $this->getRaca(), PDO::PARAM_STR);
                @$sql->bindParam(4, $this->getCorP(), PDO::PARAM_STR);
                @$sql->bindParam(5, $this->getNasc(), PDO::PARAM_STR);
                @$sql->bindParam(6, $this->getSexo(), PDO::PARAM_STR);
                @$sql->bindParam(7, $this->getId(), PDO::PARAM_STR);

                if($sql->execute() == 1){

                    return "Registro alterado com sucesso!";
                }

            }catch(PDOException $exc){

                return "Erro ao alterar: ".$exc->getMessage();

            }
        }
        /*Fim das fuções para alterar*/

        /*Função para buscar um registro*/
        function buscar($campo){
            $parametro = "";
            $comando = "select * from animais where ";

            /*Qual o campo de busca?*/
            switch($campo){

                /*Nome*/
                case 1:
                    $parametro = $this->getNome();
                    $comando .= "Nome like ?";
                    break;

                /*Tipo*/
                case 2:
                    $parametro = $this->getTipo();
                    $comando .= "Tipo like ?";
                    break;

                /*Raça*/
                case 3:
                    $parametro = $this->getRaca();
                    $comando .= "Raca like ?";
                    break;
                
                /*Cor Principal*/
                case 4:
                    $parametro = $this->getCorP();
                    $comando .= "CorP like ?";
                    break;

                /*Sexo*/
                case 5:
                    $parametro = $this->getSexo();
                    $comando .= "Sexo like ?";
                    break;
            }

            try{

                $this->conn = new Connect();
                $sql = $this->conn->prepare($comando);
                @$sql->bindParam(1, $parametro, PDO::PARAM_STR);
                $sql->execute();
                return $sql->fetchAll();
                $this->conn = null;

            }catch(PDOException $exc){

                return "Erro ao buscar: ".$exc->getMessage();

            }
        }

        /*Funções para excluir um registro:*/
        /*1º Função para confirmar que o registro a ser excluído existe*/
        function confirmarExistencia(){
            try{

                $this->conn = new Connect();
                $sql = $this->conn->prepare("select * from animais where Id = ?");
                @$sql->bindParam(1, $this->getId(), PDO::PARAM_STR);
                $sql->execute();
                $regist = $sql->fetchAll();

                if(count($regist) != 0)
                    return 1;
                else
                    return 0;

                $this->conn = null;

            }catch(PDOException $exc){

                return "Erro ao buscar por registro: ".$exc;

            }
        }

        /*2º Função para excluir o registro escolhido*/
        function excluir(){
            try{

                $this->conn = new Connect();
                $sql = $this->conn->prepare("delete from animais where Id = ?");
                @$sql->bindParam(1, $this->getId(), PDO::PARAM_STR);
                
                if($sql->execute() == 1){
                    
                    return "Registro excluído com sucesso!!";
                    
                }else{
                    
                    return "Erro ao excluir: Erro desconhecido";

                }

                $this->conn = null;

            }catch(PDOException $exc){

                return "Erro ao excluir: ".$exc->getMessage();

            }
        }
        /*Fim das funções para excluir*/

        /*Função para listar todos os registros*/
        function listar(){

            try{

                $this->conn = new Connect();
                $sql = $this->conn->prepare("select * from animais order by Id");
                $sql->execute();
                return $sql->fetchAll();
                $this->conn = null;

            }catch(PDOException $exc){

                return "Erro ao listar: ".$exc->getMessage();

            }
        }
    }

?>