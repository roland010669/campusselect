<?php class Connexion extends PDO
  {
    public function __construct($configFile = __DIR__ . "/../config/db.ini")
    {

      $iniTab = parse_ini_file($configFile);
      if (!$iniTab) {
        $dsn = "mysql:host=localhost;dbname=select_campus";
        $user = "root";
        $password = "";
        $options = [];
      } else {
        $host = $iniTab["server"];
        $dbname = $iniTab["dbname"];
        $user = $iniTab["user"];
        $password = $iniTab["password"];
        $dsn = "mysql:host=$host;dbname=$dbname";
        $options = [];
      }
      parent::__construct($dsn, $user, $password, $options);
      parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
  }