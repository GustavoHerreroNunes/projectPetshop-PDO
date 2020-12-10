<?php
    class Connect extends PDO{
        private static $instance;
        private $query;
        private $host = "127.0.0.1";
        private $user = "root";
        private $pass = "";
        private $db = "db_petshop";

        public function __construct(){
            parent::__construct("mysql:host=$this->host; dbname=$this->db", "$this->user", "$this->pass");
        }

        public static function getInstance(){
            if(!isset(self::$instance)){
                try{
                    self::$instance = new Connect;
                    echo 'Conectado com sucesso!';
                }catch(Exception $error){
                    echo 'Erro ao conectar';
                    exit();
                }
            }
            return self::$instance;
        }

        public function sql($query){
            self::getInstance();
            $this->query = $query;
            $stmt = $pdo->prepare($this->query);
            $pdo = null;
        }
    }
?>