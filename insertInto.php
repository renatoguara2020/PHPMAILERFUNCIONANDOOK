<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['nome']) && $_POST['nome'] != '' && $_POST['nome'] != null){

      $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        
    }

    if(isset($_POST['email']) && $_POST['email'] != '' && $_POST['email'] != null){

      $email = $_POST["email"];
        
    }

    if(isset($_POST['mensagem']) && $_POST['mensagem'] != '' && $_POST['mensagem'] != null){

     $mensagem = $_POST['mensagem'];
    }

    try {
            $pdo = new PDO('mysql:host=localhost;dbname=mydatabase', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $consulta = 'INSERT INTO usuarios (nome, email, mensagem) VALUES(:nome, :email, :mensagem)';
            $stmt = $pdo->prepare($consulta);
            
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email,PDO::PARAM_STR);
            $stmt->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $stmt->execute();



        
        }catch(PDOException $e){

        echo "Error:" . $e->getMessage();
    }
} 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <label class="form-label">Seu nome</label>
        <input type="text" name="nome" class="form-control">
        <br>
        <label class="form-label">Seu email</label>
        <input type="text" name="email" class="form-control">
        <br>
        <label class="form-label">Sua mensagem</label>
        <textarea name="mensagem" id="" cols="30" rows="10" class="form-control"></textarea>
        <br>
        <button type="submit" class="btn btn-primary mb-3">Enviar</button>
    </form>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>