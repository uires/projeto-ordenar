
<!DOCTYPE html>
<html>
<head>
	<title>Projeto Ordenar</title>
</head>
	<body>
	<?php
		try{
			$pdo = new PDO("mysql:dbname=projeto_ordenar;host=127.0.0.1", "root", "");
		}catch(PDOException $e){
			echo "error pdo ->" . $e->getMessage();
			exit;
		}?>
		<form method="POST">
			<select name="ordenar" onchange="this.form.submit()" >
				<option></option>
				<option value="orderByNome" <?php echo($ordenar == "orderByNome")?'selected="selected"':''; ?> >order by nome</option>
				<option value="orderByIdade" <?php echo($ordenar == "orderByIdade")?'selected="selected"':''; ?> >order by idade</option>
			</select>
		</form>
		<table border="0" width="400" style="margin: auto;">
			<tr>
				<th>Nome:</th>
				<th>Idade:</th>
			</tr>
			<?php
			/*
				Por padrão o query é apenas uma seleção do bando de dados
				mas caso haja um escolha do option, há verificação do qual
				ordenação foi  escolhida.		
			*/
			$sql = "SELECT * FROM usuarios";
			if(isset($_POST['ordenar']) AND empty($_POST['ordenar']) == false){
				if($_POST['ordenar'] == "orderByNome"){
					$ordenar = addslashes($_POST['ordenar']);
					$sql = "SELECT * FROM usuarios ORDER BY nome ASC";
				}
				if($_POST['ordenar'] == "orderByIdade"){
					$ordenar = addslashes($_POST['ordenar']);
					$sql = "SELECT * FROM usuarios ORDER BY idade ASC";
				}
			}			
			$sql= $pdo->query($sql);
			if($sql == false){
				echo "Error na execução da query! ". $sql . "<br>";
			}else{
				if($sql->rowCount() > 0){
					foreach ($sql->fetchAll() as $usuario){?>
						<tr>
							<td><?php echo $usuario['nome'] ?></td>
							<td><?php echo $usuario['idade'] ?></td>
						</tr>
					<?php
					}
				}
			}?>
		</table>
	</body>
</html>