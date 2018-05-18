<?php

include("head.php");
include("dbconn.php");
include("dbconn3.php");


 $salesrep=$_SESSION['salesrep'];
 
  $dailydate2=date("n");
  
$getdealsclosed = "SELECT count(id) FROM opportunity where sales_rep='$salesrep' and Status='Closed' and MONTH(DateClosed)='$dailydate2'"; //You don't need a ; like you do in SQL

$result9= mysql_query($getdealsclosed);
$rowrow=mysql_fetch_row($result9);
$_SESSION['dealsclosed']=$rowrow[0];
$connection;


$getopenopportunities = "SELECT count(id) FROM opportunity where sales_rep='$salesrep' and Status='Open'"; //You don't need a ; like you do in SQL
$result10=mysql_query($getopenopportunities);
$rowro=mysql_fetch_row($result10);
$_SESSION['openopportunities']=$rowro[0];
$connection;


$getdesktopshired = "SELECT sum(desktops) FROM opportunity where sales_rep='$salesrep' and status='Closed' and MONTH(DateClosed)='$dailydate2'"; //You don't need a ; like you do in SQL
$result12 = mysql_query($getdesktopshired);
$row=mysql_fetch_row($result12);
$_SESSION['desktopshired']=$row[0];



$getlaptopshired = "SELECT sum(laptops) FROM opportunity where sales_rep='$salesrep' and status='Closed' and MONTH(DateClosed)='$dailydate2'"; //You don't need a ; like you do in SQL
$result13 = mysql_query($getlaptopshired);
$row2=mysql_fetch_row($result13);
$_SESSION['laptopshired']=$row2[0];

$getprojectorshired = "SELECT sum(projectors) FROM opportunity where sales_rep='$salesrep' and status='Closed' and MONTH(DateClosed)='$dailydate2'"; //You don't need a ; like you do in SQL
$result14 = mysql_query($getprojectorshired);
$row4=mysql_fetch_row($result14);
$_SESSION['projectorshired']=$row4[0];


//Get Total Revenue Generated
$getrevenuegenerated = "SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='$dailydate2'"; //You don't need a ; like you do in SQL
$result15 = mysql_query($getrevenuegenerated);
$row=mysql_fetch_row($result15);
$totalrevenue=$row[0];
$_SESSION['totalrevenue']=$totalrevenue;
$connection;

//Get  Meetings Scheduled This Week Today 
 $dailydate3=date("W");
 $_SESSION['result29'] ="";
 $query29 = "SELECT * FROM meetings where User='$salesrep' and WEEK(StartDate,3) like '%$dailydate3%'  order by StartDate asc"; //You don't need a ; like you do in SQL
$_SESSION['result29'] = mysql_query($query29);
$meetingsrow = mysql_fetch_array($result29);
$connection;
//echo mysql_error($connection);

//GET JANUARY REVENUE AND UNITS FOR LINE GRAPH
$yearlydate=date("Y");
$getjanuaryunits = "SELECT sum(units_sold) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='1' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjanuarylaptops="SELECT sum(laptops) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='1' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjanuarydesktops = "SELECT sum(desktops) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='1' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjanuaryprojectors = "SELECT sum(projectors) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='1' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjanuaryservers="SELECT sum(servers) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='1' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjanuarymonitors="SELECT sum(monitors) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='1' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjanuarynetworking="SELECT sum(networking) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='1' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjanuaryothers="SELECT sum(others) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='1' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL



$resultJ1 = mysql_query($getjanuaryunits);


$jrow=mysql_fetch_row($resultJ1);
if ($jrow[0]=="")
{
$_SESSION['JanuaryUnits']=0;
}
else
{
	$_SESSION['JanuaryUnits']=$jrow[0];
}

$resultJ1d=mysql_query($getjanuarydesktops);
$j1row=mysql_fetch_row($resultJ1d);
if ($j1row[0]=="")
{
$_SESSION['JanuaryDesktops']=0;
}
else
{
	$_SESSION['JanuaryDesktops']=$j1row[0];
}


