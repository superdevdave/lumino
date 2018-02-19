<?php 
//start session



$action = $_GET['action'];


echo"Hello";

echo $action;



switch($action) {
	case 'addOpp':
	
	echo "Pass1";
	
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
	
	case 'update-status':
		updateStatus();
	break;
	
	case 'change-pass':
		changePass();
	break;
			
	case 'logOut':
		logOut();
	break;		
	
}//switch


function addOpportunities(){
	include("dbconn.php");
	
	echo $connection;
	echo"pass 2";

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




$sql = "INSERT INTO opportunity(opportunity_name,sales_rep,customer,sales_type,status,rental_amount,units_sold,description,email,mobile,laptops,projectors,desktops,printers,monitors,servers,networking,leads_source,contact_name,MaturityDate)
VALUES ('$title', '$usernameFirstname', '$organisation','$salestype','Open','$rentalamount','$totalunits','$description','$contactemail','$contactphone','$laptops','$projectors','$desktops','$printers','$monitors','$servers','$networking','$leadsource','$contactperson'$maturitydate)";
mysql_query($sql);
 
 echo $connection;
echo mysql_error($connection);

Header('Location: opportunities.php');
}

function EditOpportunityData()
{
	include("dbconn.php");
	



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



$sql = "update opportunity  set opportunity_name='$title',customer='$organisation',sales_type='$salestype',rental_amount='$rentalamount',description='$description',email='$contactemail',mobile='$contactphone',laptops='$laptops',projectors='$projectors',desktops='$desktops',printers='$printers',monitors='$monitors',servers='$servers',networking='$networking',leads_source='$leadsource',contact_name='$contactperson',MaturityDate='$MaturityDate' where id='".$id."'";
mysql_query($sql);
 
 echo $connection;
echo mysql_error($connection);

Header('Location: opportunities.php');
}

function CloseOpportunity()
{
	include("dbconn.php");
	



	//PROCESS Opportunities PROCESSES



$usernameFirstname="Joy Napata";
$id=$_REQUEST['CloseOppID'];
$dateclosed;


$sql = "update opportunity  set status='Closed' where status='Open' and id='".$id."'";
mysql_query($sql);
 
 echo $connection;
echo mysql_error($connection);

Header('Location: opportunities.php');
}

function CancelOpportunity()
{
	include("dbconn.php");
	



	//PROCESS Opportunities PROCESSES



$usernameFirstname="Joy Napata";
$id =$_REQUEST['CancelOppID'];
$reason=$_REQUEST['Reason'];
$datecancelled;
$sql = "update opportunity  set status='Cancelled',Reason='$reason' where id='".$id."'";
mysql_query($sql);
 
 echo $connection;
echo mysql_error($connection);

Header('Location: opportunities.php');
}
?>