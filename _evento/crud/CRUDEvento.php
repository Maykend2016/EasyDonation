
<?php

// Create Tiago Ferreira
//INICIAR CONEXAO COM BANCO DE DADOS
include '../../_inst/Acesso_BD/conection_data_base.php';
//INICIAR MODEL DE INSTITUICAO PARA CRIAR UM OBJETO
include '../model/Evento.php';

//CRIANDO UM OBJETO
$evento = new Evento();

//ATRIBUINDO VALORES

$evento->setCI($_POST['ci']);
$evento->setTitulo($_POST['titulo']);
$evento->setImgPadrao($_FILES['img']);
$evento->setDescricao($_POST['descricao']);
$evento->setData($_POST['dataagora']);



//CADASTRO DA INSTITUIÇAO QUE SÓ PODE SER FEITO POR UM ADMINISTRADOR\
if (isset($_POST['cadastro_evento'])) {

// Largura máxima em pixels
    $largura = 1900;
// Altura máxima em pixels
    $altura = 1920;
// Tamanho máximo do arquivo em bytes
    $tamanho = 9999000;

    $error = array();

// Verifica se o arquivo é uma imagem
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $evento->getImgPadrao()['type'])) {
        $error[1] = "Isso não é uma imagem.";
    }
// Pega as dimensões da imagem
    $dimensoes = getimagesize($evento->getImgPadrao()["tmp_name"]);

// Verifica se a largura da imagem é maior que a largura permitida
    if ($dimensoes[0] > $largura) {
        $error[2] = "A largura da imagem não deve ultrapassar " . $largura . " pixels";
    }

// Verifica se a altura da imagem é maior que a altura permitida
    if ($dimensoes[1] > $altura) {
        $error[3] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
    }

// Verifica se o tamanho da imagem é maior que o tamanho permitido
    if ($evento->getImgPadrao()["size"] > $tamanho) {
        $error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
    }

// Se não houver nenhum erro
    if (count($error) == 0) {

// Pega extensão da imagem
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $evento->getImgPadrao()['name'], $ext);

// Gera um nome único para a imagem
        $nome_imagem = $evento->getImgPadrao()['name'];

// Caminho de onde ficará a imagem
        $caminho_imagem = "fotos/" . $nome_imagem;

// Faz o upload da imagem para seu respectivo caminho
        move_uploaded_file($evento->getImgPadrao()["tmp_name"], $caminho_imagem);

// Insere os dados no banco



        $cadastro = $conn->query("INSERT INTO easy_evento(CI, titulo, img, descricao, data) VALUES " 
                . "('" . $evento->getCI() . "',"
                . "'" . $evento->getTitulo() . "',"
                . "'" . $evento->getImgPadrao()['name'] . "',"
                . "'" . $evento->getDescricao() . "',"
                . "" . $evento->getData() . ")");
        
        echo "<script type='text/javascript'>alert('Cadastrado com Sucesso!')</script>";
        header('location:../../_inst/view/instituicao_eventos.php');
    }


// Se houver mensagens de erro, exibe-as
    if (count($error) != 0) {
        foreach ($error as $erro) {
            echo $erro . "<br />";
        }
    }
}

//ATUALIZAR AS INFORMAÇÕES DA INSTITUICAO

?>
