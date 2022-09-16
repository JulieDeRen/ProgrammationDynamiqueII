<form action="index.php?module=forum&action=edit" method="post">
    <input type="hidden" name="idForum" value="<?php echo $data['forum']['idForum']; ?>">
        <label>
            Titre
            <input type="text" name="titleForum" value="<?php echo $data['forum']['titleForum']; ?>">
        </label>
        <label>
            Article
            <textarea id="articleForum" type = "text" name="articleForum" rows="10" cols="50"><?php echo $data['forum']['articleForum']; ?></textarea>
        </label>
        <label>
            Date
            <input type="date" name="dateForum" value="<?php echo date_format(date_create($data['forum']['dateForum']),"Y-m-d"); ?>">
        </label>
    <input type="submit">
</form>