$resultJ1l=mysql_query($getjanuarylaptops);
$j2row=mysql_fetch_row($resultJ1l);
if ($j2row[0]=="")
{
$_SESSION['JanuaryLaptops']=0;
}
else
{
	$_SESSION['JanuaryLaptops']=$j2row[0];
}

$resultJ1p=mysql_query($getjanuaryprojectors);
$j3row=mysql_fetch_row($resultJ1p);
if ($j3row[0]=="")
{
$_SESSION['JanuaryProjectors']=0;
}
else
{
	$_SESSION['JanuaryProjectors']=$j3row[0];
}

$resultJ1s=mysql_query($getjanuaryservers);
$j4row=mysql_fetch_row($resultJ1s);
if ($j4row[0]=="")
{
$_SESSION['JanuaryServers']=0;
}
else
{
	$_SESSION['JanuaryServers']=$j4row[0];
}

$resultJ1n=mysql_query($getjanuarynetworking);
$j5row=mysql_fetch_row($resultJ1n);
if ($j3row[0]=="")
{
$_SESSION['JanuaryNetworking']=0;
}
else
{
	$_SESSION['JanuaryNetworking']=$j5row[0];
}

$resultJ10=mysql_query($getjanuaryothers);
$j6row=mysql_fetch_row($resultJ1o);
if ($j6row[0]=="")
{
$_SESSION['JanuaryOthers']=0;
}
else
{
	$_SESSION['JanuaryOthers']=$j6row[0];
}




$getjanuaryREVENUE="SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='1' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultJ2 = mysql_query($getjanuaryREVENUE);
$jrrow=mysql_fetch_row($resultJ2);
if ($jrrow[0]=="")
{
$_SESSION['JanuaryRevenue']=0;
}
else
{
	$_SESSION['JanuaryRevenue']=$jrrow[0];
}

$connection;

//GET FEBRUARY REVENUE AND UNITS FOR LINE GRAPH
$yearlydate=date("Y");
$getfebruaryunits = "SELECT sum(units_sold) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='2' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getfebruarylaptops="SELECT sum(laptops) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='2' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getfebruarydesktops = "SELECT sum(desktops) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='2' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getfebruaryprojectors = "SELECT sum(projectors) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='2' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getfebruaryservers="SELECT sum(servers) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='2' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getfebruarymonitors="SELECT sum(monitors) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='2' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getfebruarynetworking="SELECT sum(networking) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='2' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getfebruaryothers="SELECT sum(others) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='2' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL



$resultF1 = mysql_query($getfebruaryunits);
$frow=mysql_fetch_row($resultF1);
$connection;
if ($frow[0]=="")
{
$_SESSION['FebruaryUnits']=0;
}
else
{
	$_SESSION['FebruaryUnits']=$jrow[0];
}


$resultF1l = mysql_query($getfebruarylaptops);
$f1row=mysql_fetch_row($resultF1l);
$connection;
if ($f1row[0]=="")
{
$_SESSION['FebruaryLaptops']=0;
}
else
{
	$_SESSION['FebruaryLaptops']=$f1row[0];
}


$resultF1d = mysql_query($getfebruarydesktops);
$f2row=mysql_fetch_row($resultF1d);
$connection;
if ($f2row[0]=="")
{
$_SESSION['FebruaryDesktops']=0;
}
else
{
	$_SESSION['FebruaryDesktops']=$f2row[0];
}


$resultF1s = mysql_query($getfebruaryservers);
$f3row=mysql_fetch_row($resultF1s);
$connection;
if ($f3row[0]=="")
{
$_SESSION['FebruaryServers']=0;
}
else
{
	$_SESSION['FebruaryServers']=$f3row[0];
}

$resultF1p = mysql_query($getfebruaryprojectors);
$f4row=mysql_fetch_row($resultF1p);
$connection;
if ($f4row[0]=="")
{
$_SESSION['FebruaryProjectors']=0;
}
else
{
	$_SESSION['FebruaryProjectors']=$f4row[0];
}

$resultF1n = mysql_query($getfebruarynetworking);
$f5row=mysql_fetch_row($resultF1n);
$connection;
if ($f5row[0]=="")
{
$_SESSION['FebruaryNetworking']=0;
}
else
{
	$_SESSION['FebruaryNetworking']=$f5row[0];
}


