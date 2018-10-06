<?php
/**
 * Created by PhpStorm.
 * User: hiago
 * Date: 06/10/2018
 * Time: 17:12
 */

function cadastrarSegmento(){
    $nm_residuo = filter_input(INPUT_POST, 'nm_residuo');

    if(empty($nome) || empty($preco) || empty($qtd)){
        $_SESSION['msgErroCad'] = "Nenhum campo pode está vazio";
        header("Location: ../pag_segmento.php");
    }else{

        $con = startConnection();
        $stmt = $con->prepare("INSERT INTO `tp_residuos` (`id_residuo`, `nm_residuo`) VALUES(?,?)");
        $stmt->bindValue(1, $nm_residuo);
        if($stmt->execute()){
            $_SESSION['msgSuce'] = "Residuo cadastrado com sucesso";
        }else{
            $_SESSION['msgErroCad'] = "Erro ao cadastrar o Residuo";
        }

        header("Location: ../pag_segmento.php");
    }
}

function listarSegmento(){
    require 'Connection.php';
    $con = startConnection();
    $stmt = $con->prepare("SELECT * FROM esustentavel.segm_residuos;");
    $stmt->execute();

    while($row = $stmt->fetch()){
        $empresas[] = $row;
    }

    return $empresas;
}

//function excluir(){
//    $id = filter_input(INPUT_POST, 'idMovel');
//    $con = startConnection();
//    $stmt = $con->prepare("DELETE FROM moveis WHERE id = ?");
//    $stmt->bindValue(1, $id);
//    $stmt->execute();
//
//    if($stmt->rowCount() > 0){
//        $_SESSION['msgSuce'] = "Produto excluído com sucesso";
//    }else{
//        $_SESSION['msgErro'] = "Erro ao excluir o produto";
//    }
//
//    header("Location: ../pag_estoque.php");
//}

//function editar(){
//    $idMovel = filter_input(INPUT_POST, 'idMovel');
//    $nome = filter_input(INPUT_POST, 'inpNome');
//    $preco = filter_input(INPUT_POST, 'inpPreco');
//
//    if(empty($nome) || empty($preco)){
//        $_SESSION['msgErro'] = "Nenhum campo pode está vazio";
//        header("Location: ../pag_estoque.php");
//    }else{
//        $con = startConnection();
//        $stmt = $con->prepare("UPDATE moveis SET nome = ?, preco = ? WHERE id = ?");
//        $stmt->bindValue(1, $nome);
//        $stmt->bindValue(2, $preco);
//        $stmt->bindValue(3, $idMovel);
//        $stmt->execute();
//
//        if($stmt->rowCount() > 0){
//            $_SESSION['msgSuce'] = "Dados alterados com sucesso";
//        }else{
//            $_SESSION['msgSuce'] = "Erro ao alterar os dados";
//        }
//
//        header("Location: ../pag_estoque.php");
//    }
//}

?>