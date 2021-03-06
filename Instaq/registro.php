<?php require_once("logic/util.php");?>
<!DOCTYPE html>
<html lang=pt dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Instamatch - Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body class="back-photo">
    <main>
      <section class="mainSection" name="test">
        <header>
          <h1 class="title"><i class="fas fa-camera-retro"></i>Insta<span class="clone">Match</span></h1>
          <h2 class="erro"><?=fromSession("messages")?></h2>
          <h3>Cadastre-se para ver fotos e vídeos dos seus amigos</h3>
        </header>
        <div>
          <form method="POST" action="logic/cadastro.php">
            <div>
              <input type="text" name="email" required="true" placeholder="Número de celular ou e-mail">
            </div>
            <div>
              <input type="text" name="nome" required="true" placeholder="Nome completo"><br>
            </div>
            <div>
              <input type="text" name="usuario" required="true" placeholder="Nome de usuário">
            </div>
            <div>
              <input type="password" name="senha" required="true" placeholder="Senha">
            </div>
            <div>
              <input type="checkbox" name="concordo">
              <label for="concordo" id="termosText">Concordo com os termos,
                Políticas de Dados e Políticas de Cookies</label>
            </div>
            <div>

              <button type="submit" class="buttons_large" name="button">Cadastre-se</button>
            </div>
          </form>
        </div>
        </section>
        <footer class="mainSection">
          <h3>Já tem uma conta?</h3>
          <a class="buttons_large buttons_large-2" href="login.php">Conecte-se</a>
        </footer>
    </main>
  </body>
</html>
