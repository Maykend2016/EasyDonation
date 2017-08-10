
<div id="div2">
	<?php
			 include '../Acesso_BD/conection_data_base.php';
		?>
		<label for="cod_estados">Estados:</label>
		<select name="cod_estados" id="cod_estados">
			<option value=""></option>
			<?php
				
                                $sql = "SELECT cod_estados, sigla FROM estados ORDER BY sigla ASC";
                                $pqs = $conn->prepare($sql);
                                $pqs->execute();
                                while ($row = $pqs->fetch()) {
                                    echo '<option value="' . $row['cod_estados'] . '">' . utf8_encode($row['sigla']) . '</option>';
                                }
			?>
		</select>

		<label for="cod_cidades">Cidade:</label>
		<span class="carregando">Aguarde, carregando...</span>
		<select name="cod_cidades" id="cod_cidades">
			<option value="">-- Escolha um estado --</option>
		</select>

				

		
    
</div>


