<?php
	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
			$nome 	   = $_POST["nome_aluno"];
			$email 	   = $_POST["email_aluno"];
			$fone 	   = $_POST["fone_aluno"];
			$rgm 	   = $_POST["rgm_aluno"];
			$data_nasc = $_POST["data_nasc_aluno"];
			$genero    = $_POST["genero_aluno"];
			$end 	   = $_POST["end_aluno"];

			$sql = "INSERT INTO aluno (
						nome_aluno, 
						email_aluno, 
						fone_aluno, 
						rgm_aluno, 
						data_nasc_aluno, 
						genero_aluno, 
						end_aluno
					) VALUES (
						'{$nome}', 
						'{$email}', 
						'{$fone}', 
						'{$rgm}', 
						'{$data_nasc}', 
						'{$genero}', 
						'{$end}'
					)"; 

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Cadastrado com sucesso!');</script>";
				print "<script>location.href='?page=usuario-listar';</script>";
			}else{
				print "<script>alert('Não foi possível cadastrar');</script>";
				print "<script>location.href='?page=usuario-listar';</script>";
			}
			break;
		
		case 'editar':
			$nome 	   = $_POST["nome_usuario"];
			$email 	   = $_POST["email_usuario"];
			$fone 	   = $_POST["fone_usuario"];
			$rgm 	   = $_POST["rgm_usuario"];
			$data_nasc = $_POST["data_nasc_usuario"];
			$genero    = $_POST["genero_usuario"];
			$end 	   = $_POST["end_usuario"];

			$sql = "UPDATE usuario SET
						nome_usuario='{$nome}', 
						email_usuario='{$email}', 
						fone_usuario='{$fone}', 
						rgm_usuario='{$rgm}', 
						data_nasc_usuario='{$data_nasc}', 
						genero_usuario='{$genero}', 
						end_usuario='{$end}'
					WHERE
						id_usuario=".$_POST["id_usuario"]; 

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=usuario-listar';</script>";
			}else{
				print "<script>alert('Não foi possível editar');</script>";
				print "<script>location.href='?page=usuario-listar';</script>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM aluno
					WHERE id_aluno=".$_REQUEST["id_aluno"]; 

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=aluno-listar';</script>";
			}else{
				print "<script>alert('Não foi possível excluir');</script>";
				print "<script>location.href='?page=aluno-listar';</script>";
			}
			break;
	}