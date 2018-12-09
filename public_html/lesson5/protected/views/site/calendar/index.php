<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 09.12.2018
 * Time: 13:25
 */
?>

<style>
    /*******************************Calendar Top Navigation*********************************/
    div#calendar{
        margin:0px auto;
        padding:0px;
        width: 602px;
        font-family:Helvetica, "Times New Roman", Times, serif;
    }

    div#calendar div.box{
        position:relative;
        top:0px;
        left:0px;
        width:100%;
        height:40px;
        background-color:   #787878 ;
    }

    div#calendar div.header{
        line-height:40px;
        vertical-align:middle;
        position:absolute;
        left:11px;
        top:0px;
        width:582px;
        height:40px;
        text-align:center;
    }

    div#calendar div.header a.prev,div#calendar div.header a.next{
        position:absolute;
        top:0px;
        height: 17px;
        display:block;
        cursor:pointer;
        text-decoration:none;
        color:#FFF;
    }

    div#calendar div.header span.title{
        color:#FFF;
        font-size:18px;
    }


    div#calendar div.header a.prev{
        left:0px;
    }

    div#calendar div.header a.next{
        right:0px;
    }




    /*******************************Calendar Content Cells*********************************/
    div#calendar div.box-content{
        border:1px solid #787878 ;
        border-top:none;
    }



    div#calendar ul.label{
        float:left;
        margin: 0px;
        padding: 0px;
        margin-top:5px;
        margin-left: 5px;
    }

    div#calendar ul.label li{
        margin:0px;
        padding:0px;
        margin-right:5px;
        float:left;
        list-style-type:none;
        width:80px;
        height:40px;
        line-height:40px;
        vertical-align:middle;
        text-align:center;
        color:#000;
        font-size: 15px;
        background-color: transparent;
    }


    div#calendar ul.dates{
        float:left;
        margin: 0px;
        padding: 0px;
        margin-left: 5px;
        margin-bottom: 5px;
    }

    /** overall width = width+padding-right**/
    div#calendar ul.dates li{
        margin:0px;
        padding:0px;
        margin-right:5px;
        margin-top: 5px;
        line-height:80px;
        vertical-align:middle;
        float:left;
        list-style-type:none;
        width:80px;
        height:80px;
        font-size:25px;
        background-color: #DDD;
        color:#000;
        text-align:center;
    }

    :focus{
        outline:none;
    }

    div.clear{
        clear:both;
    }
</style>

