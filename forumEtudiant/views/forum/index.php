<table class='listing'>
  <thead>
    <tr>
      <th>Titre</th>
      <th>Article</th>
      <th>Date</th>
      <th>Auteur</th>
      <?php
      // Ajouter condition au tableau pour l'affichage selon si la session est ouverte
      if(isset($_SESSION['fingerPrint']) && ($_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']))){
      ?>
      <th>Editer</th>
      <th>Effacer</th>
      <?php } ?>
    </tr>
  <thead>
  <tbody>
  <?php 
    echo "<script> let effacer; let editer; </script>";
    foreach($data as $row) { ?>
    <tr>
      
      <td><?php echo $row['titleForum'] ?></td>
      <td><?php echo $row['articleForum'] ?></td>
      <td><?php echo date_format(date_create($row['dateForum']),"Y/m/d") ?></td>
      <td><?php echo $row['name'] ?></td><!--??? $row['name']variable $row ???-->
      <?php
      // Ajouter condition au tableau pour l'affichage selon si la session est ouverte
      if(isset($_SESSION['fingerPrint']) && ($_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']))){
      ?>
        <td class="editer">
          <?php
          // Ajouter condition au tableau pour l'affichage selon si le login est bien l'auteur de l'article
          if(($_SESSION['name']==$row['name'])){ 
            ?>
            <a href="?module=forum&action=view&id=<?php echo $row['idForum'] ?>">Editer</a>
            <?php
          }
          else{
            echo "<a href=\"\">Editer</a>";
            // Envoyer un message d'alerte pour condition non remplie
            echo "<script>
                    editer = document.querySelectorAll(\".editer a\");
                    for(let i= 0; i<editer.length; i++){
                      editer[i].addEventListener(\"click\", function(Alerte){
                        alert(\"Vous pouvez modifier seulement les articles dont vous êtes l'auteur.\");
                      })
                    }
                  </script>";
          }
      ?>
        </td>
        <td class="effacer">
          <form action="?module=forum&action=delete" method="post" class="table">

            <?php
              // Ajouter condition au tableau pour l'affichage selon si le login est bien l'auteur de l'article
              if(($_SESSION['name']==$row['name'])){
                echo "<input type=\"hidden\" name=\"idForum\" value=" . $row['idForum'] . ">";
              }
            ?>
            <input type="submit" Value="Effacer" class="bouton-table">
            <?php
              if(($_SESSION['name']!=$row['name'])){
                // Envoyer un message d'alerte pour condition non remplie
                echo "<script>
                  effacer = document.querySelectorAll(\"input[type=\'submit\']\");
                  for(let i= 0; i<effacer.length; i++){
                    effacer[i].addEventListener(\"click\", function(){
                      alert(\"Vous pouvez effacer seulement les articles dont vous êtes l'auteur.\");
                    })
                  }
                  </script>";
              }
              ?>
          </form>
        </td>
      <?php
      }
      ?>
    </tr>
  <?php } ?>
  <tbody>
</table>