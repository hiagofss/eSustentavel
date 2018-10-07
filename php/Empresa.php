<?php
/**
 * Created by PhpStorm.
 * User: hiago
 * Date: 06/10/2018
 * Time: 16:45
 */

function cadastrarEmpresa(){
    $nm_empresa = filter_input(INPUT_POST, 'inpNome');
    $tp_residuo = filter_input(INPUT_POST, 'inpTp');
    $inpSeg = filter_input(INPUT_POST, 'inpSeg');
    $inpTel = filter_input(INPUT_POST, 'inpTel');
    $inpEmail = filter_input(INPUT_POST, 'inpEmail');

    if(empty($nm_empresa) || empty($tp_residuo) || empty($inpSeg) || empty($inpTel) || empty($inpEmail)){
        $_SESSION['msgErroCad'] = "Nenhum campo pode está vazio";
        header("Location: ../pag_empresa.php");
    }else{

        $con = startConnection();
        $stmt = $con->prepare("INSERT INTO `esustentavel`.`cad_empresas` (`nm_empresa`, `tp_residuo_empresa`, `segm_residuo`, `tel_empresa`, `email_empresa`) VALUES (?, ?, ?, ?, ?);
");
        $stmt->bindValue(1, $nm_empresa);
        $stmt->bindValue(2, $tp_residuo);
        $stmt->bindValue(3, $inpSeg);
        $stmt->bindValue(4, $inpTel);
        $stmt->bindValue(5, $inpEmail);
        if($stmt->execute()){
            $_SESSION['msgSuce'] = "Empresaa cadastrado com sucesso";
        }else{
            $_SESSION['msgErroCad'] = "Erro ao cadastrar o Empresa";
        }

        header("Location: ../pag_empresa.php");
    }
}

function listarEmpresa(){
    require 'Connection.php';
    $con = startConnection();
    $stmt = $con->prepare("SELECT * FROM esustentavel.cad_empresas;");
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