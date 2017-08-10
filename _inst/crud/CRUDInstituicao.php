
<?php

// Create Tiago Ferreira
//INICIAR CONEXAO COM BANCO DE DADOS
 include '../Acesso_BD/conection_data_base.php';
//INICIAR MODEL DE INSTITUICAO PARA CRIAR UM OBJETO
include '../model/Instituicao.php';

//CRIANDO UM OBJETO
$instituicao = new Instituicao();

//ATRIBUINDO VALORES
$instituicao->setId($_POST['id']);
$instituicao->setEmail($_POST['email']);
$instituicao->setNome($_POST['nome']);
$instituicao->setSenha($_POST['senha']);
$instituicao->setCI($_POST['ci']);
$instituicao->setDescricao($_POST['descricao']);
$instituicao->setCategoria($_POST['categoria']);
$instituicao->setEstado($_POST['estado']);
$instituicao->setCidade($_POST['cidade']);
$instituicao->setBairro($_POST['bairro']);
$instituicao->setRua($_POST['rua']);
$instituicao->setNumero($_POST['numero']);
$instituicao->setTelefone($_POST['telefone']);

//CADASTRO DA INSTITUIÇAO QUE SÓ PODE SER FEITO POR UM ADMINISTRADOR\
if (isset($_POST['cadastro_inst'])) {
    echo 'cadastro!';
    $cadastro = $conn->query("INSERT INTO easy_instituicao(inst_id, inst_email, inst_nome, inst_password, inst_CI, inst_descricao, inst_categoria, inst_rua, inst_numero, inst_cidade, inst_bairro, inst_telefone) VALUES "
            . "(" . $instituicao->getId() . ""
            . ",'" . $instituicao->getEmail() . "',"
            . ",'" . $instituicao->getNome() . "',"
            . ",'" . $instituicao->getSenha() . "',"
            . ",'" . $instituicao->getCI() . "',"
            . ",'" . $instituicao->getDescricao() . "',"
            . ",'" . $instituicao->getCategoria() . "',"
            . ",'" . $instituicao->getRua() . "',"
             . ",'" . $instituicao->getNumero() . "',"
            . ",'" . $instituicao->getCidade() . "',"
            . ",'" . $instituicao->getBairro(). "',"
            . ", '" . $instituicao->getTelefone() . "')");
}

//ATUALIZAR AS INFORMAÇÕES DA INSTITUICAO
elseif (isset($_POST['atualizar_inst'])) {

    $update = $conn->prepare("UPDATE easy_instituicao SET inst_email= :email, inst_nome= :nome, inst_password= :senha, inst_CI= :CI,"
            . " inst_descricao= :descricao, inst_categoria= :categoria,  inst_rua= :rua, inst_numero= :numero, inst_cidade= :cidade, inst_bairro= :bairro,"
            . " inst_telefone= :telefone WHERE inst_id=:id");
    $update->bindValue(":email", $instituicao->getEmail());
    $update->bindValue(":nome", $instituicao->getNome());
    $update->bindValue(":senha", $instituicao->getSenha());
    $update->bindValue(":CI", $instituicao->getCI());
    $update->bindValue(":descricao", $instituicao->getDescricao());
    $update->bindValue(":categoria", $instituicao->getCategoria());
    $update->bindValue(":rua", $instituicao->getRua());
    $update->bindValue(":numero", $instituicao->getNumero());
    $update->bindValue(":cidade", $instituicao->getCidade());
    $update->bindValue(":bairro", $instituicao->getBairro());
    $update->bindValue(":telefone", $instituicao->getTelefone());
    $update->bindValue(":id", $instituicao->getId());
    
    $update->execute();
    if ($update->rowCount() > 0):

        echo 'USUARIO ATUALIZADO COM SUCESSO!';
    else:
        echo 'DESCULPE,  A INSTITUIÇÂO NAO FOI ATUALIZADO';
    endif;
}

elseif (isset($_POST['perfil_at_inst'])) {
echo '<script type="text/javascript"> alert("Chegou"); </script>';
    $update = $conn->prepare("UPDATE easy_instituicao SET inst_nome= :nome,"
            . " inst_descricao= :descricao, inst_categoria= :categoria,"
            . " inst_telefone= :telefone WHERE inst_CI=:CI");
    $update->bindValue(":nome", $instituicao->getNome());
    $update->bindValue(":CI", $instituicao->getCI());
    $update->bindValue(":descricao", $instituicao->getDescricao());
    $update->bindValue(":categoria", $instituicao->getCategoria());
    $update->bindValue(":telefone", $instituicao->getTelefone());
    
    $update->execute();
     header('location:../../_inst/view/instituicao_atualizar_pf.php');
    if ($update->rowCount() > 0):

        echo 'USUARIO ATUALIZADO COM SUCESSO!';
    else:
        echo 'DESCULPE,  A INSTITUIÇÂO NAO FOI ATUALIZADO';
    endif;
}

elseif (isset($_POST['local_mudar'])) {
    echo '<script type="text/javascript"> alert("Chegou"); </script>';
    $update = $conn->prepare("UPDATE easy_instituicao SET inst_estado= :estado,"
            . " inst_cidade= :cidade, inst_bairro= :bairro, inst_rua= :rua,"
            . " inst_numero= :numero WHERE inst_CI=:CI");
    $update->bindValue(":estado", $instituicao->getEstado());
    $update->bindValue(":CI", $instituicao->getCI());
    $update->bindValue(":cidade", $instituicao->getCidade());
    $update->bindValue(":bairro", $instituicao->getBairro());
    $update->bindValue(":rua", $instituicao->getRua());
    $update->bindValue(":numero", $instituicao->getNumero());
    
    $update->execute();
     header('location:../../_inst/view/instituicao_mudar_local.php');
    if ($update->rowCount() > 0):

        echo 'USUARIO ATUALIZADO COM SUCESSO!';
    else:
        echo 'DESCULPE,  A INSTITUIÇÂO NAO FOI ATUALIZADO';
    endif;
}

//DELETA INSTITUIÇAO
elseif (isset($_POST['delete_instituicao'])) {

    $update = $pdo->prepare("DELETE FROM easy_instituicao WHERE inst_CI=:ci");
    $update->bindValue(":ci", $instituicao->getCI());
    $update->execute();
    if ($update->rowCount() > 0):

        echo 'DELETADO COM SUCESSO!';
    else:
        echo 'DESCULPE, A INSTITUIÇÂO NAO FOI DELETADO';
    endif;
}
//Listar usuarios





?>
