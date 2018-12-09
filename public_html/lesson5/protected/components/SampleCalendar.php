<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 09.12.2018
 * Time: 18:48
 */

namespace app\components;
use yii\base\Component;
use DateTime;
use DateTimeZone;

class SampleCalendar extends Component
{
    /**
     * https://www.startutorial.com/articles/view/how-to-build-a-web-calendar-in-php
     *
     * Constructor
     */
    public function __construct(){
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
    /********************* PROPERTY ********************/
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");

    private $currentYear=0;

    private $currentMonth=0;

    private $currentDay=0;

    private $currentDate=null;

    private $daysInMonth=0;

    private $naviHref= null;

    /********************* PUBLIC **********************/

    /**
     * print out the calendar
     */
    public function show() {
        $year  = null;

        $month = null;

        if(null==$year&&isset($_GET['year'])){

            $year = $_GET['year'];

        }else if(null==$year){

            $year = date("Y",time());

        }

        if(null==$month&&isset($_GET['month'])){

            $month = $_GET['month'];

        }else if(null==$month){

            $month = date("m",time());

        }

        $this->currentYear=$year;

        $this->currentMonth=$month;

        $this->daysInMonth=$this->_daysInMonth($month,$year);

        $content='<div id="calendar">'.
            '<div class="box">'.
            $this->_createNavi().
            '</div>'.
            '<div class="box-content">'.
            '<ul class="label">'.$this->_createLabels().'</ul>';
        $content.='<div class="clear"></div>';
        $content.='<ul class="dates">';

        $weeksInMonth = $this->_weeksInMonth($month,$year);
        // Create weeks in a month
        for( $i=0; $i<$weeksInMonth; $i++ ){

            //Create days in a week
            for($j=1;$j<=7;$j++){
                $content.=$this->_showDay($i*7+$j);
            }
        }

        $content.='</ul>';

        $content.='<div class="clear"></div>';

        $content.='</div>';

        $content.='</div>';
        return $content;
    }
    /********************* PRIVATE **********************/
    /**
     * create the li element for ul
     */
    private function _showDay($cellNumber){

        if($this->currentDay==0){

            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));

            if(intval($cellNumber) == intval($firstDayOfTheWeek)){

                $this->currentDay=1;

            }
        }

        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){

            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));

            $cellContent = $this->currentDay;

            $this->currentDay++;

        }else{

            $this->currentDate =null;

            $cellContent=null;
        }


        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
            ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
    }
    /**
     * create navigation
     */
    private function _createNavi(){

        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;

        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;

        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;

        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;

        return
            '<div class="header">'.
            '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a>'.
            '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
            '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
            '</div>';
    }
    /**
     * create calendar week labels
     */
    private function _createLabels(){

        $content='';

        foreach($this->dayLabels as $index=>$label){

            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';

        }

        return $content;
    }
    /**
     * calculate number of weeks in a particular month
     */
    private function _weeksInMonth($month=null,$year=null){

        if( null==($year) ) {
            $year =  date("Y",time());
        }

        if(null==($month)) {
            $month = date("m",time());
        }

        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);

        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);

        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));

        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));

        if($monthEndingDay<$monthStartDay){

            $numOfweeks++;

        }

        return $numOfweeks;
    }
    /**
     * calculate number of days in a particular month
     */
    private function _daysInMonth($month=null,$year=null){

        if(null==($year))
            $year =  date("Y",time());

        if(null==($month))
            $month = date("m",time());

        return date('t',strtotime($year.'-'.$month.'-01'));
    }





    /* ============================================================================================================== */

    /**
     *  sample calendar v1
     *  http://solletec.com/very-simple-php-calendar/
     * */
    public function makeCalendarV1($m = 1, $y = 2000, $timezone = 'Europe/Kiev')
    {
        $date = new DateTime('now', new DateTimeZone($timezone));
        $today = array('d' => $date->format('d'), 'm' => $date->format('m'), 'y' => $date->format('Y'));
        $date->setDate($y, $m, 1);

        $calendar = "<style>
                      .calendar {width:220px;background:#fdfdfd;font:14px arial; color:#644; border:1px solid #dcdcdc; border-collapse:collapse;}
                      .month-heading {text-align:center; height:28px; line-height:28px; background:#b53934; color: #fff;}
                      .big {font-size:120%;}
                      .week-heading {font-size:11px; height:20px; line-height:20px; background:#e6e7ec; text-align:center;}
                      td {width:14.2857%;text-align:right;padding:4px!important; border:1px solid #dcdcdc;}
                      .other-month {color: #dcdcdc;}
                      .weekend-day {background:#bcfaa3;}
                      .today {background:#a6daf0;}
                    </style>";
        $calendar .= '
                <table class="calendar">
                    <tr class="month-heading">
                        <th>
                            <a class="prev" href="?m='.$date->modify('-1 month')->format('n').'&amp;y='.$date->format('Y').'">
                                &#9664;
                            </a>
                        </th>
                        <th colspan="5" class="big">'.$date->modify('+1 month')->format('F Y').'</th>
                        <th>
                            <a class="next" href="?m='.$date->modify('+1 month')->format('n').'&amp;y='.$date->format('Y').'">
                                &#9654;
                            </a>
                        </th>
                    </tr>
                    <tr class="week-heading">
                        <th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th>Сб</th><th>Нд</th>
                    </tr>
                    <tr>';

        $month = array(
            'this_month_start_dow' => $date->modify('-1 month')->format('w')-1, // -1 start monday, 0 - start sunday
            'this_month_days' => $date->format('t'),
            'prev_month_days' => $date->modify('-1 month')->format('t')+1
        );

        $days_arr = array();
        $day_ctr = 0; // week begin  -1 monday, 0 sunday

        // previous month
        if ($month['this_month_start_dow'] > 0) {
            for ($i = $month['this_month_start_dow'] - 1; $i >= 0; $i--) {
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
        // create the grid
        foreach ($days_arr as $k => $day) {
            $calendar .= (($k) % 7 == 0 ? '</tr><tr>' : '') . $day;
        }

        $calendar .= '</tr></table>';
        return $calendar;
    }

    /**
     * Show calendar
     * return string
     * */
    public function makeCalendarV2(){
        return "Hello..Welcome to MyComponent";
    }
}