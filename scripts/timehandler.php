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
function sort_database($names, $emails, $dates, $sections, $pName, $pDOW, $pTime, $pAMPM, $pSection)
{   
    $scores = array();
    $names2 = $names;

    for($x=0;$x < 8;$x++){
        $score = 0;
        if($names[$x]==$pName){
            $score+=1.5;
        }
        if($sections[$x]==$pSection){
            $score+=1.1;
        }
        if(string_to_array($dates[$x])[$pDOW][time_to_index($pTime,$pAMPM)]==1){
            $score += 1.4;
        } else {
            $score = 0;
        }
        array_push($scores, $score);
    }
    for($j=0;$j < count($scores); $j++){
        for($k = 0; $k < count($scores)-$j-1; $k++){
            if($scores[$k]<$scores[$k+1]){
                $temp = $scores[$k+1];
                $temp1 = $names[$k+1];
                $temp2 = $emails[$k+1];
                $scores[$k+1]=$scores[$k];
                $names[$k+1]=$names[$k];
                $emails[$k+1]=$emails[$k];
                $scores[$k] = $temp;
                $names[$k] = $temp1;
                $emails[$k] = $temp2;
            }
        }
    }
    echo ("<form method='POST' class='request-tutor' action='./studentRequestReturn.php'>
            Name:
            <br>
            <input type='text' name='firstlast'/>
            <br>
            Email: 
            <br>
            <input type='email' name='sEmail'/>
            <br>");

    for($h=0;$h < count($names); $h++){
        if($scores[$h] != 0)
        {
            $txt = sprintf("TA: %s  Score: %.1f",$names[$h],$scores[$h]);
            echo $txt;
            echo ("<input type='submit' name =".$names[$h].">");
            echo '<br>';
        }
    }
    echo '</form>';
    return $emails; 
}
function print_array($ranking)
{
    for($h=0;$h < count($ranking); $h++){
        echo $ranking[$h];
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
function book_session($day, $startingTime, $amOrPm, $string_of_times)
{
    $array = string_to_array($string_of_times);
    if(($array[$day])[time_to_index($startingTime,$amOrPm)] ==1)
    {
        ($array[$day])[time_to_index($startingTime,$amOrPm)] = "*";
    }
    return array_to_string($array);
}
function delete_time($day, $startingTime, $amOrPM1, $endingTime,  $amOrPM2,$string_of_times)
{
    $array = string_to_array($string_of_times);
    for($h=time_to_index($startingTime, $amOrPM1);$h < time_to_index($endingTime, $amOrPM2); $h++)
    {
        if(($array[$day])[$h] != 1)
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
function find_ta_schedule($str, $astr)
{
    for($h=0;$h < strlen($str); $h++){
        if($h==0 && $str[$h]!="0")
        {
            echo "12:00 AM";
        }
        if($h>0 && $h !=47 && $str[$h-1]=="0" && $str[$h]!="0" )
        {
            echo index_to_time($h);
            
            //echo index_to_time($h);
        }else if($h>0 && $h !=47 && $str[$h-1]=="0" && $str[$h]!="0")
        {
            
        }
        if($h!=47 && $str[$h]!="0" && $str[$h+1]=="0" )
        {
            
            echo sprintf("-%s",index_to_time($h+1));
            
            //echo sprintf("-%s",index_to_time($h+1));
            echo "<br>";

        }
        if($h==47 && $str[$h-1]=="0" && $str[$h]!="0")
        {
            
            echo "11:30 PM-12:00 PM";
            
            echo "<br>";
        }else if($h==47 && $str[$h-1]!="0" && $str[$h]!="0")
        {
            
            echo "-12:00 PM";
            
            echo "<br>";
        }



        if($h==0 && $astr[$h]!="0")
        {
            echo "<font color='#E46A6b'>12:00 AM</font>";
        }
        if($h>0 && $h !=47 && $astr[$h-1]=="0" && $astr[$h]!="0" )
        {
            echo "<font color='#E46A6b'>".index_to_time($h)."</font>";
            
            //echo index_to_time($h);
        }
        if($h!=47 && $astr[$h]!="0" && $astr[$h+1]=="0" )
        {
            
            echo "<font color='#E46A6b'>".sprintf("-%s",index_to_time($h+1))."</font>";            
            //echo sprintf("-%s",index_to_time($h+1));
            echo "<br>";

        }
        if($h==47 && $astr[$h-1]!="0" && $astr[$h]!="0")
        {
            
            echo "-12:00 PM";
            
            echo "<br>";
        }
    }
}
function string_to_zeroString($string)
{
    for($h=0;$h < strlen($string); $h++)
    {
        if($string[$h]=="*")   
        {
            $string[$h]= "0";
        }           
    }
    return $string;
}
function string_to_asteriskString($string)
{
    for($h=0;$h < strlen($string); $h++)
    {
        if($string[$h]=="1")   
        {
            $string[$h]= "0";
        }           
    }
    return $string;
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
        find_ta_schedule(string_to_zeroString($array[$h]), string_to_asteriskString($array[$h]));         
    }
}