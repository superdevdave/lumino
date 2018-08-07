<?php
//start session

session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

$action = $_REQUEST['action'];
//echo $_REQUEST['itemdesc'];
//echo $_REQUEST['qty'];
//echo $_REQUEST['total'];
//echo $_REQUEST['description'];
//echo $_REQUEST['unitprice'];







switch($action) {
	case 'addOpp':
	addOpportunities();
	break;
	
	case 'editOpp':
	EditOpportunityData();
	break;
	
	case 'UpdateOpp1':
	UpdateOpportune();
	break;
	
	case 'CancelOpp':
		CancelOpportunity();
	break;
	
	case 'CloseOpp':
		CloseOpportunity();
	break;
    case 'addProformaItem':
	 AddProformaItem();
	break;
	
	case 'getProformaNo':
		GetProformaNo();
	break;
	
	case 'change-pass':
		changePass();
	break;
	case'submitProformaOnly':
	SubmitProformaOnly();
	break;
	case'submitProforma':
	SubmitProforma();
	break;
	case'viewIndividualReport':
	ViewIndividualReport();
	break;
	
	case'addMeeting':
	addNewMeeting();
	break;
	
	case'editMeeting':
	editNewMeeting();
	break;
	
	case'finishMeeting':
	finishNewMeeting();
	break;
	
	case'cancelMeeting':
	cancelNewMeeting();
	break;
	
	case 'logOut':
		logOut();
	break;		

}//switch

function UpdateOpportune()
{

	
	include("dbconn.php");
	include("dbconn3.php");
	
	echo $OpportuneID=$_REQUEST['UpdateOppID'];
	echo $Progress=$_REQUEST['Progress'];
	echo $NextSteps=$_REQUEST['NextSteps'];
	echo $OpportunityStatus=$_REQUEST['NewOpportunityStatus'];
	
	echo $sql304="update opportunity set Progress='$Progress',NextStep='$NextSteps',PipelineStage='$OpportunityStatus' where ID='$OpportuneID'";
	
	mysql_query($sql304);

 echo $connection;
echo mysql_error($connection);

//Header('Location: opportunities.php');

	
}

function addNewMeeting()

{
	include("dbconn.php");
	include("dbconn3.php");
	
echo $Subject=$_REQUEST['Subject'];
echo $Location=$_REQUEST['Location'];
echo $Customer=$_REQUEST['Customer'];
echo $Contact=$_REQUEST['ContactPerson'];
echo $StartDate=$_REQUEST['StartTime'];
echo $EndDate=$_REQUEST['EndDate'];
echo $ReminderStart=$_REQUEST['ReminderDate'];
echo $Description=$_REQUEST['Description'];
echo $status="Pending";

echo $user=$_SESSION['salesrep'];

$sql33="insert into meetings(Title,Location,Customer,Contact,StartDate,EndDate,ReminderStart,Status,user,Description)
VALUES ('$Subject','$Location', '$Customer','$Contact','$StartDate','$EndDate','$ReminderStart','$status','$user','$Description')";


mysql_query($sql33);

 echo $connection;
echo mysql_error($connection);

Header('Location: meetings.php');

	
}


function editNewMeeting()

{
	include("dbconn.php");
	include("dbconn3.php");
	
echo $MeetingID=$_REQUEST['MeetingID'];
echo $Subject=$_REQUEST['edSubject'];
echo $Location=$_REQUEST['edLocation'];
echo $Customer=$_REQUEST['edCustomer'];
echo $Contact=$_REQUEST['edContact'];
echo $StartDate=$_REQUEST['edStartDate'];
echo $EndDate=$_REQUEST['edEndDate'];
echo $ReminderStart=$_REQUEST['edReminderStart'];
echo $Description=$_REQUEST['edDescription'];
echo $status="Open";
echo $user=$_SESSION['salesrep'];

$sql34="update meetings set Title='$Subject',Location='$Location',Customer='$Customer',Contact='$Contact',StartDate='$StartDate',EndDate='$EndDate',ReminderStart='$ReminderStart',Status='$Status',user='$user' where ID='$MeetingID'";


mysql_query($sql34);

 echo $connection;
echo mysql_error($connection);

//Header('Location: meetings.php');

	
}


