<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 07.04.2019
 */
?>
<div class="col-md-12">
    <h2>Excel file</h2>
    <button id="excel-file">Retrieve excel file</button>
</div>
<script>
    $('#excel-file').click(function () {
        console.log('Excel File:');

        $.getJSON( "http://groot.t.min.org.ua:8009/api/start_clustering", {"project":200} )
            .done(function( json ) {
                console.log(json);
            })
            .fail(function( jqxhr, textStatus, error ) {
                var err = textStatus + ", " + error;
                console.log( "Request Failed: " + err );
            });



    });
</script>
