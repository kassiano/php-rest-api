<?php

//conexão
$conn = mysqli_connect('localhost', 'root', 'bcd127', 'dbTesteAPI');


// pegar o metodo da chamada, POST ou GET
$method = $_SERVER['REQUEST_METHOD'];

//Via POST faremos o update e o insert
if ($method == "POST"){

  $acao = $_POST["acao"];

  $tabela = $_POST["tabela"];
  $valores = $_POST["valores"];

  $sql = "";
  if ($acao == "INSERT") {
      $sql = "INSERT INTO $tabela set $valores;";
  }

  if ($acao == "UPDATE") {
     $sql = "UPDATE $tabela set $valores;";
  }

  //Executar ação no banco
  $result = mysqli_query($conn, $sql);

  echo $result;

}else if ($method == "GET"){
  //via get faremos o select e o delete

    $acao = $_GET["acao"];

    $tabela = $_GET["tabela"];
    $where = $_GET["where"];

    $sql = "";
    if ($acao == "SELECT") {

      if($where != ""){
        $where = "where $where";
      }
      
        $sql = "SELECT * from $tabela $where;";

        //Executar ação no banco
        $result = mysqli_query($conn, $sql);

        $arrayRetorno = array();
        if (mysqli_num_rows($result) > 0) {

            while($item = mysqli_fetch_assoc($result)) {
                $arrayRetorno[] = $item;
            }

        } else {
            echo json_encode($arrayRetorno);
        }
    }

    if ($acao == "DELETE") {
       $sql = "DELETE from $tabela $where;";

       //Executar ação no banco
       $result = mysqli_query($conn, $sql);

       echo $result ;
    }

}else{

  echo json_encode(array("erro" => true , "mensagem" => "metodo não suportado"));

}

?>
