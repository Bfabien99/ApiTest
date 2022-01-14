<?php
    
    class Connect extends PDO
    {
        public function __construct()
        {
            parent::__construct("mysql:host=localhost;dbname=apitest", 'root', '',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
    }
    

    class apiModel{
        function Select(){
            $db = new Connect;
            $users = array();
            $data = $db->prepare('SELECT * FROM users ORDER BY id');
            $data->execute();
            while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
                $users[$OutputData['id']] = array(
                    'id' => $OutputData['id'],
                    'name' => $OutputData['name'],
                    'pseudo' => $OutputData['pseudo'],
                    'age' => $OutputData['age'],
                );
            }
            return json_encode($users);
        }
    }