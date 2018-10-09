<?php
/**
 * Created by PhpStorm.
 * User: hiago
 * Date: 22/09/2018
 * Time: 16:04
 */

function cadastrarAgua(){
    $nm_empresa = filter_input(INPUT_POST, 'nome');
    $data = filter_input(INPUT_POST, 'data');
    $metragem = filter_input(INPUT_POST, 'metragem');
    $valor = filter_input(INPUT_POST, 'valor');

    console_log($nm_empresa);

//    $date = implode("-",array_reverse(explode("/",$data)));

    if(empty($nm_empresa) || empty($data) || empty($metragem) || empty($valor)){
        $_SESSION['msgErroCad'] = "Nenhum campo pode está vazio";
        header("Location: ../pag_controleAgua.php");
    }else{

        $con = startConnection();
        $stmt = $con->prepare("INSERT INTO `esustentavel`.`consumo_agua` (`nm_empresa_agua`, `data_leitura`, `m3_agua`, `vl_agua`) VALUES (?, ?, ?, ?);");
        $stmt->bindValue(1, $nm_empresa);
        $stmt->bindValue(2, $data);
        $stmt->bindValue(3, $metragem);
        $stmt->bindValue(4, $valor);

        if($stmt->execute()){
            $_SESSION['msgSuce'] = "Consumo de Agua cadastrado com sucesso";
        }else{
            $_SESSION['msgErroCad'] = "Erro ao cadastrar o consumo";
        }

        header("Location: ../pag_controleAgua.php");
    }
}

function listarAgua(){
    require 'Connection.php';
    $con = startConnection();
    $stmt = $con->prepare("SELECT * FROM esustentavel.consumo_agua");
    $stmt->execute();

    while($row = $stmt->fetch()){
        $arrayAgua[] = $row;
    }

    return $arrayAgua;
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