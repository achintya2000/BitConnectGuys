<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/styles.css" />
    <script src="main.js"></script>
</head>
</html>

<h1> Preferences</h1>
<form action = "webpage.php" method = "POST">
    Name:<br>
    <input type="name" name="name_in"/>
    <br>
    Date:<br>
    <input type="date" name="date_in"/>
    <br>    
    Time:<br>
    <input type="time" name="time_in"/>
    <br>
    Section:<br>
    <input type="section" name="section_in"/>
    <br>
    <input type="submit" name = "submit" value="Submit"/>
    <br>
    <select name="day_catalog" >
        <option value="0">Sunday</option>
        <option value="1">Monday</option>
        <option value="2">Tuesday</option>
        <option value="3">Wednesday</option>
        <option value="4">Thursday</option>
        <option value="5">Friday</option>
        <option value="6">Saturday</option>
    </select>
    <select name="time_catalog_1" >
        <option value="12:00">12:00</option>
        <option value="12:30">12:30</option>
        <option value="01:00">1:00</option>
        <option value="01:30">1:30</option>
        <option value="02:00">2:00</option>
        <option value="02:30">2:30</option>
        <option value="03:00">3:00</option>
        <option value="03:30">3:30</option>
        <option value="04:00">4:00</option>
        <option value="04:30">4:30</option>
        <option value="05:00">5:00</option>
        <option value="05:30">5:30</option>
        <option value="06:00">6:00</option>
        <option value="06:30">6:30</option>
        <option value="07:00">7:00</option>
        <option value="07:30">7:30</option>
        <option value="08:00">8:00</option>
        <option value="08:30">8:30</option>
        <option value="09:00">9:00</option>
        <option value="09:30">9:30</option>
        <option value="10:00">10:00</option>
        <option value="10:30">10:30</option>
        <option value="11:00">11:00</option>
        <option value="11:30">11:30</option>
    </select>
    <select name="am_pm_1">
        <option value="AM">AM</option>
        <option value="PM">PM</option>
    </select>
    <select name="time_catalog_2">
        <option value="12:00">12:00</option>
        <option value="12:30">12:30</option>
        <option value="01:00">1:00</option>
        <option value="01:30">1:30</option>
        <option value="02:00">2:00</option>
        <option value="02:30">2:30</option>
        <option value="03:00">3:00</option>
        <option value="03:30">3:30</option>
        <option value="04:00">4:00</option>
        <option value="04:30">4:30</option>
        <option value="05:00">5:00</option>
        <option value="05:30">5:30</option>
        <option value="06:00">6:00</option>
        <option value="06:30">6:30</option>
        <option value="07:00">7:00</option>
        <option value="07:30">7:30</option>
        <option value="08:00">8:00</option>
        <option value="08:30">8:30</option>
        <option value="09:00">9:00</option>
        <option value="09:30">9:30</option>
        <option value="10:00">10:00</option>
        <option value="10:30">10:30</option>
        <option value="11:00">11:00</option>
        <option value="11:30">11:30</option>
    </select>
    <select name="am_pm_2">
        <option value="AM">AM</option>
        <option value="PM">PM</option>
    </select>
    <input type="Submit" name="submit-AT" value="Add time"/>
    <input type="Submit" name="submit-DT" value="Delete time"/>
    <br>
    <br>
    <input type="Submit" name="create_table" value="Create Table"/>
</form>