$getfebruaryREVENUE="SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='2' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultF2 = mysql_query($getfebruaryREVENUE);
$frrow=mysql_fetch_row($resultF2);



$connection;
if ($frrow[0]=="")
{
$_SESSION['FebruaryRevenue']=0;
}
else
{
	$_SESSION['FebruaryRevenue']=$frrow[0];
}


//GET MARCH REVENUE AND UNITS FOR LINE GRAPH
$yearlydate=date("Y");
$getmarchunits = "SELECT sum(units_sold) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='3' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmarchlaptops="SELECT sum(laptops) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='3' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmarchdesktops = "SELECT sum(desktops) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='3' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmarchprojectors = "SELECT sum(projectors) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='3' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmarchservers="SELECT sum(servers) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='3' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmarchmonitors="SELECT sum(monitors) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='3' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmarchnetworking="SELECT sum(networking) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='3' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmarchothers="SELECT sum(others) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='3' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL


$resultM1 = mysql_query($getmarchunits);
$mrow=mysql_fetch_row($resultM1);

if ($mrow[0]=="")
{
$_SESSION['MarchUnits']=0;
}
else
{
	$_SESSION['MarchUnits']=$mrow[0];
}

$resultM1l = mysql_query($getmarchlaptops);
$m1row=mysql_fetch_row($resultM1l);

if ($m1row[0]=="")
{
$_SESSION['MarchLaptops']=0;
}
else
{
	$_SESSION['MarchLaptops']=$m1row[0];
}

$resultM1d = mysql_query($getmarchdesktops);
$m2row=mysql_fetch_row($resultM1d);

if ($m2row[0]=="")
{
$_SESSION['MarchDesktops']=0;
}
else
{
	$_SESSION['MarchDesktops']=$m2row[0];
}

$resultM1s = mysql_query($getmarchservers);
$m3row=mysql_fetch_row($resultM1s);

if ($m3row[0]=="")
{
$_SESSION['MarchServers']=0;
}
else
{
	$_SESSION['MarchServers']=$m3row[0];
}

$resultM1p = mysql_query($getmarchprojectors);
$m4row=mysql_fetch_row($resultM1p);

if ($m4row[0]=="")
{
$_SESSION['MarchProjectors']=0;
}
else
{
	$_SESSION['MarchProjectors']=$m4row[0];
}


$resultM1n = mysql_query($getmarchnetworking);
$m5row=mysql_fetch_row($resultM1n);

if ($m5row[0]=="")
{
$_SESSION['MarchNetworking']=0;
}
else
{
	$_SESSION['MarchNetworking']=$m5row[0];
}

$resultM1o = mysql_query($getmarchothers);
$m6row=mysql_fetch_row($resultM1o);

if ($m6row[0]=="")
{
$_SESSION['MarchOthers']=0;
}
else
{
	$_SESSION['MarchOthers']=$m6row[0];
}

$getmarchREVENUE="SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='3' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultM2 = mysql_query($getmarchREVENUE);
$mrrow=mysql_fetch_row($resultM2);

$connection;

if ($mrrow[0]=="")
{
$_SESSION['MarchRevenue']=0;
}
else
{
	$_SESSION['MarchRevenue']=$mrrow[0];
}

//GET APRIL REVENUE AND UNITS FOR LINE GRAPH
$yearlydate=date("Y");
$getAPRILunits = "SELECT sum(units_sold) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='4' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getaprillaptops="SELECT sum(laptops) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='4' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getaprildesktops = "SELECT sum(desktops) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='4' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getaprilprojectors = "SELECT sum(projectors) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='4' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getaprilservers="SELECT sum(servers) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='4' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getaprilmonitors="SELECT sum(monitors) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='4' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getaprilnetworking="SELECT sum(networking) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='4' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getaprilothers="SELECT sum(others) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='4' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL


$resultA1 = mysql_query($getAPRILunits);
$arow=mysql_fetch_row($resultA1);
if ($arow[0]=="")
{
$_SESSION['AprilUnits']=0;
}
else
{
	$_SESSION['AprilUnits']=$arow[0];
}


