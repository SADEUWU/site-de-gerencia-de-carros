<?php
	class ORM
		{
			function conexaoBDD()
				{
					global $conexao;
					$conexao=new mysqli('localhost','root','','estoque_veiculos');	
				}
			function criarFORM()
				{
					print"
					<div align='center'>
						<form method='POST' action=''>
							
							<input type='text' name='placa' placeholder='Placa do veículo' required><br><br>
							
							<input type='text' name='marca' placeholder='Marca do veículo' required><br><br>

							<input type='text' name='modelo' placeholder='Modelo do veículo' required><br><br>

							<input type='text' name='ano' placeholder='Ano do veículo' required><br><br>

							<input type='text' name='cor' placeholder='Cor do veículo' required><br><br>

							<input type='text' name='km' placeholder='Km do veículo' required><br><br>

							Status de Negociação:
							<select name='status'>
								<option value='V'>Vendido</option>
								<option value='N'>Pré-Negociado</option>
								<option value='D'>Disponível</option>
							</select>
							
							<input type='submit' value='Carregar'>
							
							<input type='reset' value='Limpar'>
						</form>
					</div>
					";
				}
			function carregaVeiculo()
				{
					global $conexao;

					$placa=$_POST['placa'];
					$marca=$_POST['marca'];
					$modelo=$_POST['modelo'];
					$ano=$_POST['ano'];
					$cor=$_POST['cor'];
					$km=$_POST['km'];
					$status=$_POST['status'];

					$carregaVeiculo=$conexao->query("INSERT INTO controleunidades VALUES ('$placa','$marca','$modelo','$ano','$cor','$km','$status')");
					$limparNulos=$conexao->query("DELETE FROM controleunidades WHERE placa=''");

					if($carregaVeiculo)
						{
							echo"Atenção: Foi inserida uma linha na tabela";
						}
					else
						{
							echo"Nenhum dado foi inserido";
						}
				}
			function visualizaVeiculo()	
				{
					global $conexao;

					print"
						<table align='center' border='1'>
							<tr>
								<th>Placa</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Ano</th>
								<th>Cor</th>
								<th>Km</th>
								<th>Status</th>
								<th>Apagar</th>
								<th>Alterar</th>
							</tr>
					";
						
						$consultarVeiculo=$conexao->query("SELECT controleunidades.placa AS placa, controleunidades.marca AS marca, controleunidades.modelo AS modelo, controleunidades.ano AS ano, controleunidades.cor AS cor, controleunidades.km AS km, controleunidades.status AS status, proprietarios.cpf_pr, proprietarios.nome_pr FROM controleunidades INNER JOIN proprietarios ON controleunidades.placa= proprietarios.placa");
						
						while($resultadoConsulta=$consultarVeiculo->fetch_assoc())
							{
								$placa=$resultadoConsulta['placa'];
								$marca=$resultadoConsulta['marca'];
								$modelo=$resultadoConsulta['modelo'];
								$ano=$resultadoConsulta['ano'];
								$cor=$resultadoConsulta['cor'];
								$km=$resultadoConsulta['km'];
								$status=$resultadoConsulta['status'];

								switch($status)
									{
										case $status=="V":
											$status="<img src='./img/v.png' width='45' heigh='45'>";
										break;

										case $status=="N":
											$status="<img src='./img/n.png' width='45' heigh='45'>";
										break;	

										case $status=="D":
											$status="<img src='./img/d.png' width='45' heigh='45'>";
										break;																			

									}

							print"
								<tr>
									<td align='center'>$placa</td>
									<td align='center'>$marca</td>
									<td align='center'>$modelo</td>
									<td align='center'>$ano</td>
									<td align='center'>$cor</td>
									<td align='center'>$km</td>
									<td align='center'>$status</td>
									<td align='center'><a href='apagar.php?valor_enviado=$placa' target='popup' 
            onclick=\"window.open('apagar.php?valor_enviado=$placa','popup','width=600,height=600'); return false;\"><img src='./img/apagar.png' width='50' heigh='50'></td>
							


			<td align='center'><a href='apagar.php?valor_enviado=$placa' target='popup' 
            onclick=\"window.open('alterar.php?valor_enviado=$placa','popup','width=600,height=600'); return false;\"><img src='./img/apagar.png' width='50' heigh='50'></td>





							";


							}
					print"
						</tr>
						</table>
					";
				}

				function apagar()
					{
						
						global $conexao;
						$valor_recebido=$_GET['valor_enviado'];
						$apagar=$conexao->query("DELETE FROM controleunidades WHERE placa='$valor_recebido'");

						if($apagar)
							{
								print"O registro do veículo com placa $valor_recebido, foi deletado com sucesso";
							}
						else
							{
								print"Não foi possível deletar o registro";
							}


					}
					function alterar()
					{
						global $conexao;
						$valor_recebido=$_GET['valor_enviado'];
						
						print"
							<form method='POST' action=''>
							<input type='text' name='placa' value='$valor_recebido' readonly>
							<input type='text' name='marca' placeholder='Nova Marca'>
							<input type='text' name='modelo'placeholder='Alterar o Modelo'>
							<input type='text' name='ano' placeholder='Altere a ano'>
							<input type='text' name='cor' placeholder='Altere a cor'>
							<input type='text' name='km' placeholder='Altere o '>
							<input type='submit' value='Alterar'>
							<input type='reset' value='Limpar'>
							</form>
						";

						$marca=$_POST['marca'];
						$modelo=$_POST['modelo'];
						$ano=$_POST['ano'];
						$cor=$_POST['cor'];
						$km=$_POST['km'];

						$alterar=$conexao->query("UPDATE controleunidades SET marca='$marca', modelo='$modelo', ano='$ano',cor='$cor',km='$km'WHERE placa='$valor_recebido'");

						if($alterar){
							echo"OS dados do veiculo com placa $valor_recebido foram  alterados com sucesso";
						}
						else
						{
							echo "Não foi possível executar as alterações,favor revisar funcções ou dados inseridos no formulario";
						}
					}
				

		}
?>