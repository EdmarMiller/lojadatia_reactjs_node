<?php

include("ClassConexao.php");

class ClassProduto extends ClassConexao{
 
  public function exibeProduto()
  {
    $BFetch=$this->conectaDB()->prepare("SELECT * FROM produto_categoria 
    INNER JOIN categoria
    ON categoria.idcategoria = produto_categoria.idcategoria
    INNER JOIN produtos 
    ON produtos.id_produto = produto_categoria.idproduto");
    $BFetch->execute();

    $J=[];
    $I=0;

    while($Fetch=$BFetch->fetch(PDO::FETCH_ASSOC)){
      $J[$I]=[

        "id_produto"=>$Fetch['id_produto'],
        "nome"=>$Fetch['nome'],
        "categoria"=>$Fetch['categoria'],
        "descricao"=>$Fetch['descricao'],
        "preco"=>$Fetch['preco'],
        "preco_final"=>$Fetch['preco_final'],
        "imagem"=>$Fetch['imagem']
        

      ];
      $I++;
            
    }
    header("Access-Control-Allow-Origin:*");
    header("Content-type: application/json");
    echo json_encode($J);
  }
}

?>