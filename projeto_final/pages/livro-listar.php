<h1>Listar Livro</h1>
<?php
	$sql = "SELECT * FROM livro INNER JOIN categoria ON categoria.id_categoria = livro.categoria_id_categoria";

	$res = $conn->query($sql) or die($conn->error);

	$qtd = $res->num_rows;

	print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";

	if($qtd > 0){
		print "<table class='table table-striped table-hover table-bordered'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Título do Livro</th>";
		print "<th>Autor do Livro</th>";
		print "<th>Categoria</th>";	
		print "<th>Editora</th>";
		print "<th>Edição</th>";	
		print "<th>Ano</th>";	
		print "<th>Ações</th>";	
		print "</tr>";
		while($row = $res->fetch_object()){
			print "<tr>";
			print "<td>".$row->id_livro."</td>";	
			print "<td>".$row->titulo_livro."</td>";
			print "<td>".$row->autor_livro."</td>";
			print "<td>".$row->nome_categoria."</td>";	
			print "<td>".$row->editora_livro."</td>";
			print "<td>".$row->edicao_livro."</td>";
			print "<td>".$row->ano_livro."</td>";	

			print "<td>
						<button class='btn btn-primary' onclick=\"location.href='?page=livro-editar&id_livro=".$row->id_livro."';\">Editar</button>

						<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=livro-salvar&acao=excluir&id_livro=".$row->id_livro."';}else{false;}\">Excluir</button>
				   </td>";	
			print "</tr>";
		}
		print "</table>";	
	}else{
		print "<div class='alert alert-danger'>Não encontrou resultados.</div>";
	}
