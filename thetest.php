<?php

//include("head.php");

include("dbconn.php");
include("dbconn3.php");


 $salesrep=$_SESSION['salesrep'];
 
  $dailydate2=date("n");

  //MY SalesPipeline
  
$getTotalOpenDeals="Select count(id) from opportunity where Status='Open' and sales_rep='$salesrep'";
$resulta8=mysql_query($getTotalOpenDeals);
$OpenDealsrow=mysql_fetch_row($resulta8);
echo $_SESSION['TotalOpenDeals']=$OpenDealsrow[0];

$getInitiatedDeals="Select count(id) from opportunity where PipelineStage='Initiaion' and sales_rep='$salesrep'";
$resulta9= mysql_query($getInitiatedDeals);
$Initrow=mysql_fetch_row($resulta9);
echo $_SESSION['InitiatedDeals']=$InitRow[0];
echo $_SESSION['InitiatedDealsPercentage']=($_SESSION['InitiatedDeals']/$_SESSION['TotalOpenDeals'])*100;
$connection;

$getQuotedDeals="Select count(id) from opportunity where PipelineStage='Proposal' and sales_rep='$salesrep'";
$resulta10= mysql_query($getQuotedDeals);
$Quotedrow=mysql_fetch_row($resulta10);
echo $_SESSION['QuotedDeals']=$Quotedrow[0];
echo $_SESSION['QuotedDealsPercentage']=($_SESSION['QuotedDeals']/$_SESSION['TotalOpenDeals'])*100;
$connection;

$getNegotiatedDeals="Select count(id) from opportunity where PipelineStage='Negotiation' and sales_rep='$salesrep'";
$resulta11= mysql_query($getNegotiatedDeals);
$Negotiatedrow=mysql_fetch_row($resulta11);
echo $_SESSION['NegotiatedDeals']=$Quotedrow[0];
echo $_SESSION['NegotiatedDealsPercentage']=($_SESSION['NegotiatedDeals']/$_SESSION['TotalOpenDeals'])*100;
$connection;
  
  
$getSignedDeals="Select count(id) from opportunity where PipelineStage='Signed' and sales_rep='$salesrep'";
$resulta11= mysql_query($getSignedDeals);
$Signedrow=mysql_fetch_row($resulta12);
echo $_SESSION['SignedDeals']=$Signedrow[0];
echo $_SESSION['SignedDealsPercentage']=($_SESSION['SignedDeals']/$_SESSION['TotalOpenDeals'])*100;
$connection;
  
echo mysql_error($connection);
  ?>