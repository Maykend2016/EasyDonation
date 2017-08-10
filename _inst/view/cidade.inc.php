
<?php
header("Content-Type: text/html; charset=ISO-8859-1");


function  intGet( $campo ){
    return isset( $_GET[$campo] ) ? (int)$_GET[$campo] : 0;
}
function retorno( $id ){
    $sql = "SELECT `cidade_id`, `cidade_nome`"
            . " FROM `app_cidades`"
            . " WHERE `estado_id` = {$id}";
    $sql .=" ORDER BY `cidade_nome`";
    
    $mysqli = new mysqli("localhost", "root", "",  "easy_donation");
    
    $q = $mysqli->query($sql);
    
    $json = ' [';
    if($q->num_rows > 0)
    {
        while( $dados = $q->fetch_object() )
        {
            $json .= '{"cidade_nome":"'.$dados->cidade_nome.'","cidade_id":"'.$dados->cidade_id.'"}, ';
        }
    }
    else{
        $json .= '{"cidade_nome": "Não Encontrado"}';
    }
    $json .= ']';
    
    return $json;
}

echo retorno(intGet(json_encode('estado_id')));
/*
include '../../_admin/conection_data_base.php';

$cod_estado = $_GET['search'];


$buscarCidades = $conn->prepare("SELECT * FROM app_cidades WHERE estado_id= $cod_estado ORDER BY cidade_nome ABC");
$buscarCidades->execute();

foreach ($buscarCidades->fetchAll() as $cit) {
    echo "<option value=".$cit['cidade_id'].">"+ utf8_encode($cit['cidade_nome'])+"</option>";
    
}*/
?>
