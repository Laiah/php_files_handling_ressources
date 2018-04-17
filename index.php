<?php
include('inc/head.php');
$ukDir = 'files/uk/';
$roswellDir = 'files/roswell/';
if (isset($_GET['del'])) {
    $dir = $_GET['del'];
    function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir"){
                        rmdir($dir."/".$object);
                    } else {
                        unlink($dir."/".$object);
                    }
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }
    rrmdir($dir);
}
?>

<section>
    <h1>Your files : </h1>
    <hr>


    <?php if (isset($_GET['dir'])) {
        $scanDir = scandir($_GET['dir']);
        foreach ($scanDir as $file) {
            $infoFile = pathinfo($file);
            if (!isset($infoFile['extension'])) {
                echo '<div class="directory"><a href="?dir=' . $_GET['dir'].$file . '/"><img src="assets/images/ferme-dossier-vert-icone-6243-128.png">' . $file . '</a>';
                echo '<a href="?del=' . $_GET['dir'].$file . '"><img src="assets/images/delete.png"></a></div>';

            } elseif (strlen($infoFile['extension']) > 1) {
                echo '<a href="form.php?f=' . $_GET['dir'].$file . '" class="directory"><img src="assets/images/document-icone-6178-128.png">' . $file . '</a>';
            }
        }
        ?>
        <hr>
        <a href="/">< Home</a>
    <?php
    } else {
        echo '<a href="?dir='.$ukDir.'" class="directory"><img src="assets/images/ferme-dossier-vert-icone-6243-128.png">UK</a>';
        echo '<a href="?dir='.$roswellDir.'" class="directory"><img src="assets/images/ferme-dossier-vert-icone-6243-128.png">Roswell</a>';
    }
?>
</section>


<?php include('inc/foot.php'); ?>