<?php

    class TA{
        private $name;
        private $score;
    
        public function setName($name_p){
            $this->name = $name_p;
        }
        
        public function setScore($score_p){
            $this->score = $score_p;
        }
        
        public function getScore(){
            return $this->score;
        }
    
        public function getName(){
            return $this->name;
        }
    }
        
    function sort_database($name, $date,$time,$section)
    {

        // $x = document.createElement("INPUT");
        // $x.setAttribute("type", "date");
        // $x.setAttribute("value", "2001-01-01");
        // $y = $x;
        // $y.setAttribute("value", "2002-02-02");
        // $z = $y;
        // $z.setAttribute("value", "2003-03-03");

        // $a = document.createElement("INPUT");
        // $a.setAttribute("type", "time");
        // $a.setAttribute("value", "01:01:01");
        // $b = $a;
        // $b.setAttribute("value", "02:02:02");
        // $c = $b;
        // $c.setAttribute("value", "03:03:03");
        
        $ranks = array();
        $names = array('thomas', 'ben', 'harry');
        $dates = array("","","");
        $times = array("","","");
        $sections = array('4','5','6'); 

        for($x=0;$x < count($names);$x++){
            $score = 0;
            if($names[$x]==$name){
                $score+=1.5;
            }
            if($dates[$x]==$date && $times[$x]==$time){
                $score += 1.4;
            }
            if($sections[$x]==$section){
                $score+=1.1;
            }
            $TA_obj = new TA();
            $TA_obj->setName($names[$x]);
            $TA_obj->setScore($score);
            array_push($ranks, $TA_obj);
        }
    
        /*function swap($arr, $a, $b) {
            $tmp = $arr[$a];
            $arr[$a] = $arr[$b];
            $arr[$b] = $tmp;
        }*/
        
        for($j=0;$j < count($ranks); $j++){
            for($k = 0; $k < count($ranks)-$j-1; $k++){
                if($ranks[$k]->getScore()<$ranks[$k+1]->getScore()){
                    $temp = $ranks[$k+1];
                    $ranks[$k+1]=$ranks[$k];
                    $ranks[$k] = $temp;
                }
            }
        }
        
        return $ranks;
    }
    function print_ranking($ranking)
    {
        $names_return = array();
        $scores_return = array();
        
        for($h=0;$h < count($ranking); $h++){
            array_push($names_return,$ranking[$h]->getName());
            array_push($scores_return,$ranking[$h]->getScore());
        }

        for($h=0;$h < count($ranking); $h++){
            $txt = sprintf("TA: %s  Score: %.1f",$names_return[$h],$scores_return[$h]);
            echo $txt;
            echo '<br>';
        }
    }
    function add_time($day, $startingTime, $amOrPm1, $endingTime,  $amOrPm2, $string_of_times)
    {
        $array = string_to_array($string_of_times);
        if($amOrPm1 == "PM" && $amOrPm2 == "AM")
        {
            trigger_error("book times across days", E_USER_ERROR);
        }
        for($h=time_to_index($startingTime, $amOrPm1);$h < time_to_index($endingTime, $amOrPm2); $h++)
        {
            ($array[$day])[$h] = 1;
        }
        return array_to_string($array);
    }
    function delete_time($day, $startingTime, $amOrPM1, $endingTime,  $amOrPM2,$string_of_times)
    {
        $array = string_to_array($string_of_times);
        for($h=time_to_index($startingTime, $amOrPM1);$h < time_to_index($endingTime, $amOrPM2); $h++)
        {
            if(($array[$day])[$h] == 0)
            {
                trigger_error("This time slot does not exist to be deleted.", E_USER_ERROR);
            }
        }
        for($h=time_to_index($startingTime, $amOrPM1);$h < time_to_index($endingTime, $amOrPM2); $h++)
        {
            ($array[$day])[$h] = 0;
        }
        return array_to_string($array);
    }
    function time_to_index($time, $amOrPm)
    {

        $hour = intval(substr($time, 0,strlen($time)-3));
        if($amOrPm == "PM")
        {
            $hour +=12;
        }
        $minute = substr($time, strlen($time)-2,strlen($time)-2);
        if($minute =="30")
        {
            $hour +=.5;
        }
        if($hour == 12 && $amOrPm == "AM")
        {
            $hour = 0;
        }
        return (int)(2*$hour);
    }
    function index_to_time($index)
    {
    
        $hour = $index/2;
        $amOrPm ="AM";
        if($hour>12)
        {
            $hour -=12;
            $amOrPm = "PM";
        }
        $minute = "00";
        if($index % 2 !=0)
        {
            $hour-=0.5;
            $minute = "30";
        }
        if($index <=1)
        {
            $hour = 12;
        }
        $txt = sprintf("%.0f:%s %s",round($hour), $minute, $amOrPm);
        return $txt;
    }
    function find_ta_schedule($str)
    {
        for($h=0;$h < strlen($str); $h++){
            if($h==0 && $str[$h]=="1")
            {
                echo "12:00 AM";
            }
            if($h>0 && $str[$h-1]=="0" && $str[$h]!="0")
            {
                echo index_to_time($h);
            }
            if($h!=47 && $str[$h]=="1" && $str[$h+1]!="1" )
            {
                echo sprintf("-%s",index_to_time($h+1));
                echo "<br>";
            }
            if($h==47 && $str[$h-1]=="1" && $str[$h]=="1")
            {
                echo "-12:00 PM";
                echo "<br>";
            }
           
        }
    }
    function string_to_array($string)
    {
        $array = array("0","0","0","0","0","0","0");
        for($h=0;$h < 7; $h++)
        {
            $array[$h]=substr($string, $h*49,48);            
        }
        return $array;
    }
    function array_to_string($array)
    {
        $str = "";
        for($h=0;$h < 7; $h++)
        {
            $str .= $array[$h];
            if($h != 6)
            {
                $str .= ",";
            }          
        }
        return $str;
    }
    function create_table($string)
    {
        $array = string_to_array($string);
        for($h=0;$h < 7; $h++)
        {
            switch($h){
                case 0: 
                echo "Sunday: <br>";
                break;
                case 1: 
                echo "<br>Monday: <br>";
                break;
                case 2: 
                echo "<br>Tuesday: <br>";
                break;
                case 3: 
                echo "<br>Wednesday: <br>";
                break;
                case 4: 
                echo "<br>Thursday: <br>";
                break;
                case 5: 
                echo "<br>Friday: <br>";
                break;
                case 6: 
                echo "<br>Saturday: <br>";
                break;
               }
            find_ta_schedule($array[$h]);         
        }
    }

    $array1 = "001100000000000000000000000000000000000000000000,000000000000011110000000000000000000000000000000,010000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000,000000000000000000000000000000000000000000000000";
    
    if(isset($_POST['name_in'])|| isset($_POST['date_in'])|| isset($_POST['time_in'])|| isset($_POST['section_in']) && isset($_POST['submit']))
    {
        $name1 = $_POST['name_in'];
        $date1 = $_POST['date_in'];
        $time1 = $_POST['time_in'];
        $section1 = $_POST['section_in'];

        $ranking = sort_database($name1, $date1, $time1,$section1);
        print_ranking($ranking);
    }
    if(isset($_POST['submit-AT']) || isset($_POST['submit-DT']))
    {
        echo $array1;
        echo "<br>";
        if(isset($_POST['submit-AT']))
        {
            $array1 =  add_time($_POST['day_catalog'], $_POST['time_catalog_1'], $_POST['am_pm_1'],$_POST['time_catalog_2'],$_POST['am_pm_2'], $array1);
            //echo find_ta_schedule($array1);
            echo $array1;
        }
        else
        {
            $array1 =  delete_time($_POST['day_catalog'], $_POST['time_catalog_1'], $_POST['am_pm_1'],$_POST['time_catalog_2'],$_POST['am_pm_2'], $array1);
            //echo find_ta_schedule($array1);
            echo $array1;
        }
    }
    if(isset($_POST['create_table']))
    {
        create_table($array1);
    }
    
    // $array = "100000000011001100000011001100100011001100100010";
    // echo $array;
    // echo "<br>";
    // echo find_ta_schedule($array);
    // echo "<br>";
    // echo time_to_index("0:30");
    // echo "<br>";
    // $array = add_time("0:30","2:30", $array);
    // echo $array;
    // echo "<br>";
    // echo find_ta_schedule($array);
    // echo "<br>";
    // $array = delete_time("1:00","2:00", $array);
    // echo $array;
    // echo "<br>";
    // echo find_ta_schedule($array);
?>