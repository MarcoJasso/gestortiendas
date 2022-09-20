<?php
namespace corestore\serv {
    use Exception;
    use PDO;
    class ConnSQLP
    {

        public function __construct()
        {
        }

        protected function connection(): ?PDO
        {
            try {
                return new PDO("pgsql:host=localhost;port=5432;dbname=BDAlmacen", "postgres", "admin");
            } catch (exception $e) {
                return null;
            }
        }
    }
}