<div class="col-md-12">
    <div class="calendar-container">




        <div>
            <?php
            function calendar($m, $y, $timezone = 'Europe/Kiev') { // set your default timezone here
                $date = new DateTime('now', new DateTimeZone($timezone));
                $today = array('d' => $date->format('d'), 'm' => $date->format('m'), 'y' => $date->format('Y'));
                $date->setDate($y, $m, 1);
                $calendar = '
                    <table class="calendar"><tr class="month-heading"><th><a class="prev" href="?m='.$date->modify('-1 month')->format('n').'&amp;y='.$date->format('Y').'">&#9664;</a></th><th colspan="5" class="big">' . $date->modify('+1 month')->format('F Y') . '</th><th><a class="next" href="?m='.$date->modify('+1 month')->format('n').'&amp;y='.$date->format('Y').'">&#9654;</a></th></tr>
                    <tr class="week-heading"><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th>Сб</th><th>Нд</th></tr><tr>
                    ';

                echo '<pre>';
                print_r($date);
                echo '</pre>';

                $month = array(
                        'this_month_start_dow' => $date->modify('-1 month')->format('w')-1,
                        'this_month_days' => $date->format('t'),
                        'prev_month_days' => $date->modify('-1 month')->format('t')+1
                    );
                $days_arr = array();
                $day_ctr = 0;

                echo '<pre>';
                print_r($month);
                echo '</pre>';

                // previous month
                if ($month['this_month_start_dow'] > 0) {
                    for ($i = $month['this_month_start_dow']-1; $i >= 0; $i--) {
                        $day_ctr += 1;
                        $class = ($day_ctr % 7 == 0 || $day_ctr % 7 == 6) ? 'weekend-day other-month' : 'other-month'; // Sat/Sun
                        $days_arr[] = '<td class="' . $class . '">' . ($month['prev_month_days'] - $i) . '</td>';
                    }
                }

                // current month
                for ($i = 1; $i <= $month['this_month_days']; $i++) {
                    $day_ctr += 1;
                    $class = ($day_ctr % 7 == 0 || $day_ctr % 7 == 6) ? 'weekend-day' : ''; // Sat/Sun
                    $class .= ($i == $today['d'] && $m == $today['m'] && $y == $today['y']) ? ' today' : ''; // today
                    $days_arr[] = '<td class="' . $class . '">' . $i . '</td>';
                }

                // next month
                if (count($days_arr) % 7 != 0) {
                    for ($i = 1; $i <= count($days_arr) % 7; $i++) {
                        $day_ctr += 1;
                        $class = ($day_ctr % 7 == 0 || $day_ctr % 7 == 6) ? 'weekend-day other-month' : 'other-month'; // Sat/Sun
                        $days_arr[] = '<td class="' . $class . '">' . $i . '</td>';
                    }
                }

                echo '<pre>';
                print_r($days_arr);
                echo '</pre>';

                // create the grid
                foreach ($days_arr as $k => $day) {
                    $calendar .= (($k) % 7 == 0 ? '</tr><tr>' : '') . $day;
                }

                $calendar .= '</tr></table>';
                return $calendar;
            }

            echo calendar(12, 2018); // month, year[, timezone] (enter the timezone using standard PHP timezone strings)
            ?>
        </div>
        <hr>





        <h3>Calendar - V<?=$version;?></h3>
        <div>
            <?=$calendar;?>
        </div>



        <div>
            https://github.com/donatj/SimpleCalendar/blob/master/lib/donatj/SimpleCalendar.php

            <?php
            $chosen_year = filter_input(INPUT_GET, 'chosen_year', FILTER_SANITIZE_SPECIAL_CHARS);
            $chosen_month = filter_input(INPUT_GET, 'selected_month', FILTER_SANITIZE_SPECIAL_CHARS);
            $do_update_button = filter_input(INPUT_GET, 'month_year', FILTER_SANITIZE_SPECIAL_CHARS);

            if (isset($do_update_button)) {

                $number_of_days = date("t", mktime(0, 0, 0, $chosen_month, 1, $chosen_year));

                $english_order = date("l", mktime(0, 0, 0, $chosen_month, 1, $chosen_year));

            } else {

                $number_of_days = date("t", mktime(0, 0, 0, date('n'), 1, date('Y')));

                $english_order = date("l", mktime(0, 0, 0, date('n') , 1, date('Y')));

            }
            $blank_cell = '&nbsp;';
            $array_of_days = array($blank_cell,"1","2","3","4","5","6","7","8","9","10",
                "11","12","13","14","15","16","17","18","19","20",
                "21","22","23","24","25","26","27","28","29","30",
                "31");

            // search for the first day of month

            if($english_order == "Monday") {
                $a = 1;
            }
            else if($english_order == "Tuesday") {
                array_unshift ($array_of_days, $blank_cell);
                $a = 2;
            }
            else if($english_order == "Wednesday") {
                array_unshift ($array_of_days, $blank_cell, $blank_cell);
                $a = 3;
            }
            else if($english_order == "Thursday") {
                array_unshift ($array_of_days, $blank_cell, $blank_cell, $blank_cell);
                $a = 4;
            }
            else if($english_order == "Friday") {
                array_unshift ($array_of_days, $blank_cell, $blank_cell, $blank_cell, $blank_cell);
                $a = 5;
            }
            else if($english_order == "Saturday") {
                array_unshift ($array_of_days, $blank_cell, $blank_cell, $blank_cell, $blank_cell, $blank_cell);
                $a = 6;
            }
            else if($english_order == "Sunday") {
                array_unshift ($array_of_days, $blank_cell, $blank_cell, $blank_cell, $blank_cell, $blank_cell, $blank_cell);
                $a = 7;
            }
            $lastDay = count($array_of_days);
            ?>
            <form action = "callender.php" method = "GET">
                <table border = "1">
                    <!-- choose year -->
                    <th colspan = "2">
                        <select name = "chosen_year">
                            <option value = "<?php echo date('Y'); ?>" selected = "selected"><?php echo date('Y') ?> </option>

                            <?php

                            $chosen_year = filter_input(INPUT_GET, 'chosen_year', FILTER_SANITIZE_SPECIAL_CHARS);

                            function getYear() {
                                $years = "";
                                for ($year = 2030; $year >= 2000; $year--) {
                                    $years .= $year . " ";
                                }
                                return $years;
                            }
                            $years = explode (" ", getYear());
                            foreach ($years as $number => $chose_year) {
                                ?>
                                <option value="<?php echo $chose_year; ?>"<?php if(isset($chosen_year) and ($chosen_year) == $chose_year) { ?> selected = "selected"<?php } else if(date('Y') == $number)  { ?> selected ='selected'<?php } ?>> <?php echo $chose_year; ?></option>

                                <?php
                            }
                            ?>
                        </select>
                    </th>

                    <!-- select month -->
                    <th colspan = "3">
                        <select name = "selected_month">
                            <?php
                            $chosen_month = filter_input(INPUT_GET, 'selected_month', FILTER_SANITIZE_SPECIAL_CHARS);

                            $months = array(1 => "January", "February", "March", "April", "May",
                                "June", "July", "August", "September", "October", "November",
                                "December");
                            foreach($months as $number2 => $chose_month) {
                                ?>
                                <option value="<?php echo $number2;?>"<?php if(isset($chosen_month) and ($chosen_month)== $number2)  { ?> selected = "selected"<?php } ?>>

                                    <?php echo $chose_month; ?></option>
                            <?php } ?>
                        </select>
                    </th>
                    <th colspan = "2">
                        <input type = "submit" value = "update" name="month_year" />
                    </th>

                    <tr><td>Mon</td> <td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td><td>Sun</td></tr>

                    <?php

                    $i = 1;

                    while ($i < $number_of_days + $a) {

                        if ((($i - 1  ) % 7 == 0)) {

                            $DayToBrake = $i;

                            echo "\n<tr>";

                        }

                        else if ($i != 1) echo "</td>\n";

                        echo "<td>";

                        if (($chosen_year == date('Y')) and ($chosen_month == date('n')) and date('j') == $array_of_days[$i]) {

                            echo '<strong style="color:red">' .$array_of_days[$i]. '</strong>';
                        } else {
                            echo  $array_of_days[$i];
                        }
                        if (($i % 7 == 0) || ($i == $lastDay)) {
                            $DayToBrake = $i;
                            echo "</td></tr>";
                        }
                        $i++;
                    }
                    echo "</td></tr>\n";
                    ?>
                    <tr>
                        <td colspan = "5">
                            <?php $m = date('n'); {echo '<strong>'." Is"." ".$months[$m]." ". date('Y').'</strong>';} ?>

                        </td>
                        <td colspan = "2">
                        </td>
                    </tr>
                </table>
            </form>
        </div>



        <div>
            https://gist.github.com/Xeoncross/9552088
            <?php
            function build_calendar($month, $year) {
                $daysOfWeek = array('S','M','T','W','T','F','S');
                $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
                $numberDays = date('t',$firstDayOfMonth);
                $dateComponents = getdate($firstDayOfMonth);
                $monthName = $dateComponents['month'];
                $dayOfWeek = $dateComponents['wday'];
                $calendar = "<table class='calendar table table-condensed table-bordered'>";
                $calendar .= "<caption>$monthName $year</caption>";
                $calendar .= "<tr>";
                foreach($daysOfWeek as $day) {
                    $calendar .= "<th class='header'>$day</th>";
                }
                $currentDay = 1;
                $calendar .= "</tr><tr>";
                if ($dayOfWeek > 0) {
                    $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
                }
                $month = str_pad($month, 2, "0", STR_PAD_LEFT);
                while($currentDay <= $numberDays){
                    if($dayOfWeek == 7){
                        $dayOfWeek = 0;
                        $calendar .= "</tr><tr>";
                    }
                    $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
                    $date = "$year-$month-$currentDayRel";
                    // Is this today?
                    if(date('Y-m-d') == $date) {
                        $calendar .= "<td class='day success' rel='$date'><b>$currentDay</b></td>";
                    } else {
                        $calendar .= "<td class='day' rel='$date'>$currentDay</td>";
                    }
                    $currentDay++;
                    $dayOfWeek++;
                }
                if($dayOfWeek != 7){
                    $remainingDays = 7 - $dayOfWeek;
                    $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";
                }
                $calendar .= "</tr>";
                $calendar .= "</table>";
                return $calendar;
            }

            $calendar = build_calendar(3, 2014);
            $calendar = '<div style="width:200px">' . $calendar . '</div>';
            $calendar .= '<style type="text/css">table tbody tr td, table tbody tr th { text-align: center; }</style>';
            ?>
            <!-- Wrap all page content here -->
            <div id="wrap">

                <!-- Fixed navbar -->
                <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Project name</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#contact">Contact</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li class="dropdown-header">Nav header</li>
                                        <li><a href="#">Separated link</a></li>
                                        <li><a href="#">One more separated link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>

                <!-- Begin page content -->
                <div class="container">

                    <div class="page-header">
                        <h1>PHP Calendar</h1>
                    </div>

                    <?php print $calendar; ?>

                </div>
            </div>

            <div id="footer">
                <div class="container">
                    <p class="text-muted">Place sticky footer content here.</p>
                </div>
            </div>


            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.0/backbone-min.js"></script>
        </div>



        <div>
            <?php
            $time = time();

            $numDay = date('d', $time);
            $numMonth = date('m', $time);
            $strMonth = date('F', $time);
            $numYear = date('Y', $time);
            $firstDay = mktime(0,0,0,$numMonth,1,$numYear);
            $daysInMonth = cal_days_in_month(0, $numMonth, $numYear);
            $dayOfWeek = date('w', $firstDay);
            ?>
            <table>
                <caption><?php echo($strMonth); ?></caption>
                <thead>
                <tr>
                    <th abbr="Sunday" scope="col" title="Sunday">S</th>
                    <th abbr="Monday" scope="col" title="Monday">M</th>
                    <th abbr="Tuesday" scope="col" title="Tuesday">T</th>
                    <th abbr="Wednesday" scope="col" title="Wednesday">W</th>
                    <th abbr="Thursday" scope="col" title="Thursday">T</th>
                    <th abbr="Friday" scope="col" title="Friday">F</th>
                    <th abbr="Saturday" scope="col" title="Saturday">S</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    if(0 != $dayOfWeek) { echo('<td colspan="'.$dayOfWeek.'"> </td>'); }
                    for($i=1;$i<=$daysInMonth;$i++) {

                        if($i == $numDay) { echo('<td id="today">'); } else { echo("<td>"); }
                        echo($i);
                        echo("</td>");
                        if(date('w', mktime(0,0,0,$numMonth, $i, $numYear)) == 6) {
                            echo("</tr><tr>");
                        }
                    }
                    ?>
                </tr>
                </tbody>
            </table>
        </div>




        <div>
            <?php
            date_default_timezone_set("Europe/Kiev");

            /* Set the date */
            $date = strtotime(date("Y-m-d"));

            $day = date('d', $date);
            $month = date('m', $date);
            $year = date('Y', $date);
            $firstDay = mktime(0,0,0,$month, 1, $year);
            $title = strftime('%B', $firstDay);
            $dayOfWeek = date('D', $firstDay);
            $daysInMonth = cal_days_in_month(0, $month, $year);
            /* Get the name of the week days */
            $timestamp = strtotime('next Sunday');
            $weekDays = array();
            for ($i = 0; $i < 7; $i++) {
                $weekDays[] = strftime('%a', $timestamp);
                $timestamp = strtotime('+1 day', $timestamp);
            }
            $blank = date('w', strtotime("{$year}-{$month}-01"));
            ?>
            <table class='table table-bordered' style="table-layout: fixed;">
                <tr>
                    <th colspan="7" class="text-center"> <?php echo $title ?> <?php echo $year ?> </th>
                </tr>
                <tr>
                    <?php foreach($weekDays as $key => $weekDay) : ?>
                        <td class="text-center"><?php echo $weekDay ?></td>
                    <?php endforeach ?>
                </tr>
                <tr>
                    <?php for($i = 0; $i < $blank; $i++): ?>
                        <td></td>
                    <?php endfor; ?>
                    <?php for($i = 1; $i <= $daysInMonth; $i++): ?>
                    <?php if($day == $i): ?>
                        <td><strong><?php echo $i ?></strong></td>
                    <?php else: ?>
                        <td><?php echo $i ?></td>
                    <?php endif; ?>
                    <?php if(($i + $blank) % 7 == 0): ?>
                </tr><tr>
                    <?php endif; ?>
                    <?php endfor; ?>
                    <?php for($i = 0; ($i + $blank + $daysInMonth) % 7 != 0; $i++): ?>
                        <td></td>
                    <?php endfor; ?>
                </tr>
            </table>
        </div>

    </div>
</div>