function cancelNewMeeting()

{
	include("dbconn.php");
	include("dbconn3.php");
	
echo $MeetingID=$_REQUEST['MeetingID'];
echo $Reason=$_REQUEST['canDescription'];


$sql35="update meetings set Reason='$Reason',Status='Cancelled' where ID='$MeetingID'";
	

mysql_query($sql35);

 echo $connection;
echo mysql_error($connection);

Header('Location: meetings.php');

	
}

function finishNewMeeting()

{
	include("dbconn.php");
	include("dbconn3.php");
	
echo $MeetingID=$_REQUEST['MeetingID'];
echo $Outcome=$_REQUEST['fnDescription'];


$sql35="update meetings set Outcome='$Outcome',Status='Completed' where ID='$MeetingID'";


mysql_query($sql35);

 echo $connection;
echo mysql_error($connection);

Header('Location: meetings.php');

	
}
function GetProformaNo()
{
	 	include("dbconn.php");
		include("dbconn3.php");
		$sql = "SELECT  PnNo from acctable where PnNo!='XXX'";

		$fila = mysql_query($sql);
		$fila2=mysql_fetch_row($fila);
	echo $fila2[0];
	
	

}

function SubmitProforma(){
 	include("dbconn.php");
		include("dbconn3.php");
	
echo $docno="PF".$_REQUEST['docno'];
echo $plaindocno=$_REQUEST['plaindocno'];

echo $description=$_REQUEST['description'];
echo $updatestate=$_REQUEST['updatestate'];


echo $tax=$_REQUEST['tax'];
echo $total=$_REQUEST['total'];
echo $leadsource=$_REQUEST['leadsource'];
echo $subtotal=$_REQUEST['subtotal'];
echo $salesrep=$_REQUEST['salesrep'];
echo $username=$_REQUEST['username'];
echo $custid=$_REQUEST['custid'];
echo $cashname=$_REQUEST['cashname'];
echo $customer=$_REQUEST['customer'];
echo $phone=$_REQUEST['phone'];
echo $telephone=$_REQUEST['telephone'];
echo $address=$_REQUEST['address'];
echo $address2=$_REQUEST['address2'];
echo $province=$_REQUEST['province'];
echo $city=$_REQUEST['city'];
echo $email=$_REQUEST['email'];
echo $depositcash=$_REQUEST['depositcash'];
echo $depositperiod=$_REQUEST['depositperiod'];
echo $discountamount=$_REQUEST['discount'];
echo $remarks=$_REQUEST['remarks'];
echo $rentalterm=$_REQUEST['rentalterm'];
echo $rentaldesc=$_REQUEST['rentaldesc'];
echo $terms=$_REQUEST['terms'];
echo $monthlyrental=$_REQUEST['monthlyrental'];
$dateinitiated=date("Y/m/d");

$getdesktopcount="select sum(qty) from invserialslines and StoreCode='001' and docno='$docno'";
$dcount= mysql_query($getdesktopcount);
$dssrow=mysql_fetch_row($dcount);
if ($dssrow[0]=="")
{
echo $desktopcount= 0;
}
else
{
	echo $desktopcount= $dssrow[0];
}

$getlaptopcount="SELECT sum(qty) FROM `invserialslines` WHERE StoreCode='003' and docno='$docno'";
$lcount= mysql_query($getlaptopcount);
$lssrow=mysql_fetch_row($lcount);
if ($lssrow[0]=="")
{
echo $laptopcount=0;
}
else{
	echo $laptopcount=$lssrow[0];
}

$getprojectorcount="select sum(qty) from invserialslines and StoreCode='007' and docno='$docno'";
$pcount= mysql_query($getprojectorcount);
$pssrow=mysql_fetch_row($pcount);
if ($pssrow[0]=="")
{
echo $projectorcount=0;
}
else{
	echo $projectorcount=$pssrow[0];
}

$getservercount="select sum(qty) from invserialslines and StoreCode='007' and docno='$docno'";
echo $sscount= mysql_query($getservercount);
$sssrow=mysql_fetch_row($sscount);

if ($sssrow[0]=="")
{
	echo $serverscount=0;
}
else
{
	echo $serverscount=$sssrow[0];
}

$connection;
echo $totalunits1=($projectorcount+desktopcount+laptopcount+serverscount);

$titlestring=$customer." ".$totalunits1." "."units";

$sqlop = "INSERT INTO opportunity(opportunity_name,sales_rep,username,customer,sales_type,status,rental_amount,units_sold,description,email,mobile,telephone,address,address2,province,city,laptops,projectors,desktops,printers,monitors,servers,networking,leads_source,contact_name,MaturityDate,DateInitiated,PipelineStage)
VALUES ('$titlestring', '$salesrep','$username', '$customer','$terms','Open','$rentalamount','$totalunits1','$description','$email','$phone','$telephone','$address','$address2','$province','$city','$laptopscount','$projectorscount','$desktopscount','$printers','$monitorscount','$serverscount','$networkingcount','$leadsource','$cashname','$maturitydate','$dateinitiated','Proposal')";



$sql = "INSERT INTO invserialsheader(docno,ddate,description,tax,total,subtotal,custid,cashname,customer,phone,telephone,address,address2,province,city,email,depositcash,depositperiod,discount,remarks,rentalterm,rentaldesc,sales_rep,username,Terms,MonthlyRental)
VALUES ('$docno','$dateinitiated', '$description','$tax','$total','$subtotal','$custid','$cashname','$customer','$phone','$telephone','$address','$address2','$province','$city','$email','$depositcash','$depositperiod','$discountamount','$remarks','$rentalterm','$rentaldesc','$salesrep','$username','$terms','$monthlyrental')";

$sql2="INSERT INTO customer(name,datecreated,email,mobile,telephone,organisationname,address,address2,city,province,sales_rep,username)
VALUES ('$cashname','$dateinitiated', '$email','$phone','$telephone','$customer','$address','$address2','$city','$province','$salesrep','$username')";

//$sql = "INSERT INTO invserialsheader(docno) VALUES ('$docno')";
mysql_query($sql);
mysql_query($sqlop);
  $connection;
echo mysql_error($connection);

mysql_query($sql2);

  $connection;
echo mysql_error($connection);

}