$resultA1l = mysql_query($getaprillaptops);
$a1row=mysql_fetch_row($resultA1l);
if ($a1row[0]=="")
{
$_SESSION['AprilLaptops']=0;
}
else
{
	$_SESSION['AprilLaptops']=$a1row[0];
}


$resultA1d = mysql_query($getaprildesktops);
$a2row=mysql_fetch_row($resultA1d);
if ($a2row[0]=="")
{
$_SESSION['AprilDesktops']=0;
}
else
{
	$_SESSION['AprilDesktops']=$a2row[0];
}


$resultA1s = mysql_query($getaprilservers);
$a3row=mysql_fetch_row($resultA1s);
if ($a3row[0]=="")
{
$_SESSION['AprilServers']=0;
}
else
{
	$_SESSION['AprilServers']=$a3row[0];
}


$resultA1p = mysql_query($getaprilprojectors);
$a4row=mysql_fetch_row($resultA1p);
if ($a4row[0]=="")
{
$_SESSION['AprilProjectors']=0;
}
else
{
	$_SESSION['Aprilprojectors']=$a4row[0];
}


$resultA1n = mysql_query($getaprilnetworking);
$a5row=mysql_fetch_row($resultA1n);
if ($a5row[0]=="")
{
$_SESSION['AprilNetworking']=0;
}
else
{
	$_SESSION['AprilNetworking']=$a5row[0];
}


$resultA1o = mysql_query($getaprilothers);
$a6row=mysql_fetch_row($resultA1o);
if ($a6row[0]=="")
{
$_SESSION['AprilOthers']=0;
}
else
{
	$_SESSION['AprilOthers']=$a6row[0];
}






$getAPRILREVENUE="SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='4' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultA2 = mysql_query($getAPRILREVENUE);
$arrow=mysql_fetch_row($resultA2);

$connection;
if ($arrow[0]=="")
{
$_SESSION['AprilRevenue']=0;
}
else
{
	$_SESSION['AprilRevenue']=$arrow[0];
}


//GET MAY REVENUE AND UNITS FOR LINE GRAPH
$yearlydate=date("Y");
$getMAYunits = "SELECT sum(units_sold) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmaylaptops="SELECT sum(laptops) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmaydesktops = "SELECT sum(desktops) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmayprojectors = "SELECT sum(projectors) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmayservers="SELECT sum(servers) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmaymonitors="SELECT sum(monitors) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmaynetworking="SELECT sum(networking) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getmayothers="SELECT sum(others) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL



$resultMA1 = mysql_query($getMAYunits);
$marow=mysql_fetch_row($resultMA1);
if ($marow[0]=="")
{
$_SESSION['MayUnits']=0;
}
else
{
	$_SESSION['MayUnits']=$marow[0];
}


$resultMA1l = mysql_query($getmaylaptops);
$m1arow=mysql_fetch_row($resultMA1l);
if ($m1arow[0]=="")
{
$_SESSION['MayLaptops']=0;
}
else
{
	$_SESSION['MayLaptops']=$m1arow[0];
}

$resultMA1d = mysql_query($getmaydesktops);
$m2arow=mysql_fetch_row($resultMA1d);
if ($m2arow[0]=="")
{
$_SESSION['MayDesktops']=0;
}
else
{
	$_SESSION['MayDesktops']=$m2arow[0];
}


$resultMA1s = mysql_query($getmayservers);
$m3arow=mysql_fetch_row($resultMA1s);
if ($m3arow[0]=="")
{
$_SESSION['MayServers']=0;
}
else
{
	$_SESSION['MayServers']=$m3arow[0];
}


$resultMA1p = mysql_query($getmayprojectors);
$m4arow=mysql_fetch_row($resultMA1p);
if ($m4arow[0]=="")
{
$_SESSION['MayProjectors']=0;
}
else
{
	$_SESSION['MayProjectors']=$m4arow[0];
}

