<?php defined('SYSPATH') or die('No direct script access.'); 

class Controller_Widget_Date extends Controller_Widget {
    
    public $template = 'widgets/date';
    
    public function action_show ($format = 'year-day-hour-min')
    {
        $fields = explode('-',strval($format));
        
        $d = getdate();
        $date = "";
        foreach ($fields as $field)
        {
            switch ($field)
            {
                case "min":
                    $date .= 'Minutes: '.$d['minutes'].'<br />';
                break;
                
                case "hour":
                    $date .= 'Hours: '.$d['hours'].'<br />';
                break;
                
                case "day":
                    $date .= 'Day: '.$d['month'].' '.$d['mday'].'<br />';
                break;
                
                case "year":
                    $date .= 'Year: '.$d['year'].'<br />';
                break;   
            }    
        }
        
        
        $this->template->page = Request::instance()->action;
        $this->template->date = $date;    
    }
} 
  
?>
