
<?php

// Create Tiago Ferreira
//INICIAR CONEXAO COM BANCO DE DADOS
include '../../_inst/Acesso_BD/conection_data_base.php';
//INICIAR MODEL DE INSTITUICAO PARA CRIAR UM OBJETO
include '../model/Doacao.php';

//CRIANDO UM OBJETO
$doacao = new Doacao();

//ATRIBUINDO VALORES

$doacao->setInst_CI($_POST['ci']);
$doacao->setId_cat($_POST['categoria']);
$doacao->setId_subcat($_POST['subcategoria']);
$doacao->setImg_padrao($_FILES['imgpadrao']);
$doacao->setDescricao($_POST['descricao']);
$doacao->setQuantidade($_POST['quantidade']);
$doacao->setData($_POST['data']);


//CADASTRO DA INSTITUIÇAO QUE SÓ PODE SER FEITO POR UM ADMINISTRADOR\
if (isset($_POST['cadastro_doacao'])) {

// Largura máxima em pixels
    $largura = 1900;
// Altura máxima em pixels
    $altura = 1920;
// Tamanho máximo do arquivo em bytes
    $tamanho = 9999000;

    $error = array();

// Verifica se o arquivo é uma imagem
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $doacao->getImg_padrao()['type'])) {
        $error[1] = "Isso não é uma imagem.";
    }
// Pega as dimensões da imagem
    $dimensoes = getimagesize($doacao->getImg_padrao()["tmp_name"]);

// Verifica se a largura da imagem é maior que a largura permitida
    if ($dimensoes[0] > $largura) {
        $error[2] = "A largura da imagem não deve ultrapassar " . $largura . " pixels";
    }

// Verifica se a altura da imagem é maior que a altura permitida
    if ($dimensoes[1] > $altura) {
        $error[3] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
    }

// Verifica se o tamanho da imagem é maior que o tamanho permitido
    if ($doacao->getImg_padrao()["size"] > $tamanho) {
        $error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
    }

// Se não houver nenhum erro
    if (count($error) == 0) {

// Pega extensão da imagem
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $doacao->getImg_padrao()['name'], $ext);

// Gera um nome único para a imagem
        $nome_imagem = $doacao->getImg_padrao()['name'];

// Caminho de onde ficará a imagem
        $caminho_imagem = "fotos/" . $nome_imagem;

// Faz o upload da imagem para seu respectivo caminho
        move_uploaded_file($doacao->getImg_padrao()["tmp_name"], $caminho_imagem);

// Insere os dados no banco



        $cadastro = $conn->query("INSERT INTO easy_doacao(inst_CI, id_cat, id_subcat, img_padrao, descricao, quantidade, data) VALUES "
                
                . "('" . $doacao->getInst_CI() . "',"
                . "" . $doacao->getId_cat() . ","
                . "" . $doacao->getId_subcat() . ","
                . "'" . $doacao->getImg_padrao()['name'] . "',"
                . "'" . $doacao->getDescricao() . "',"
                . "" . $doacao->getQuantidade() . ","
                . " '" . $doacao->getData() . "')");
        
        echo "<script type='text/javascript'>alert('Cadastrado com Sucesso!')</script>";
        header('location:../../_inst/view/instituicao_doacao.php');
    }


// Se houver mensagens de erro, exibe-as
    if (count($error) != 0) {
        foreach ($error as $erro) {
            echo $erro . "<br />";
        }
    }
}


//ATUALIZAR AS INFORMAÇÕES DA INSTITUICAO
elseif (isset($_POST['atualizar_doacao'])) {

    $update = $conn->prepare("UPDATE easy_doacao SET  id_cat= :idcat, id_subcat= :idsubcat, img_padrao= :imgpadrao, descricao= :descricao, quantidade = :quantidade, data= :data WHERE id=:id");
    $update->bindValue(":idcat", $doacao->getId_cat());
    $update->bindValue(":idsubcat", $doacao->getId_subcat());
    $update->bindValue(":imgpadrao", $doacao->getImg_padrao());
    $update->bindValue(":descricao", $doacao->getDescricao());
    $update->bindValue(":quantidade", $doacao->getQuantidade());
    $update->bindValue(":data", $doacao->getData());
    $update->bindValue(":id", $doacao->getId());

    $update->execute();
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