$resultMA1n = mysql_query($getmaynetworking);
$m5arow=mysql_fetch_row($resultMA1n);
if ($m5arow[0]=="")
{
$_SESSION['MayNetworking']=0;
}
else
{
	$_SESSION['MayNetworking']=$m5arow[0];
}


$resultMA1o = mysql_query($getmayothers);
$m6arow=mysql_fetch_row($resultMA1o);
if ($m6arow[0]=="")
{
$_SESSION['MayOthers']=0;
}
else
{
	$_SESSION['MayOthers']=$m6arow[0];
}



$getMAYREVENUE="SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultMA2 = mysql_query($getMAYREVENUE);
$marrow=mysql_fetch_row($resultMA2);

$connection;
if ($marrow[0]=="")
{
$_SESSION['MayRevenue']=0;
}
else
{
	$_SESSION['MayRevenue']=$marrow[0];
}


//GET JUNE REVENUE AND UNITS FOR LINE GRAPH
$yearlydate=date("Y");
$getJuneunits = "SELECT sum(units_sold) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='6' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjunelaptops="SELECT sum(laptops) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjunedesktops = "SELECT sum(desktops) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjuneprojectors = "SELECT sum(projectors) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjuneservers="SELECT sum(servers) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjunemonitors="SELECT sum(monitors) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjunenetworking="SELECT sum(networking) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$getjuneothers="SELECT sum(others) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='5' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL



$resultJU1 = mysql_query($getJuneunits);
$jurow=mysql_fetch_row($resultJU1);
$connection;

if ($jurow[0]=="")
{
$_SESSION['JuneUnits']=0;
}
else
{
	$_SESSION['JuneUnits']=$jurow[0];
}


$resultJU1l = mysql_query($getjunelaptops);
$j1urow=mysql_fetch_row($resultJU1l);
$connection;

if ($j1urow[0]=="")
{
$_SESSION['JuneLaptops']=0;
}
else
{
	$_SESSION['JuneLaptops']=$j1urow[0];
}


$resultJU1d = mysql_query($getjunedesktops);
$j2urow=mysql_fetch_row($resultJU1d);
$connection;

if ($j2urow[0]=="")
{
$_SESSION['JuneDesktops']=0;
}
else
{
	$_SESSION['JuneDesktops']=$j2urow[0];
}

$resultJU1s = mysql_query($getjuneservers);
$j3urow=mysql_fetch_row($resultJU1s);
$connection;

if ($j3urow[0]=="")
{
$_SESSION['JuneServers']=0;
}
else
{
	$_SESSION['JuneServers']=$j3urow[0];
}

$resultJU1p = mysql_query($getjuneprojectors);
$j4urow=mysql_fetch_row($resultJU1p);
$connection;

if ($j4urow[0]=="")
{
$_SESSION['JuneProjectors']=0;
}
else
{
	$_SESSION['JuneProjectors']=$j4urow[0];
}

$resultJU1n = mysql_query($getjunenetworking);
$j5urow=mysql_fetch_row($resultJU1n);
$connection;

if ($j5urow[0]=="")
{
$_SESSION['JuneLaptops']=0;
}
else
{
	$_SESSION['JuneLaptops']=$j5urow[0];
}

$resultJU1o = mysql_query($getjuneothers);
$j6urow=mysql_fetch_row($resultJU1o);
$connection;

if ($j6urow[0]=="")
{
$_SESSION['JuneOthers']=0;
}
else
{
	$_SESSION['JuneOthers']=$j6urow[0];
}



$getJUNEREVENUE="SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='6' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultJU2=mysql_query($getJUNEREVENUE);
$jurrow=mysql_fetch_row($resultJU2);
$connection;

if ($jurrow[0]=="")
{
$_SESSION['JuneRevenue']=0;
}
else
{
	$_SESSION['JuneRevenue']=$jurrow[0];
}


//GET JULY REVENUE AND UNITS FOR LINE GRAPH
$yearlydate=date("Y");
$getJulyunits = "SELECT sum(units_sold) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='7' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultJJ1 = mysql_query($getJulyunits);
$jjrow=mysql_fetch_row($resultJJ1);


