<h1>Listar Reserva</h1>
<?php
	$sql = "SELECT * FROM reserva 
	INNER JOIN aluno on aluno.id_aluno = reserva.aluno_id_aluno
	INNER JOIN livro on livro.id_livro = reserva.livro_id_livro
	INNER JOIN atendente on atendente.id_atendente = reserva.atendente_id_atendente ";

	$res = $conn->query($sql) or die($conn->error);

	$qtd = $res->num_rows;

	print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";

	if($qtd > 0){
		print "<table class='table table-striped table-hover table-bordered'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Aluno</th>";
		print "<th>Livro</th>";
		print "<th>Atendente</th>";
		print "<th>Data de devolução</th>";
		print "<th>Data de Emprestimo</th>";
		print "<th>Ações</th>";	
		print "</tr>";
		while($row = $res->fetch_object()){
			print "<tr>";
			print "<td>".$row->id_aluno."</td>";
			print "<td>".$row->nome_aluno."</td>";
			print "<td>".$row->titulo_livro."</td>";
			print "<td>".$row->nome_atendente."</td>";
			print "<td>".$row->data_devolucao."</td>";
			print "<td>".$row->data_emprestimo."</td>";

			print "<td>
						<button class='btn btn-primary' onclick=\"location.href='?page=reserva-editar&aluno_id_aluno=".$row->aluno_id_aluno."';\">Editar</button>

						<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=reserva-salvar&acao=excluir&aluno_id_aluno=".$row->aluno_id_aluno."';}else{false;}\">Excluir</button>
				   </td>";	
			print "</tr>";
		}
		print "</table>";	
	}else{
		print "<div class='alert alert-danger'>Não encontrou resultados.</div>";
	}