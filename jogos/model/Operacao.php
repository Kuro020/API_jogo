<?php
class Operacao{

    private $con;

    function __construct()
        {
            require_once dirname(__FILE__).'./Conexao.php';
            
            $bd = new Conexao();

            $this->con = $bd->connect();
        }

        function createjogo($campo_2,$campo_3){
            $stmt = $this->con->prepare("INSERT INTO jogo]_tb (nomejogo,imgjogo)VALUES (?,?,)");
            $stmt->bind_param("sss",$campo_2,$campo_3);
            if($stmt->execute())
            return true;
            return var_dump($stmt);
        }


        function getjogo(){
            $stmt = $this->con->prepare("Select * from jogo_tb");
        $stmt->execute();
    $stmt->bind_result($uid,$nomejogo,$imgjogo);

$dicas = array();

while($stmt->fetch()){
    $dica = array();
    $dica['uid'] = $uid;
    $dica['nomejogo'] = $nomejogo;
    $dica['imgjogo'] = $imgjogo;
    array_push($dicas,$dica);
} 
    return $dicas;
}
    
function updatejogo($campo_1,$campo_2,$campo_3){
    $stmt = $this->con->prepare("update jogo_tb set nomejogo = ? , ,imgjogo= ?  where uid=?");
    $stmt->bind_param("sssi",$campo_2,$campo_3,$campo_1);
    if($stmt ->execute())
    return true;
    return false;
}
}