if ($jjrow[0]=="")
{
$_SESSION['JulyUnits']=0;
}
else
{
	$_SESSION['JulyUnits']=$jjrow[0];
}


$getJULYREVENUE="SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='7' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultJJ2 = mysql_query($getJULYREVENUE);
$jjrrow=mysql_fetch_row($resultJJ2);


if ($jjrrow[0]=="")
{
$_SESSION['JulyRevenue']=0;
}
else
{
	$_SESSION['JulyRevenue']=$jjrrow[0];
}



//GET AUGUST REVENUE AND UNITS FOR LINE GRAPH
$yearlydate=date("Y");
$getAugustunits = "SELECT sum(units_sold) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='8' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultAU1 = mysql_query($getAugustunits);
$aurow=mysql_fetch_row($resultAU1);


if ($aurow[0]=="")
{
$_SESSION['AugustUnits']=0;
}
else
{
	$_SESSION['AugustUnits']=$aurow[0];
}


$getAUGUSTREVENUE="SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='8' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultAU2 = mysql_query($getAUGUSTVENUE);
$aurrow=mysql_fetch_row($resultAU2);

$connection;
if ($aurrow[0]=="")
{
$_SESSION['AugustRevenue']=0;
}
else
{
	$_SESSION['AugustRevenue']=$aurrow[0];
}



//GET SEPTEMBER REVENUE AND UNITS FOR LINE GRAPH
$yearlydate=date("Y");
$getSeptemberunits = "SELECT sum(units_sold) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='9' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultS1 = mysql_query($getSeptemberunits);
$srow=mysql_fetch_row($resultS1);
$connection;

if ($srow[0]=="")
{
$_SESSION['SeptemberUnits']=0;
}
else
{
	$_SESSION['SeptemberUnits']=$srow[0];
}


$getSEPTREVENUE="SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='9' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultS2 = mysql_query($getSEPTREVENUE);
$srrow=mysql_fetch_row($resultS2);
$_SESSION['SeptemberRevenue']=$srrow[0];
$connection;
if ($srrow[0]=="")
{
$_SESSION['SeptemberRevenue']=0;
}
else
{
	$_SESSION['SeptemberRevenue']=$srrow[0];
}


//GET OCTOBER REVENUE AND UNITS FOR LINE GRAPH
$yearlydate=date("Y");
$getOctoberunits = "SELECT sum(units_sold) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='10' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultO1 = mysql_query($getOctoberunits);
$orow=mysql_fetch_row($resultO1);


if ($orow[0]=="")
{
$_SESSION['OctoberUnits']=0;
}
else
{
	$_SESSION['OctoberUnits']=$orow[0];
}


$getOCTREVENUE="SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='10' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultO2 = mysql_query($getOCTREVENUE);
$orrow=mysql_fetch_row($resultO2);

$connection;

if ($orrow[0]=="")
{
$_SESSION['OctoberRevenue']=0;
}
else
{
	$_SESSION['OctoberRevenue']=$orrow[0];
}


//GET NOVEMBER REVENUE AND UNITS FOR LINE GRAPH
$yearlydate=date("Y");
$getNovemberunits = "SELECT sum(units_sold) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='11' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultN1 = mysql_query($getNovemberunits);
$nrow=mysql_fetch_row($resultN1);


if ($nrow[0]=="")
{
$_SESSION['NovemberUnits']=0;
}
else
{
	$_SESSION['NovemberUnits']=$nrow[0];
}


$getNOVREVENUE="SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='11' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultN2 = mysql_query($getNOVREVENUE);
$nrrow=mysql_fetch_row($resultN2);

$connection;

if ($nrrow[0]=="")
{
$_SESSION['NovemberRevenue']=0;
}
else
{
	$_SESSION['NovemberRevenue']=$nrrow[0];
}


//GET DECEMBER REVENUE AND UNITS FOR LINE GRAPH
$yearlydate=date("Y");
$getDecemberunits = "SELECT sum(units_sold) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='12' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultD1 = mysql_query($getDecemberunits);
$drow=mysql_fetch_row($resultD1);


