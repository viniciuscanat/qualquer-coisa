<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Alunos do marta</title>
</head>
<body>
    

<form action="index.php" method="post">
<h2>Formulario alunos do marta</h2>


  <label for="nome">Nome:</label>
  <input type="text"  name="n"><br><br>
  <label for="sobre">Sobrenome:</label>
  <input type="text"  name="s"><br><br>
   <label for="Turma">Turma:</label>
  <input type="text"  name="T"><br><br>
  <label for="idade">idade:</label>
  <input type="number"  name="i"><br><br>
  <input type="submit" value="Submit">
</form>

<?php

$nome =$_POST["n"];
$Sobrenome =$_POST["s"];
$Turma =$_POST["T"];
$idade =$_POST["i"];




$servername = "localhost";
$username = "id19705001_felipe";
$password = "Id@19705001usmario";
$db = "id19705001_alunos";



$conn = new mysqli($servername,$username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Conectado com sucesso";

$sql = "INSERT INTO Estudantes (Nome,Sobrenome,Turma,idade)
VALUES ('$nome', '$Sobrenome', '$Turma','$idade')";

if ($conn->query($sql) === TRUE) {
  echo "Registro criado com exito";
} else {
  echo "Erro: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT nome, sobrenome, turma FROM alunos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "nome: " . $row["nome"]. " - sobrenome: " . $row["sobrenome"]. " turma" . $row["turma"]. "<br>";
  }
} else {
  echo "0 resultados tabela vazia";
}

$conn->close();

?>
<script src="script.js"></script>
</body>
</html>