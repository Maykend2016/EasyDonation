<?php
   //ISSENT ELE VERIFICA SE O NOME DO BOTAO PRECIONADO É 'ACAO'
session_start();
if (isset($_POST['acao'])) {
    
    //CHAMA A CONEXAO REAPROVEITANDO O CODIGO 
                 include '../Acesso_BD/conection_data_base.php';
               
                
                
                $email = $_POST['email'];
                $senha = $_POST['senha'];


                try {
                    //$CONN É RESPONSALVE POR PREPARAR O BANCO DE DADOS E TRATAR AS SELEÇÕES E INSERÇÕES NAS TABELAS EXISTENTES
                    $stmt = $conn->prepare('SELECT * FROM easy_instituicao WHERE inst_email = :email AND inst_password = :senha');
                    //O METODO DE ARRAY NO EXECUTE EVITA INJEÇÕES DE SQL
                    $stmt->execute(array('email' => $email, 'senha' => $senha));
                    

                    if ($row = $stmt->fetch()) {
                        //CRIANDO A SESSAO
                        $_SESSION['email'] = $email;
                        $_SESSION['senha'] = $senha;
                        header("Location:../view/index_instituicao.php");
                    }  
                    else {
                        unset ($_SESSION['login']);
                        unset ($_SESSION['senha']);
                        header("Location:../../login.html"); 
                        
                    }
                            
                } catch (PDOException $e) {
                    echo 'ERROR: ' . $e->getMessage();
                }
            }
            ?>