if ($drow[0]=="")
{
$_SESSION['DecemberUnits']=0;
}
else
{
	$_SESSION['DecemberUnits']=$drow[0];
}


$getDECREVENUE="SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='12' and YEAR(DateClosed)='$yearlydate'"; //You don't need a ; like you do in SQL
$resultD2 = mysql_query($getDECREVENUE);
$drrow=mysql_fetch_row($resultD2);

$connection;

if ($drrow[0]=="")
{
$_SESSION['DecemberRevenue']=0;
}
else
{
	$_SESSION['DecemberRevenue']=$srow[0];
}


?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home color-red"></em>
				</a></li>
				<li class="active">Dashboard</li>
			<ul class="pull-right panel-settings panel-button-tab-right">
		
							</a>
			<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
										
											
										</ul>
										
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">My Dashboard</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
						<div class="col-md-12">
		<div class="panel panel-danger">
	
						<div class="panel-heading">
		Quick Stats (for the month)
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
				<div class="panel panel-container">	
			<div class="row">
			<a href="#">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-gavel color-red"></em>
							<div class="large"><?php echo $_SESSION['dealsclosed'];  ?></div>
							<div class="text-muted color-red">Deals Closed</div>
						</div>
					</div>
				</div></a>
				<a href="#">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-link color-red"></em>
							<div class="large"><?php echo $_SESSION['openopportunities'];  ?></div>
							<div class="text-muted color-red">Open Opportuinities</div>
						</div>
					</div>
				</div>
				</a>
				<a href="#">
					<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-desktop color-red"></em>
							<div class="large"><?php echo $_SESSION['desktopshired']; ?></div>
							<div class="text-muted color-red">Desktop Hired</div>
						</div>
					</div>
				</div></a>
				<a href="#">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-laptop color-red"></em>
							<div class="large"><?php echo $_SESSION['laptopshired']; ?></div>
							<div class="text-muted color-red">Laptops Hired</div>
						</div>
					</div>
				</div></a>
				<a href="#">
					<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><img src="images/video-projector-32.png">
							<div class="large"><?php echo $_SESSION['projectorshired']; ?></div>
							<div class="text-muted color-red">Projectors Hired</div>
						</div>
					</div>
				</div></a>
				<a href="#">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-file color-red"></em>
							<div class="large">2</div>
							<div class="text-muted color-red">New Contracts</div>
						</div>
					</div>
				</div></a>
				<a href="#">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-dollar color-red"></em>
							<div class="large"><?php echo $_SESSION['totalrevenue']; ?></div>
							<div class="text-muted color-red">Revenue Generated</div>
						</div>
					</div>
				</div></a>
				<a href="#">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-exclamation color-red"></em>
							<div class="large">11</div>
							<div class="text-muted color-red">Pending Action Items</div>
						</div>
					</div>
				</div></a>
				
			</div><!--/.row-->
		</div>
			</div><!--/.panel-->
		
		</div>
		</div>
		
		
					
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-danger articles">
					<div class="panel-heading">
					My Meetings & Appointments
						<ul class="pull-right panel-settings panel-button-tab-right">
								<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					
							</a>
								
						<span class="pull-right clickable panel-toggle panel-button-tab-left"></span></div>
						</ul>
						<?php
						while($rowt = mysql_fetch_array($_SESSION['result29'])){
							$date1 = strtr($rowt['StartDate'], '/', '-');
							
						echo"
					<div class=\"panel-body articles-container\">
						<div class=\"article border-bottom\">
							<div class=\"col-xs-12\">
								<div class=\"row\">
									<div class=\"col-xs-2 col-md-2 date\">
										<div class=\"large\">".date('d',strtotime($date1))."</div>
										<div class=\"text-muted\">".date('M',strtotime($date1))."</div>
	                                    	<div class=\"text-muted\">".date('H:i',strtotime($date1))."</div>
									
									</div>
									<div class=\"col-xs-10 col-md-10\">
										<h4><strong><a href=\"#\" class=\"color-red\">".$rowt['Title']."</a></strong></h4>
										<p>Location: ".$rowt['Location']." </p>
										<p>Contact: ".$rowt['Contact']."(".$rowt['Customer'].")</p>
									</div>
								</div>
							</div>
							<div class=\"clear\"></div>
						</div><!--End .article-->
						";
						}
						
						?>
					
						
						
					</div>
				</div>
			</div><!--/.col-->
			</div>
			
			
			
			
		
		
	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-danger">
					<div class="panel-heading">
				Total Units Hired (Combined Laptops & Desktops,Servers,Projectors)
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
	</div>	<!--/.row-->
	
	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-danger">
					<div class="panel-heading">
				Total Units Hired 
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart3" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
	</div>	<!--/.row-->
	
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-danger">
					<div class="panel-heading">
				Revenue Generated (Month on Month)
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart2" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
	</div>	<!--/.row-->
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-danger">
					<div class="panel-heading">
					Revenue Targets
			<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
					
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Monthly Target</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">200</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Quarterly Target</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Yearly Target</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span></div>
					</div>
				</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			
			
		
		<div class="row">
						<div class="col-md-12">
				<div class="panel panel-danger ">
					<div class="panel-heading">
					
						My Activity Stream
						<ul class="pull-right panel-settings panel-button-tab-right">
								<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					
							</a>
								
						<span class="pull-right clickable panel-toggle panel-button-tab-left"></span></div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<li>
								<div class="timeline-badge"><em class="glyphicon glyphicon-pushpin"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
									</div>
									<div class="timeline-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
									</div>
								</div>
							</li>
							
						</ul>
					</div>
				</div>
			</div><!--/.col-->
			</div>
		<div class="row">
			<div class="col-sm-12">
				<p class="back-link">Qrent Zimbabwe Copyright 2018 <a href="https://www.qrent.co.zw"></a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

