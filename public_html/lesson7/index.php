<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 07.04.2019
 */
include_once "Logging.php";
$log = new Logging();
$log->lfile(getcwd().'/mylog.txt');
?>
<h2>SAVE FILE</h2>
<p>
<?php
if(!empty($_FILES))
{
    $uploaddir = getcwd().'/file/';
    $uploadfile = $uploaddir.basename($_FILES['file']['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        echo "File download.\n";
    } else {
        echo "Error!\n";
    }
}
?>
</p>
<p>Write LOG:</p>
<?php
// write message to the log file
$log->lwrite($_REQUEST);
$log->lwrite($_FILES);
// close log file
$log->lclose();

echo '<pre>';
print_r($_REQUEST);
print_r($_FILES);
echo '</pre>';
?>

