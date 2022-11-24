<?php

// Iniciando uma sessão
session_start();
 
// Guardando dados na sessão
$_SESSION["nome"] = "RENATO";
$_SESSION["sobrenome"] = "ALVES SOARES";

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="footer-2.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>


    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (
                isset($_POST['nome']) && $_POST['nome'] != '' && $_POST['nome'] != null) {
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            }else{

                $msg = "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>";
                echo($msg);
            }

            if (
                isset($_POST['email']) &&
                $_POST['email'] != '' &&
                $_POST['email'] != null
            ) {
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            }

            if (
                isset($_POST['mensagem']) &&
                $_POST['mensagem'] != '' &&
                $_POST['mensagem'] != null
            ) {
                $mensagem = filter_input(
                    INPUT_POST,
                    'mensagem',
                    FILTER_SANITIZE_SPECIAL_CHARS
                );
            }

            try {
                $pdo = new PDO('mysql:host=localhost;dbname=mydatabase', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

                $consulta =
                    'INSERT INTO usuarios (nome, email, mensagem, dataAtual) VALUES(:nome, :email, :mensagem, NOW() )';
                $stmt = $pdo->prepare($consulta);

                $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
                $stmt->execute();
                echo '<div class="alert alert-success" role="alert">
                            Successfully Added
                    </div>';

            } catch (PDOException $e) {
                echo 'Error:' . $e->getMessage();

                echo '<div class="alert alert-danger" role="alert">Erro ao tentar salvar usuario</div>';
            }
    } 
    ?>

    <?php

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
            
        }else{

            echo 'Hi, ' . $_SESSION["nome"] . ' ' . $_SESSION["sobrenome"];
            header('location:site.php');

            
        }
            // Acessando os dados da sessão

    ?>
    <form action="" method="POST">
        <label class="form-label">Seu nome</label>
        <input type="text" name="nome" class="form-control">
        <br>
        <label class="form-label">Seu email</label>
        <input type="text" name="email" class="form-control">
        <br>
        <label class="form-label">Sua mensagem</label>
        <textarea name="mensagem" id="" cols="5" rows="3" class="form-control"></textarea>
        <br><br>
        <button type="submit" class="btn btn-primary mb-3">Enviar</button>
    </form>
    <!-- Footer Start -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="footer-blog">
                        <h3>From Blog</h3>
                        <div>
                            <a href="">Lorem ipsum dolor sit amet</a>
                            <p><i class="fa fa-time"></i>01-Jan-2045</p>
                        </div>
                        <div>
                            <a href="">Lorem ipsum dolor sit amet elit</a>
                            <p><i class="fa fa-time"></i>01-Jan-2045</p>
                        </div>
                        <div>
                            <a href="">Lorem ipsum dolor sit</a>
                            <p><i class="fa fa-time"></i>01-Jan-2045</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-insta">
                        <h3>From Instagram</h3>
                        <a href=""><img src="img/img-1.jpg" alt="Image"></a>
                        <a href=""><img src="img/img-2.jpg" alt="Image"></a>
                        <a href=""><img src="img/img-3.jpg" alt="Image"></a>
                        <a href=""><img src="img/img-4.jpg" alt="Image"></a>
                        <a href=""><img src="img/img-5.jpg" alt="Image"></a>
                        <a href=""><img src="img/img-6.jpg" alt="Image"></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-tags">
                        <h3>Tags Widget</h3>
                        <a href="">lorem</a>
                        <a href="">ipsum</a>
                        <a href="">dolor</a>
                        <a href="">sit</a>
                        <a href="">amet</a>
                        <a href="">faucibus</a>
                        <a href="">augue</a>
                        <a href="">rutrum</a>
                        <a href="">turpis</a>
                        <a href="">semper</a>
                        <a href="">lacinia</a>
                        <a href="">diam</a>
                        <a href="">velit</a>
                        <a href="">egestas</a>
                        <a href="">auctor</a>
                        <a href="">varius</a>
                        <a href="">metus</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-newsletter">
                        <h3>Newsletter</h3>
                        <div class="form">
                            <input class="form-control" placeholder="Your Name">
                            <input class="form-control" placeholder="Your Email">
                            <button class="btn">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-contact">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <h4>Call Now</h4>
                        <p>+123 456 7890</p>
                    </div>
                    <div class="col-md-4">
                        <h4>Email Us</h4>
                        <p>info@example.com</p>
                    </div>
                    <div class="col-md-4">
                        <h4>Get in Touch</h4>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href="https://www.facebook.com/renatoalves.soares.56"><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                        <a href="https://www.instagram.com/renatoguara2020/"><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="copy-text">
                            <p>&copy; <a href="#">RENATO ALVES SOARES</a>. All Rights Reserved. 2022</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="copy-menu">
                            <a href="">Terms</a>
                            <a href="">Privacy</a>
                            <a href="https">Author</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>