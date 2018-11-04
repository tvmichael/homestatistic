<style>
    /*
    .ingredients{
        position: relative;
        width: 100%;
    }
    .ingredient-block{
        position: relative;
        margin: 5px;
        padding-bottom: 5px;
        overflow: hidden;
    }
    .ingredient-block:after{
        content: '';
        position: absolute;
        width: 100%;
        bottom: 5px;
        border-bottom: 1px dotted saddlebrown;
    }
    .ingredient-name{
        position: relative;
        display: inline-block;
        padding-right: 10px;
        z-index: 2;

    }
    .ingredient-count{
        position: absolute;
        background-color: white;
        display: block;
        right: 0px;
        top: 0px;
        padding-bottom: 5px;
        padding-left: 10px;
        z-index: 2;
    }
    .ingredient-weight{

    }
    */
    .ingredients{
        position: relative;
        width: 100%;
    }
    .ingredient-block{
        display: table;
        width: 100%;
    }
    .ingredient-name{
        display: table-cell;
        white-space: nowrap;
        width: 1px;
        padding-right: 10px;
    }
    .ingredient-dotted{
        display: inline-table;
        border-bottom: 1px dotted;
        width: 100%;
    }
    .ingredient-count{
        display: table-cell;
        white-space: nowrap;
        width: 1px;
        padding-left: 10px;
    }

</style>
<h2>Regular expressions.</h2>
<?php
$text = "<p class='sa'>text1: text 1; paragraf: text paragaf 1 not 201.</p>
    <p>ingredients:</p>
    <span class='ingredients' data='test'>
    text pro 1: text 1;
    text2: text 2;
    text back: text x (33,4);
    text4: 4 text xyz 4;
    text-left: text x 5;
    text6: 6 text;
    </span>
    <p class='sa'>paragraf text1: text 1;</p>
    <span class='sa'>text1: text 1; text2: text pro 2;</span>
    
    <div class='sx34'>text1: text (1);</div>
    <span class='sa'>
    
    text1: text 11-11;
    
    text1: text 2.22;
    
    text1 - text xerox 3;
    
    </span>
    <p class='sa'>
    text1: text 1y. text1: text 2.</p>";
echo $text.'<br><hr><br>';


//$newText = preg_replace('/<span class.*ingredients[^>]*>([\s\S]*?)<\/span>/','~MIK~', $text);
//$newText = preg_replace('/<span class=.?ingredients.*>(.|\n)*?<\/span>/','~MIK~', $text);
//$newText = preg_replace('/\([\d.,]+\)/','~MIK~', $text);
$pattern = '/<span.*class=.?ingredients.*>((?:.|\n)*?)<\/span>/';
$newText = preg_replace_callback($pattern, function ($matches){
    //echo '<pre>';
    //print_r($matches);
    //echo '</pre>';
    if (empty($matches[1]))
        return $matches[0];

    $div = '<div class="ingredients">';
    $ingredients = explode(';',$matches[1] );
    for ($i=0;$i<count($ingredients); $i++ ) {
        $in = explode(':',$ingredients[$i]);
        if (isset($in[0]) && isset($in[1])){
            $div = $div.'<div class="ingredient-block">'
                .'<div class="ingredient-name">'.$in[0].'</div>'
                .'<div class="ingredient-dotted"></div>'
                .'<div class="ingredient-count">'.$in[1].'</div></div>';
                //.'<div class="ingredient-weight"></div>';
        }
    }
    $div = $div.'</div>';
    return $div;
},$text);

echo '<br><hr>';
echo $newText;
?>