function SubmitProformaOnly(){
 	include("dbconn.php");
		include("dbconn3.php");
	
echo $docno="PF".$_REQUEST['docno'];
echo $plaindocno=$_REQUEST['plaindocno'];

echo $description=$_REQUEST['description'];
echo $updatestate=$_REQUEST['updatestate'];


echo $tax=$_REQUEST['tax'];
echo $total=$_REQUEST['total'];
echo $leadsource=$_REQUEST['leadsource'];
echo $subtotal=$_REQUEST['subtotal'];
echo $salesrep=$_REQUEST['salesrep'];
echo $username=$_REQUEST['username'];
echo $custid=$_REQUEST['custid'];
echo $cashname=$_REQUEST['cashname'];
echo $customer=$_REQUEST['customer'];
echo $phone=$_REQUEST['phone'];
echo $telephone=$_REQUEST['telephone'];
echo $address=$_REQUEST['address'];
echo $address2=$_REQUEST['address2'];
echo $province=$_REQUEST['province'];
echo $city=$_REQUEST['city'];
echo $email=$_REQUEST['email'];
echo $depositcash=$_REQUEST['depositcash'];
echo $depositperiod=$_REQUEST['depositperiod'];
echo $discountamount=$_REQUEST['discount'];
echo $remarks=$_REQUEST['remarks'];
echo $rentalterm=$_REQUEST['rentalterm'];
echo $rentaldesc=$_REQUEST['rentaldesc'];
echo $terms=$_REQUEST['terms'];
echo $monthlyrental=$_REQUEST['monthlyrental'];
$dateinitiated=date("Y/m/d");

$getdesktopcount="select sum(qty) from invserialslines and StoreCode='001' and docno='$docno'";
$dcount= mysql_query($getdesktopcount);
$dssrow=mysql_fetch_row($dcount);
if ($dssrow[0]=="")
{
echo $desktopcount= 0;
}
else
{
	echo $desktopcount= $dssrow[0];
}

$getlaptopcount="SELECT sum(qty) FROM `invserialslines` WHERE StoreCode='003' and docno='$docno'";
$lcount= mysql_query($getlaptopcount);
$lssrow=mysql_fetch_row($lcount);
if ($lssrow[0]=="")
{
echo $laptopcount=0;
}
else{
	echo $laptopcount=$lssrow[0];
}

$getprojectorcount="select sum(qty) from invserialslines and StoreCode='007' and docno='$docno'";
$pcount= mysql_query($getprojectorcount);
$pssrow=mysql_fetch_row($pcount);
if ($pssrow[0]=="")
{
echo $projectorcount=0;
}
else{
	echo $projectorcount=$pssrow[0];
}

$getservercount="select sum(qty) from invserialslines and StoreCode='007' and docno='$docno'";
echo $sscount= mysql_query($getservercount);
$sssrow=mysql_fetch_row($sscount);

if ($sssrow[0]=="")
{
	echo $serverscount=0;
}
else
{
	echo $serverscount=$sssrow[0];
}

$connection;
echo $totalunits1=($projectorcount+desktopcount+laptopcount+serverscount);

$titlestring=$customer." ".$totalunits1." "."units";

//$sqlop = "INSERT INTO opportunity(opportunity_name,sales_rep,username,customer,sales_type,status,rental_amount,units_sold,description,email,mobile,telephone,address,address2,province,city,laptops,projectors,desktops,printers,monitors,servers,networking,leads_source,contact_name,MaturityDate,DateInitiated,PipelineStage)
//VALUES ('$titlestring', '$salesrep','$username', '$customer','$terms','Open','$rentalamount','$totalunits1','$description','$email','$phone','$telephone','$address','$address2','$province','$city','$laptopscount','$projectorscount','$desktopscount','$printers','$monitorscount','$serverscount','$networkingcount','$leadsource','$cashname','$maturitydate','$dateinitiated','Proposal')";



$sql = "INSERT INTO invserialsheader(docno,ddate,description,tax,total,subtotal,custid,cashname,customer,phone,telephone,address,address2,province,city,email,depositcash,depositperiod,discount,remarks,rentalterm,rentaldesc,sales_rep,username,Terms,MonthlyRental)
VALUES ('$docno','$dateinitiated', '$description','$tax','$total','$subtotal','$custid','$cashname','$customer','$phone','$telephone','$address','$address2','$province','$city','$email','$depositcash','$depositperiod','$discountamount','$remarks','$rentalterm','$rentaldesc','$salesrep','$username','$terms','$monthlyrental')";

$sql2="INSERT INTO customer(name,datecreated,email,mobile,telephone,organisationname,address,address2,city,province,sales_rep,username)
VALUES ('$cashname','$dateinitiated', '$email','$phone','$telephone','$customer','$address','$address2','$city','$province','$salesrep','$username')";

//$sql = "INSERT INTO invserialsheader(docno) VALUES ('$docno')";
mysql_query($sql);
//mysql_query($sqlop);
  $connection;
echo mysql_error($connection);

mysql_query($sql2);

  $connection;
echo mysql_error($connection);

}




