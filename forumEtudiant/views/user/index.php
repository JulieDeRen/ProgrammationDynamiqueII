<table class='listing'>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Nom d'utilisateur</th>
      <th>Naissance</th>
      <th>Editer</th>
      <th>Effacer</th>
    </tr>
  <thead>
  <tbody>
  <?php foreach($data as $row) { ?>
    <tr>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['userName'] ?></td>
      <td><?php echo date_format(date_create($row['birthday']),"Y/m/d") ?></td>
      <td><a href="?module=user&action=view&id=<?php echo $row['idUser']; ?>">Editer</a></td><!--&id = $id si on fait &idUser = $idUser-->
      <td><form action="?module=user&action=delete" method="post"><input type="hidden" name="idUser" value="<?php echo $row['idUser'] ?>"><input type="submit" Value="Effacer"></form></td>
    </tr>
  <?php } ?>
  <tbody>
</table>