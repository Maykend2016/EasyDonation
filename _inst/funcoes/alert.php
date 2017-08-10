<?php ?>
 <?php 
                    
                    
                    $pesquisa_alert = "SELECT * FROM easy_doacao WHERE inst_CI = '$valor_CI' ORDER BY data DESC LIMIT 5 ";
                    $alert_doacao = $conn->query($pesquisa_alert) or die($conn->error);
                    $alert = $alert_doacao->fetch(PDO::FETCH_ASSOC);
                    $nr = $alert_doacao->rowCount();
                    if($nr> 0){
                    do{
                        //NOME CATEGORIA
                                                $id_cat = $alert['id_cat'];
                                                $sql = "SELECT titulo_cat FROM easy_categoria WHERE id = $id_cat";
                                                $pqs = $conn->query($sql);
                                                $pqs->execute();
                                                while ($roow = $pqs->fetch()) {
                                                    $nome_cat = $roow['titulo_cat'];
                                                }
                    echo '
                        <li>
                        <a href="#">'.$nome_cat.'<span class="label pull-right label-default">'.$alert['data'].'</span></a>
                        </li>
                    ';
                    
                    }while ($alert = $alert_doacao->fetch(PDO::FETCH_ASSOC));
                    }
                    else {
                        
                    }
                    
                    
                    ?>
                    
                    <li class="divider"></li>
                    <li>
                        <a href="instituicao_todas_doacoes.php">Ver Todas</a>
                    </li>
<?php ?>                    