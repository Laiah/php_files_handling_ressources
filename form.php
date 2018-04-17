<?php
/**
 * Created by PhpStorm.
 * User: laiah
 * Date: 16/04/18
 * Time: 13:59
 */
include('inc/head.php');
$openedFile = $_GET['f'];
if (isset($_POST['content'])) {
    $file = fopen($openedFile, "w");
    fwrite($file, $_POST['content']);
    fclose($file);
}
if (isset($_POST['delete'])) {
    unlink($openedFile);
    header('Location: index.php');
}

$infoFile = pathinfo($openedFile);
if ($infoFile['extension'] == 'txt' || $infoFile['extension'] == 'html') {
    ?>
<form method="post">
    <label for="content">Editing <?= $openedFile ?></label>
    <textarea name="content" id="content"><?= file_get_contents($openedFile) ?></textarea>
    <input type="hidden" name="file" value="<?= $openedFile ?>">
    <input type="submit" value="Edit" name="send">
    <input type="submit" value="Delete" name="delete">
</form>
<?php
    } else {
    ?>
    <img src="<?= $openedFile ?>">
    <form method="post">
        <input type="submit" name="delete" value="Supprimer">
    </form>
<?php
}
?>

<hr>
<a href="/">< Home</a>

<?php include('inc/foot.php'); ?>