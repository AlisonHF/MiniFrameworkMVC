<?php

    namespace MF\Model;

    use app\Connection;

    class Container {
        public static function getModel($model) 
        {
            $class = "\\app\\Model\\".ucfirst($model);

            $conn = Connection::getDb();

            return new $class($conn);
        }
    }

?>