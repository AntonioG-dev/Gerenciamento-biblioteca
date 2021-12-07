<h1>Editar Livro</h1>
<?php
	$sql_1 = "SELECT * FROM livro WHERE id_livro=".$_REQUEST["id_livro"];

	$res_1 = $conn->query($sql_1) or die($conn->error);

	$row_1 = $res_1->fetch_object();

?>
<form action="?page=livro-salvar" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_livro" value="<?php print $row_1->id_livro; ?>">

	<div class="mb-3">
		<label>Título do Livro</label>
		<input type="text" name="titulo_livro" class="form-control" value="<?php print $row_1->titulo_livro; ?>">
	</div>
	<div class="mb-3">
		<label>Autor do Livro</label>
		<input type="text" name="autor_livro" class="form-control" value="<?php print $row_1->autor_livro; ?>">
	</div>
	<div class="mb-3">
		<label>Editora do Livro</label>
		<input type="text" name="editora_livro" class="form-control" value="<?php print $row_1->editora_livro; ?>">
	</div>
	<div class="mb-3">
		<label>Edição do Livro</label>
		<input type="text" name="edicao_livro" class="form-control" value="<?php print $row_1->edicao_livro; ?>">
	</div>
	<div class="mb-3">
	
	<label>Categoria</label>

	<select name="categoria_id_categoria" class="form-control">
			<option>-=Escolha a Categoria=-</option>
		<?php
			$sql = "SELECT * FROM categoria";

			$res = $conn->query($sql) or die($conn->error);

			if($res->num_rows > 0){
				while($row = $res->fetch_object()){
					if($row->id_categoria == $row_1->categoria_id_categoria){
						print "<option value='".$row->id_categoria."' selected>";
						print $row->nome_categoria."</option>";
					}else{
						print "<option value='".$row->id_categoria."'>";
						print $row->nome_categoria."</option>";
					}			
				}
			}else{
				print "Não há categorias cadastradas";
			}
		?>
		</select>
	</div>
	<div class="mb-3">
		<label>Ano do Livro</label>
		<input type="text" name="ano_livro" class="form-control" value="<?php print $row_1->ano_livro; ?>">
	</div>
	
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
	
</form>