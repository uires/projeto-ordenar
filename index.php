
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
		<form >
			<select name="ordenar"method="GET" onchange="this.form.submit()" >
				<option></option>
				<option value="orderByNome">order by nome</option>
				<option value="orderByIdade">order by idade</option>
			</select>
		</form>
		<?php
		if(isset($_GET['ordenar']) AND !empty($_GET['ordenar']) == false){
			$ordem = addslashes($_GET['ordenar']);
			if($ordem == "orderByNome") {
				$sql = "SELECT * FROM usuarios ORDER BY nome ASC";
			}
			if($ordem == "orderByIdade"){
				$sql = "SELECT * FROM usuarios ORDER BY idade ASC";
			}else{

			}
		}else{
			$sql = "SELECT * FROM usuarios";
		}
		?>
		<table border="0" width="400" style="margin: auto;">
			
			<tr>
				<th>Nome:</th>
				<th>Idade:</th>
			</tr>

			<?php
			
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