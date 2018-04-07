<?php
//start session



$action = $_REQUEST['action'];
//echo $_REQUEST['itemdesc'];
//echo $_REQUEST['qty'];
//echo $_REQUEST['total'];
//echo $_REQUEST['description'];
//echo $_REQUEST['unitprice'];



$action;



switch($action) {
	case 'addOpp':
	

	
	addOpportunities();
	break;
	
	case 'editOpp':
	EditOpportunityData();
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
	case'submitProforma':
	SubmitProforma();
	break;
	case 'logOut':
		logOut();
	break;		

}//switch

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


echo $tax=$_REQUEST['vat'];
echo $total=$_REQUEST['total'];



echo $subtotal=$_REQUEST['subtotal'];

echo $custid=$_REQUEST['custid'];
echo $cashname=$_REQUEST['cashname'];
echo $customer=$_REQUEST['customer'];
echo $phone=$_REQUEST['phone'];
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


$sql = "INSERT INTO invserialsheader(docno,description,tax,total,subtotal,custid,cashname,customer,phone,address,address2,province,city,email,depositcash,depositperiod,discount,remarks,rentalterm,rentaldesc)
VALUES ('$docno', '$description','$tax','$total','$subtotal','$custid','$cashname','$customer','$phone','$address','$address2','$province','$city','$email','$depositcash','$depositperiod','$discountamount','$remarks','$rentalterm','$rentaldesc')";

//$sql = "INSERT INTO invserialsheader(docno) VALUES ('$docno')";
mysql_query($sql);

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

$sql = "INSERT INTO invserialslines(docno,description,storecode,itemcode,Qty,unitcost,tax,lntotal,extdescription)
VALUES ('$docno', '$description','$store','$item','$qty','$unitprice','$vat','$total','$description')";

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



$usernameFirstname="Joy Napata";

echo $title=$_REQUEST['OpportunityName'];
echo $organisation=$_REQUEST['Organisation'];
$salestype=$_REQUEST['SalesType'];
$laptops=$_REQUEST['Laptops'];
$desktops=$_REQUEST['Desktops'];
$monitors=$_REQUEST['Monitors'];
$servers=$_REQUEST['Servers'];
echo $projectors=$_REQUEST['Projectors'];
$networking=$_REQUEST['Networking'];
$rentalamount=$_REQUEST['RentalAmount'];
$maturitydate=$_REQUEST['MaturityDate'];
$contactphone=$_REQUEST['ContactPhone'];
$contactperson=$_REQUEST['ContactPerson'];
$contactemail=$_REQUEST['ContactEmail'];
$leadsource=$_REQUEST['LeadSource'];
$otherleadsorce=$_REQUEST['OtherLeadSource'];
$description=$_REQUEST['Description'];
$totalunits=$laptops+$desktops+$servers+$projectors;

$ActivityStreamDescription=$usernameFirstname." has just created a new opportunity called ".$title;


$sql = "INSERT INTO opportunity(opportunity_name,sales_rep,customer,sales_type,status,rental_amount,units_sold,description,email,mobile,laptops,projectors,desktops,printers,monitors,servers,networking,leads_source,contact_name,MaturityDate)
VALUES ('$title', '$usernameFirstname', '$organisation','$salestype','Open','$rentalamount','$totalunits','$description','$contactemail','$contactphone','$laptops','$projectors','$desktops','$printers','$monitors','$servers','$networking','$leadsource','$contactperson','$maturitydate')";
$sql2="insert into activties (Description,Username) values('$ActivityStreamDescription','$usernameFirstname')";
mysql_query($sql);
mysql_query($sql2);

 echo $connection;
echo mysql_error($connection);

Header('Location: opportunities.php');
}

function EditOpportunityData()
{
	include("dbconn.php");
	include("dbconn3.php");



	//PROCESS Opportunities PROCESSES



$usernameFirstname="Joy Napata";
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
$contactphone=$_REQUEST['edContactPhone'];
$contactperson=$_REQUEST['edContactPerson'];
$contactemail=$_REQUEST['edContactEmail'];
$leadsource=$_REQUEST['edLeadSource'];
$description=$_REQUEST['edDescription'];
$totalunits=$laptops+$desktops+$servers+$projectors;

$ActivityStreamDescription=$usernameFirstname." has just edited a new opportunity called ".$title;


$sql = "update opportunity  set opportunity_name='$title',customer='$organisation',sales_type='$salestype',rental_amount='$rentalamount',description='$description',email='$contactemail',mobile='$contactphone',laptops='$laptops',projectors='$projectors',desktops='$desktops',printers='$printers',monitors='$monitors',servers='$servers',networking='$networking',leads_source='$leadsource',contact_name='$contactperson',MaturityDate='$maturityDate' where id='".$id."'";
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



$usernameFirstname="Joy Napata";
$id=$_REQUEST['CloseOppID'];
$dateclosed;
$ActivityStreamDescription=$usernameFirstname." has just successfully closed an opportunity called ".$title;

$sql = "update opportunity  set status='Closed' where status='Open' and id='".$id."'";
mysql_query($sql);

 $sql2="insert into activties (Description,Username) values('$ActivityStreamDescription','$usernameFirstname')";
mysql_query($sql2);
 echo $connection;
echo mysql_error($connection);

Header('Location: opportunities.php');
}

function CancelOpportunity()
{
	include("dbconn.php");
	include("dbconn3.php");



	//PROCESS Opportunities PROCESSES



$usernameFirstname="Joy Napata";
echo $id =$_REQUEST['CancelOppID'];
echo $reason=$_REQUEST['Reason'];
echo $datecancelled;
$ActivityStreamDescription=$usernameFirstname." has just  cancelled an opportunity called ".$title;

$sql = "update opportunity  set status='Cancelled',Reason='$reason' where id='".$id."'";

$sql2="insert into activties (Description,Username) values('$ActivityStreamDescription','$usernameFirstname')";
mysql_query($sql2);

mysql_query($sql);
 
 echo $connection;
echo mysql_error($connection);

//Header('Location: opportunities.php');
}
?>