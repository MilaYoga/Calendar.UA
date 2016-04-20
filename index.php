<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- //saved from  http://WWW.DaKstudio.ltd.ua/  //-->
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<?
/**************************************************/
// UADate version 0.48/Alpha	
// ------------------------------------------------
// 2008-2016 DaK studio
// 	EMail: DaKstudio@ukr.net 
//	http://Dakstudio.ltd.ua
//   Released under the terms and conditions of the
//   GNU General Public License (http://gnu.org).
//  $Source: https://github.com/MilaYoga/Calendar.UA $
//  $Source: http://calendarUA.sourceforge.net/ $
//  $Revision: 0.4 $
//  $Date: 20-01-2016  23:28:59 $
//    $Author: LnceloT $
/**************************************************/ 
@include('uadate.php');
$manth=0; $weekDay=0;// N_MONTH,N_WEEK,N_MDAY;  N_YEAR?>
<title>Календар.UA <?=N_YEAR?> рік від DaKstudio.ltd.ua та BIBLOS.in</title>
<meta name="Content-Language" Content="uk">
<meta name="Language" Content="UKRAINIAN">
<link rel="shortcut icon" href="favicon.ico">
<meta name="Publisher" content="DaK studio (c) & LanceloT (r)">
<meta name="Author" content="LanceloT">
<meta name="copyright" content="GNU Dakstudio.ltd.ua">
<META NAME="keywords" CONTENT="календар, UA, січень, лютий, березень, квітень, травень, червень, липень, серпень, вересень, жовтень, листопад, грудень, Calendar.UA, calendarua.sourceforge.net, DaK studio, BIBLOS">
<META NAME="description" CONTENT="Календар.UA на <?=N_YEAR?> рік від DaKstudio.ltd.ua and BIBLOS.in">
</head>
<?
@require_once('uacalendar.cfg');
//-----
$heapWeek="<tr style='font-family:Verdana;font-size:".$FontSizeChisla."px;color:#".$cb.";'>"  //9
."<td style='color:#".$colorNedila.";background:#a9aa9a; border-bottom: 1px solid #".$cw.";
border-top: 1px solid #".$cw.";'>"
.UAdateD(" D ",1,0)."</td><td style='border-bottom: 1px solid #".$cw.";border-top: 1px solid #".$cw.";'>"
.UAdateD(" D ",1,1)."</td><td style='border-bottom: 1px solid #".$cw.";border-top: 1px solid #".$cw.";'>"
.UAdateD(" D ",1,2)."</td><td style='border-bottom: 1px solid #".$cw.";border-top: 1px solid #".$cw.";'>"
.UAdateD(" D ",1,3)."</td><td style='border-bottom: 1px solid #".$cw.";border-top: 1px solid #".$cw.";'>"
.UAdateD(" D ",1,4)."</td><td style='border-bottom: 1px solid #".$cw.";border-top: 1px solid #".$cw.";'>"
.UAdateD(" D ",1,5)."</td><td style='border-bottom: 1px solid #".$cw.";border-top: 1px solid #".$cw.";'>"
.UAdateD(" D ",1,6)."</td></tr>";
if  (date ("L")) {$ins=" високосний";}
?>
<body style='background-color: #<?=$colorTla?>'>
<CENTER>
<?="<a href='http://DaKstudio.ltd.ua/' style='font-size:9px;'>
<h1 style='color:#".$colorCalendar.";background:#ffffff;text-decoration: none;'><sup>&copy; </sup>КАЛЕНДАР.UA".UAdate(' Y рік')."<sup><font size=-1 color=#".$colorHY."><u>"
.$ins."</u></font></sup></h1></a>"
."<BR><center>".UAdate("Сьогодні l, d F Y року H:i s сек.")."</center>";
 $ins="";
//TABLE Yaer
echo "<table width='98%' cols='".$colums_cal."' border='".$borderAll."'>"
."<tr>";
$m = 1;
while ($m <= 12) {
 $switcher=0; $manth=$m;
$fl=($m-1)/$colums_cal;
 if (round($fl)==$fl){echo "</tr><tr>";}
$ins1=strtoupper((UAdateD(" F <sup>".$manth."</sup>",$manth,$weekDay)));
$ins=""; $FSC=$FontSizeChisla+2; //назви місяців ФОНТОМ+2 (активний +5))
if (N_MONTH==$manth) {
 $ins="border-top:3px solid #".$colorActive."; border-bottom:3px solid #".$colorActive.";"; //виділити текучий місяць
 $ins1=(strtoupper((UAdateD("<strong> F </strong><sup>".$manth,$manth,$weekDay))))."-".N_YEAR."</sup>";
 $FSC=$FontSizeChisla+5; //назва текучого місяця ФОНТОМ+5 (решта +2))
 }
echo "<td align='center' valign='top' style='line-height: ".$InterLineMT."; font-family:Verdana;font-size:".($FSC)."px;color:#".$colorNedila.";".$ins."'>"
.$ins1; //size 13
//Table month
echo "<table cols='7' border='".$borderManth."' style='text-align:center; color:#".$cb."'>";
//
echo $heapWeek;
$chk=date("t", mktime(0, 0, 0, $manth, 1, N_YEAR)); //кількість  днів в Місяці,який  виводимо
$chkBW=date("w", mktime(0, 0, 0, $manth, 1, N_YEAR))+1;//День тижня (від  0  до  6),з  якого  починється  місяць
$m1=date("m",mktime(0, 0, 0, $manth, 1, N_YEAR));#отримуємо мсяць у формааті  2-знаки- 01
$chkP=date("t", mktime(0, 0, 0, ($manth-1), 1, N_YEAR)); #кількість  днів в попередньому Місяці
 $dpm=2+$chkP-$chkBW;  #число початку останнього тижня попереднього місяця
 $dm=1;
 while($dm<=$chk){
  echo  "<tr>";
  $dm1=1;
  while( $dm1<=7){
    $clr=$colorBudni;
	if  ($dm1==1){ $clr=$colorNedila;} #якщо Неділя змінити колір
	#сьогоднішній день виділити в  календарі
	$ins=""; if  (N_MDAY==$dm & N_MONTH==$manth) {$ins="border: 3px solid #".$colorActive."; font-weight: bold; background-color: #".$colorActiveBG;}
    if ( $switcher==1){
	  echo "<td style='background-color: #".$clr.";".$ins."'>".$dm; $dm++;
    }else{
     if  ($chkBW<=$dm1)  { 
	  echo  "<td style='background-color: #".$clr.";".$ins."'>".$bh.$dm.$eh; $dm++; $switcher=1;
	 }else{ 
echo "<td style='background: #".$colorPusto.";color: #".$colorPustoT."'><small>".$dpm.'</small>'; $dpm++; } //починаємо місяць з попереднього
    }
	echo  "</td>";
	$i=0;
   if ($dm>$chk) { for ($ii=$dm1;$ii<7;$ii++){
    $i++;
    echo  "<td style='background-color: #".$colorPusto.";color: #".$colorPustoT."'><small>".$i."</small></td>";	}
	$dm1=8; } //закінчити місяць  коректно
  $dm1++;}
  echo "</tr>"; $dm=$dm-1;
 $dm++;}
 echo "</table>"
 ."</td>";
$m++;}

echo "</tr>"
."</table>";

echo "<br><a href='http://DaKstudio.ltd.ua/' style='font-size:7px;' title='DaK studio - design is Life!'>DaK studio &copy; </a>"?>
</body></html>