<?php

include("footer.php");

?>
	
<script type="text/javascript">
var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};
	
	var lineChartData = {
		labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
		datasets : [
			
			{
				label: "Units",
				fillColor : "rgba(48, 164, 255, 0.2)",
				strokeColor : "rgb(115, 115, 115)",
				pointColor : "rgba(48, 164, 255, 1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(48, 164, 255, 1)",
				data : [<?php echo $_SESSION['JanuaryUnits']; ?>,<?php echo $_SESSION['FebruaryUnits']; ?>,<?php echo $_SESSION['MarchUnits']; ?>,<?php echo $_SESSION['AprilUnits']; ?>,<?php echo $_SESSION['MayUnits']; ?>,<?php echo $_SESSION['JuneUnits']; ?>,<?php echo $_SESSION['JulyUnits']; ?>,<?php echo $_SESSION['AugustUnits']; ?>,<?php echo $_SESSION['SeptemberUnits']; ?>,<?php echo $_SESSION['OctoberUnits']; ?>,<?php echo $_SESSION['NovemberUnits']; ?>,<?php echo $_SESSION['DecemberUnits']; ?>]
			}
			],
			  
        options: {
				responsive: true,
				title: {
					display: true,
					text: 'Chart.js Line Chart'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
        


	
	}
	
	var lineChartData2 = {
		labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
		datasets : [
			
			{
				label: "Revenue",
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "rgb(255, 51, 51)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				data : [<?php echo $_SESSION['JanuaryRevenue']; ?>,<?php echo $_SESSION['FebruaryRevenue']; ?>,<?php echo $_SESSION['MarchRevenue']; ?>,<?php echo $_SESSION['AprilRevenue']; ?>,<?php echo $_SESSION['MayRevenue']; ?>,<?php echo $_SESSION['JuneRevenue']; ?>,<?php echo $_SESSION['JulyRevenue']; ?>,<?php echo $_SESSION['AugustRevenue']; ?>,<?php echo $_SESSION['SeptemberRevenue']; ?>,<?php echo $_SESSION['OctoberRevenue']; ?>,<?php echo $_SESSION['NovemberRevenue']; ?>,<?php echo $_SESSION['DecemberRevenue']; ?>]
			}
			],
			  
        options: {
				responsive: true,
				title: {
					display: true,
					text: 'Chart.js Line Chart2'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
        


	
	}
</script>