function AddProformaItem(){
 	include("dbconn.php");
		include("dbconn3.php");
	
echo $docno="PF".$_REQUEST['docno'];
echo $plaindocno=$_REQUEST['plaindocno'];

echo $vat=$_REQUEST['vat'];
echo $total=$_REQUEST['total'];



echo $description=$_REQUEST['itemdesc'];
echo $updatestate=$_REQUEST['updatestate'];
echo $store=$_REQUEST['store'];
echo $item=$_REQUEST['item'];
echo $qty=$_REQUEST['qty'];

echo $_REQUEST['description'];
echo $unitprice=$_REQUEST['unitprice'];
$dateinitiated=date("Y/m/d");

$sql = "INSERT INTO invserialslines(docno,ddate,description,storecode,itemcode,Qty,unitcost,tax,lntotal,extdescription)
VALUES ('$docno', '$dateinitiated','$description','$store','$item','$qty','$unitprice','$vat','$total','$description')";

mysql_query($sql);

  $connection;
echo mysql_error($connection);

$updatestring="update";

if ($updatestate==$updatestring)
{
	echo "updating   -";
 echo $newdocno=$plaindocno+1;
$sql2="update acctable set PnNo='".$newdocno."'";

mysql_query($sql2);
$connection;
echo mysql_error($connection);
}
}

