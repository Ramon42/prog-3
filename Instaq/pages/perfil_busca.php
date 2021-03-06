<?php

  $id = fromGet("id_busca");
  $sql = "SELECT p.bio, p.img_perfil, u.usuario FROM perfil p, usuarios u WHERE p.id = ".$id." AND u.id = ".$id."";
  foreach(getConnection()->query($sql) as $row){
    $bio = $row['bio'];
    $img_perfil = $row['img_perfil'];
    $usuario = $row['usuario'];
  }
?>
<section>
  <div class="main_perfil">
    <a href="../nav.php?page=new_follow" class="top_bar_back_button" name="back_button"><i class="fas fa-arrow-left"></i></a>
    <h4><?php echo($usuario); ?></h4>
    <div class="foto_perfil">
      <img src="<?php echo($img_perfil); ?>" alt="img_perfil">
    </div>
    <div class="descricao_perfil">
      <p><?php echo($bio); ?></p>
    </div>
    <div class="">
      <?php
      $sql = "SELECT * FROM seguidores WHERE id_user = '".$user['id']."' AND id_user_segue = '".$id."'";
      $stmt = getConnection()->query($sql);
      $aux = $stmt->fetchColumn();
      if($aux != 0){
        echo ("<form method='POST' action='../logic/unfollow.php'>");
          echo ("<button type='submit' class='buttons_large buttons_profile' name='id_unf' value='".$id."'>Deixar de Seguir</button>");
        echo ("</form>");
      }
      else if($aux == 0){
        echo ("<form method='POST' action='../logic/seguir_user.php'>");
          echo ("<button type='submit' class='buttons_large buttons_profile' name='id_seguir' value='".$id."'>Seguir</button>");
        echo ("</form>");
      }
      ?>
    </div>
    <div class="seguidores">
      <!--<a href="nav.php?page=new_follow" class="button">Ver Usuários</a>-->
    </div>
  </div>
  <div class="suas_fotos">
    <?php
      $sql = "SELECT img_path, img_desc, img_local, id_img FROM imagens WHERE id_user = ".$id." ORDER BY dt_post DESC";
      $column_count = 0;
      $num_curtidas = 0;
      $html_string = "<table class=''>";
      $html_string .="<tr>";
      foreach(getConnection()->query($sql) as $row){
        try {
          $html_string .= "<td align='center'>";
          $html_string .= "<div class=''>";
          $html_string .=   "<div class='col-5'>";
          $html_string .=     "<img src= '".$row['img_path']."' atl='".$row['img_desc']."'>";
          $sql = "SELECT * FROM curtidas WHERE id_user = '".$user['id']."' AND id_img = '".$row['id_img']."'";
          $stmt = getConnection()->query($sql);
          $aux = $stmt->fetchColumn();
          $sqlC = "SELECT * FROM curtidas WHERE id_img = '".$row['id_img']."'";
          $curtidas = getConnection()->query($sqlC);
          $curtidas->execute();
          $num_curtidas = $curtidas->rowCount();
          if($aux != 0){
            $html_string .=   "<form method= 'post' class='' enctype='multipart/form-data' action='../logic/descurtir.php?pg=perfil_busca&id_busca=".$id."'>";
            $html_string .=     "<input type='hidden' name='id_img' value='".$row['id_img']."'>";
            $html_string .=     $num_curtidas."<button type='submit' class='like_button' name='descurtir'><i class='fas fa-heart'></i></button>";
            $html_string .=   "</form>";
          }
          else if($aux == 0){
            $html_string .=   "<form method= 'post' class='' enctype='multipart/form-data' action='../logic/curtir.php?pg=perfil_busca&id_busca=".$id."'>";
            $html_string .=     "<input type='hidden' name='id_img' value='".$row['id_img']."'>";
            $html_string .=     $num_curtidas."<button type='submit' class='like_button' name='curtir'><i class='far fa-heart'></i></button>";
            $html_string .=   "</form>";
          }
          $num_curtidas = 0;
          $html_string .=     "Postado em: ".$row['img_local']."<br>";
          $html_string .=     $row['img_desc'];
          $html_string .=   "</div>";
          $html_string .= "</td>";
          $column_count += 1;
          if($column_count == 3){
            $html_string .= "</tr>";
            $html_string .= "<tr>";
            $column_count = 0;
          }

        } catch (PDOException $e) {
          echo "Erro: ". $e->getMessage();
          die;
        }
      }
      $html_string .= "</tr>";
      $html_string .= "</table>";
      echo $html_string;
    ?>
  </div>
</section>
