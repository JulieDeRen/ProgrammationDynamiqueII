<form action="index.php?module=user&action=edit" method="post">
    <input type="hidden" name="idUser" value="<?php echo $data['user']['idUser']; ?>">
        <label>
            Nom
            <input type="text" name="name" value="<?php echo $data['user']['name']; ?>">
        </label>
        <label>
            Nom d'utilisateur
            <input type="email" name="userName" value="<?php echo $data['user']['userName']; ?>">
        </label>
        <label>
            Date de naissance
            <input type="date" name="birthday" value="<?php echo date_format(date_create($data['user']['birthday']),"Y-m-d") ?>">
        </label>

        <input type="submit">
    </form>
 