function addOpportunities(){
	include("dbconn.php");
		include("dbconn3.php");


	//PROCESS Opportunities PROCESSES



$username=$_SESSION['username'];
$salesrep=$_SESSION['salesrep'];

echo $title=$_REQUEST['OpportunityName'];
echo $organisation=$_REQUEST['Organisation'];
$salestype=$_REQUEST['SalesType'];
$laptops=$_REQUEST['Laptops'];
$desktops=$_REQUEST['Desktops'];
$monitors=$_REQUEST['Monitors'];
$servers=$_REQUEST['Servers'];
$projectors=$_REQUEST['Projectors'];
$networking=$_REQUEST['Networking'];
$rentalamount=$_REQUEST['RentalAmount'];
$maturitydate=$_REQUEST['MaturityDate'];
$telephone=$_REQUEST['telephone'];
$mobile=$_REQUEST['mobile'];
$address=$_REQUEST['address'];
$address2=$_REQUEST['address2'];
$city=$_REQUEST['city'];
$province=$_REQUEST['province'];
$contactperson=$_REQUEST['ContactPerson'];
$contactemail=$_REQUEST['ContactEmail'];
$leadsource=$_REQUEST['LeadSource'];
$otherleadsorce=$_REQUEST['OtherLeadSource'];
$description=$_REQUEST['Description'];
$totalunits=$laptops+$desktops+$servers+$projectors;
$dateinitiated=date("Y/m/d");
//$maturityDate=date($_REQUEST['MaturityDate'],"Y/m/d");

$ActivityStreamDescription=$usernameFirstname." has just created a new opportunity called ".$title;
$AcivityType="AddOpportunity";

$sql = "INSERT INTO opportunity(opportunity_name,sales_rep,username,customer,sales_type,status,rental_amount,units_sold,description,email,mobile,telephone,address,address2,province,city,laptops,projectors,desktops,printers,monitors,servers,networking,leads_source,contact_name,MaturityDate,DateInitiated,PipelineStage)
VALUES ('$title', '$salesrep','$username', '$organisation','$salestype','Open','$rentalamount','$totalunits','$description','$contactemail','$mobile','$telephone','$address','$address2','$province','$city','$laptops','$projectors','$desktops','$printers','$monitors','$servers','$networking','$leadsource','$contactperson','$maturitydate','$dateinitiated','Initiation')";

$sql2="insert into activties (Description,Username,salesrep,activitytype) values('$ActivityStreamDescription','$username',$salesrep,$activitytype)";

$sql3="INSERT INTO customer(name,email,mobile,telephone,organisationname,address,address2,city,province,sales_rep)
VALUES ('$contactperson', '$contactemail','$mobile','$telephone','$organisation','$address','$address2','$city','$province','$username')";

mysql_query($sql);
mysql_query($sql2);
mysql_query($sql3);

 echo $connection;
echo mysql_error($connection);

Header('Location: opportunities.php');
}

