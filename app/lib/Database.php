<?php

    // Esta clase la van a usar los models!

    class Database {

        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        
        private $sbh;
        private $stmt;
        private $error;

        /**
         * Creamos la conexion
         * http://php.net/manual/en/pdo.connections.php
         */
        public function __construct($dbname)
        {
            $dsn = 'mysql:host=' .  $this->host . ';dbname=' . $dbname; 

            // Optimizamos haciendo la conexion persistente?
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            // Creamos una instancia de PDO
            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);

                // Caracteres especiales
                $this->dbh->exec('set names utf8');

            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo($this->error);
            }
        }

        /**
         * '
         * Preparamos la consulta
         */
        public function query($sql)
        {
            $this->stmt = $this->dbh->prepare($sql);
        }

        /**
         * Vinculamos la consulta
         * http://php.net/manual/en/pdostatement.bindparam.php
         * 
         */
        public function bind($param, $value, $type = null)
        {

            //
            // Seteamos el tipo de dato 'PDO::PARAM'
            // http://php.net/manual/en/pdo.constants.php
            //
            if(is_null($type))
            {
                switch(true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;

                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;

                    default:
                        $type = PDO::PARAM_NULL;
                        break;
                }
            }

            $this->stmt->bindValue($param, $value, $type);
        }

        /**
         * '
         * Metodo que nos va a permitir ejecutar la consulta
         */
        public function execute()
        {
            return $this->stmt->execute();
        }

        /**
         * '
         * Obtenemos los registros de la consulta
         */
         public function obtain()
         {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
         }

         /**
         * '
         * Obtenemos un unico registro
         */
        public function obtain_once()
        {
           $this->execute();
           return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        /**
         * '
         * Obtener la cantidad de filas (num_rows)
         */
        public function rows()
        {
            return $this->stmt->rowCount();
        }

    }