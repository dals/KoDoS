<?
class Controller_Widget_Calendar extends Controller_Widget {

    public $template = 'widgets/calendar.tpl';

    public $config_name = 'widget/cdate';

    public function action_show ($date = null) {
        //If no parameter is passed use the current date.
        if($date == null) {
            $date = getDate();
        } else {
            $date = getDate(strtotime($date));
        }
        $day = $date["mday"];
        $month = $date["mon"];
        $month_name = $date["month"];
        $year = $date["year"];

        $this_month = getDate(mktime(0, 0, 0, $month, 1, $year));
        $next_month = getDate(mktime(0, 0, 0, $month + 1, 1, $year));

        //Find out when this month starts and ends.
        $first_week_day = $this_month["wday"];
        $days_in_this_month = round(($next_month[0] - $this_month[0]) / (60 * 60 * 24));

        $calendar_html = "<table style=\"background-color:666699; color:ffffff;\">";

        $calendar_html .= "<tr><td colspan=\"7\" align=\"center\" style=\"background-color:9999cc; color:000000;\">" .
                $month_name . " " . $year . "</td></tr>";

        $calendar_html .= "<tr>";

        //Fill the first week of the month with the appropriate number of blanks.
        for($week_day = 0; $week_day < $first_week_day; $week_day++) {
            $calendar_html .= "<td style=\"background-color:9999cc; color:000000;\"> </td>";
        }

        $week_day = $first_week_day;
        for($day_counter = 1; $day_counter <= $days_in_this_month; $day_counter++) {
            $week_day %= 7;

            if($week_day == 0)
                $calendar_html .= "</tr><tr>";

            //Do something different for the current day.
            if($day == $day_counter)
                $calendar_html .= "<td align=\"center\"><b>" . $day_counter . "</b></td>";
            else
                $calendar_html .= "<td align=\"center\" style=\"background-color:9999cc; color:000000;\">&nbsp;" .
                        $day_counter . " </td>";

            $week_day++;
        }

        $calendar_html .= "</tr>";
        $calendar_html .= "</table>";

        $this->view->assign('date', $date);
        return($calendar_html);
    }
//    function calendar($date) {
//
//    }
}