function EditOpportunityData()
{
	include("dbconn.php");
	include("dbconn3.php");



	//PROCESS Opportunities PROCESSES



$usernameFirstname=$_SESSION['username'];
$salesrep=$_SESSION['salesrep'];

echo $id =$_REQUEST['edOpportunityID'];
echo $title=$_REQUEST['edOpportunityName'];
echo $organisation=$_REQUEST['edOrganisation'];
$salestype=$_REQUEST['edSalesType'];
$laptops=$_REQUEST['edLaptops'];
$desktops=$_REQUEST['edDesktops'];
$monitors=$_REQUEST['edMonitors'];
$servers=$_REQUEST['edServers'];
echo $projectors=$_REQUEST['edProjectors'];
$networking=$_REQUEST['edNetworking'];
$rentalamount=$_REQUEST['edRentalAmount'];
$maturitydate=$_REQUEST['edMaturityDate'];
$telephone=$_REQUEST['edTelephone'];
$mobile=$_REQUEST['edMobile'];
$city=$_REQUEST['edCity'];
$province=$_REQUEST['edProvince'];
$contactperson=$_REQUEST['edContactPerson'];
$contactemail=$_REQUEST['edContactEmail'];
$leadsource=$_REQUEST['edLeadSource'];
$description=$_REQUEST['edDescription'];
$totalunits=$laptops+$desktops+$servers+$projectors;


$ActivityStreamDescription=$usernameFirstname." has just edited a new opportunity called ".$title;


$sql = "update opportunity  set opportunity_name='$title',customer='$organisation',sales_type='$salestype',rental_amount='$rentalamount',description='$description',email='$contactemail',mobile='$mobile',telephone='$telephone',city='$city',province='$province',laptops='$laptops',projectors='$projectors',desktops='$desktops',printers='$printers',monitors='$monitors',servers='$servers',networking='$networking',leads_source='$leadsource',contact_name='$contactperson',MaturityDate='$maturityDate' where id='".$id."'";

$sql2="insert into activties (Description,Username) values('$ActivityStreamDescription','$usernameFirstname')";

mysql_query($sql);
mysql_query($sql2);
 
 echo $connection;
echo mysql_error($connection);

Header('Location: opportunities.php');
}

function CloseOpportunity()
{
	include("dbconn.php");
	include("dbconn3.php");



	//PROCESS Opportunities PROCESSES



$usernameFirstname=$_SESSION['username'];
$salesrep=$_SESSION['salesrep'];

$id=$_REQUEST['CloseOppID'];
$dateclosed=date("Y/m/d");
$ActivityStreamDescription=$usernameFirstname." has just successfully closed an opportunity called ".$title;

$sql = "update opportunity  set status='Closed',DateClosed='$dateclosed',PipelineStage='Closed' where status='Open' and id='".$id."'";
mysql_query($sql);

 $sql2="insert into activties (Description,Username) values('$ActivityStreamDescription','$usernameFirstname')";

 mysql_query($sql2);
 //mysql_query($sql304a);

 echo $connection;
echo mysql_error($connection);

Header('Location: opportunities.php');
}

function CancelOpportunity()
{
	include("dbconn.php");
	include("dbconn3.php");



	//PROCESS Opportunities PROCESSES

$salesrep=$_SESSION['salesrep'];

$usernameFirstname="$salesrep";
echo $id =$_REQUEST['CancelOppID'];
echo $reason=$_REQUEST['Reason'];
echo $datecancelled;
$ActivityStreamDescription=$usernameFirstname." has just  cancelled an opportunity called ".$title;

$sql = "update opportunity  set status='Cancelled',Reason='$reason',PipelineStage='Closed' where id='".$id."'";

$sql2="insert into activties (Description,Username) values('$ActivityStreamDescription','$usernameFirstname')";
mysql_query($sql2);

mysql_query($sql);
 
 echo $connection;
echo mysql_error($connection);

//Header('Location: opportunities.php');
}
?>