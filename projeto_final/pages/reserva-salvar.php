<?php
	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
			$livro = $_POST["livro_id_livro"];
			$aluno = $_POST["aluno_id_aluno"];
			$atendente = $_POST["atendente_id_atendente"];
			$devolucao = $_POST["data_devolucao"];
			$emprestimo = $_POST["data_emprestimo"];
	

			$sql = "INSERT INTO reserva (livro_id_livro, aluno_id_aluno, atendente_id_atendente, data_devolucao, data_emprestimo )
					VALUES ('{$livro}','{$aluno}','{$atendente}','{$devolucao}','{$emprestimo}')";

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Cadastrado com sucesso!');</script>";
				print "<script>location.href='?page=livro-listar';</script>";
			}else{
				print "<script>alert('Não foi possível cadastrar!');</script>";
				print "<script>location.href='?page=livro-listar';</script>";
			}

			break;
		
		case 'editar':
			$livro = $_POST["livro_id_livro"];
			$aluno = $_POST["aluno_id_aluno"];
			$atendente = $_POST["atendente_id_atendente"];
			$devolucao = $_POST["data_devolucao"];
			$emprestimo = $_POST["data_emprestimo"];
	

			$sql = "UPDATE reserva SET  livro_id_livro={$livro}, aluno_id_aluno='{$aluno}', atendente_id_atendente='{$atendente}', data_devolucao='{$devolucao}', data_emprestimo='{$emprestimo}' WHERE aluno_id_aluno=".$_POST["aluno_id_aluno"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Editado com sucesso');</script>";
				print "<script>location.href='?page=reserva-listar';</script>";
			}else{
				print "<script>alert('Não foi possível editar');</script>";
				print "<script>location.href='?page=reserva-listar';</script>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM reserva 
					WHERE aluno_id_aluno=".$_REQUEST["aluno_id_aluno"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Excluído com sucesso!');</script>";
				print "<script>location.href='?page=reserva-listar';</script>";
			}else{
				print "<script>alert('Não foi possível excluir!');</script>";
				print "<script>location.href='?page=reserva-listar';</script>";
			}
			break;
	}