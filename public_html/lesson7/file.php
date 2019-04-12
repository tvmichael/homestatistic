<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 11.04.2019
 */
include_once "Logging.php";
$log = new Logging();
$log->lfile(getcwd().'/mylog.txt');
?>
<div class="col-md-12">
    <h2>Excel file</h2>
    <form action="https://legko.000webhostapp.com/lesson7/" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" name="exampleInputFile" id="exampleInputFile">
            <input type="hidden" name="file_test" id="file_test">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
<hr>
<p>Start:</p>
<?php










?>
<p>END.</p>
