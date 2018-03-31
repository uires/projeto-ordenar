
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
		<table border="0" width="400" style="margin: auto;">
			
			<tr>
				<th>Nome:</th>
				<th>Idade:</th>
			</tr>

			<?php
			$sql = "SELECT * FROM usuarios";
			$sql=$pdo->query($sql);

			if($sql->rowCount() > 0){
				foreach ($sql->fetchAll() as $usuario):?>
					<tr>
						<td><?php echo $usuario['nome'] ?></td>
						<td><?php echo $usuario['idade'] ?></td>
					</tr>
				<?php
				endforeach;
			}?>

		</table>
	</body>
</html>