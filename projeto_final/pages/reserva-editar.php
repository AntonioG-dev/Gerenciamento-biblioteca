<h1>Editar Reserva</h1>
<?php
	$sql_1 = "SELECT * FROM reserva WHERE aluno_id_aluno=".$_REQUEST["aluno_id_aluno"];

	$res_1 = $conn->query($sql_1) or die($conn->error);

	$row_1 = $res_1->fetch_object();

?>
<form action="?page=reserva-salvar" method="POST">

	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="aluno_id_aluno" value="<?php print $row_1->aluno_id_aluno?>">


	<div class="mb-3">
		<label>Aluno</label>
		<select name="aluno_id_aluno" class="form-control">
			<option>-=Escolha o Aluno=-</option>
		<?php
			$sql = "SELECT * FROM aluno";

			$res = $conn->query($sql) or die($conn->error);

			if($res->num_rows > 0){
				while($row = $res->fetch_object()){
					
					if ($row->id_aluno == $row_1->aluno_id_aluno) {
						print "<option value='".$row->id_aluno."' selected>";
						print $row->nome_aluno."</option>";
					}else{
						print "<option value='".$row->id_aluno."'>";
						print $row->nome_aluno."</option>";
					}		
					
							
				}
			}else{
				print "Não há alunos cadastradas";
			}
		?>
		</select>
	</div>

	<div class="mb-3">
		<label>Livro</label>
		<select name="livro_id_livro" class="form-control">
			<option>-=Escolha o Livro=-</option>
		<?php
			$sql = "SELECT * FROM livro";

			$res = $conn->query($sql) or die($conn->error);

			if($res->num_rows > 0){
				while($row = $res->fetch_object()){
					
					if ($row->id_livro == $row_1->livro_id_livro) {
						print "<option value='".$row->id_livro."' selected>";
						print $row->titulo_livro."</option>";
					}else{
						print "<option value='".$row->id_livro."'>";
						print $row->titulo_livro."</option>";
					}			
							
				}
			}else{
				print "Não há livros cadastradas";
			}
		?>
		</select>
	</div>

	<div class="mb-3">
		<label>Atendente</label>
		<select name="atendente_id_atendente" class="form-control">
			<option>-=Escolha o Atendente=-</option>
		<?php
			$sql = "SELECT * FROM atendente";

			$res = $conn->query($sql) or die($conn->error);

			if($res->num_rows > 0){
				echo "veio aqui";
				while($row = $res->fetch_object()){
					
					if ($row->id_atendente == $row_1->atendente_id_atendente) {
						print "<option value='".$row->id_atendente."' selected>";
						print $row->nome_atendente."</option>";
					}else{
						print "<option value='".$row->id_atendente."'>";
						print $row->nome_atendente."</option>";
					}			
							
				}
			}else{
				print "Não há atendentes cadastradas";
			}
		?>
		</select>
	</div>

	<div class="mb-3">
		<label>Data de Emprestimo</label>
		<input type="date" name="data_emprestimo" class="form-control" value="<?php print $row_1->data_emprestimo ?>">
	</div>

	<div class="mb-3">
		<label>Data de Devolução</label>
		<input type="date" name="data_devolucao" class="form-control" value="<?php print $row_1->data_devolucao ?>">
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>