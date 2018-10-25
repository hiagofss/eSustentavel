<?php
/**
 * Created by PhpStorm.
 * User: hiago
 * Date: 22/09/2018
 * Time: 16:04
 */

function cadastrarEnergia()
{
    $nm_empresa = filter_input(INPUT_POST, 'inpNome');
    $data = filter_input(INPUT_POST, 'inpData');
    $kwh = filter_input(INPUT_POST, 'inpKwh');
    $valor = filter_input(INPUT_POST, 'inpValor');

    $date = implode("-", array_reverse(explode("/", $data)));

    if (empty($nm_empresa) || empty($data) || empty($kwh) || empty($valor)) {
        $_SESSION['msgErroCad'] = "Nenhum campo pode está vazio";
        header("Location: ../pag_controleEnergia.php");
    } else {

        $con = startConnection();
        $stmt = $con->prepare("INSERT INTO `esustentavel`.`consumo_energia` (`nm_empresa_energia`, `data_leitura`, `kw_h`, `vl_energia`) VALUES (?, ?, ?, ?)");
        $stmt->bindValue(1, $nm_empresa);
        $stmt->bindValue(2, $date);
        $stmt->bindValue(3, $kwh);
        $stmt->bindValue(4, $valor);

        if ($stmt->execute()) {
            $_SESSION['msgSuce'] = "Consumo de Agua cadastrado com sucesso";
        } else {
            $_SESSION['msgErroCad'] = "Erro ao cadastrar o consumo";
        }

        header("Location: ../pag_controleEnergia.php");
    }
}

function listarEnergia()
{
    require_once 'Connection.php';
    $con = startConnection();
    $stmt = $con->prepare("SELECT * FROM esustentavel.consumo_energia");
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        $arrayEnergia[] = $row;
    }
    $con == null;
    return $arrayEnergia;
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