<?php

include("head.php");

include("dbconn3.php");
?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

      
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home color-red"></em>
				</a></li>
				<li class="active">Group Reports</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
		
				
				
				<h1 class="page-header">Group Reports</h1>
				
 <div id="fullscreen_bg" class="fullscreen_bg"/>
 <form class="form-signin">
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
        
        <div class="panel panel-default">
        
        <div class="panel panel-primary">
        
           <form id="groupreportform">
            <div class="text-center">
                <h3 style="color:#2C3E50">Group Reports</h3>
				 <h4> <label for="Choose Report"  style="color:#E74C3C">Choose Sales Rep</label></h4>
  <div class="form-group">
   
    <label  for="SalesType">Sales Rep:</label>
 <select  required class="form-control" id="salesrepwacho">
      <option selected>All</option>
<?php 
include ("dbconn.php");
include ("dbconn3.php");
$queryuser = "SELECT Fullname,Username FROM users where id>0"; //You don't need a ; like you do in SQL
$_SESSION['resultReportUser'] = mysql_query($queryuser);
$connection;

while($row = mysql_fetch_array($_SESSION['resultReportUser'])){   //Creates a loop to loop through results
							
		echo "<option value=\"".$row['username']."\">".$row['Fullname']."</option>";  

		}
	 
	 ?>
      
    </select> 
  </div>
                <h4> <label for="Choose Report"  style="color:#E74C3C">Choose Report</label></h4>
               
                           
                <h5><label for="Choose Report" style="color:#E74C3C"> Time :</label>
                             <input id="a" type="radio" name="reporttype" value="Daily">Daily 
                             <input id="b" type="radio" name="reporttype" value="Weekly">Weekly(This Week)
                             <input id="c" type="radio" name="reporttype" value="Monthly">Monthly(This Month)
							  <input id="d" type="radio" name="reporttype" value="Custom">Custom Range</h5>
                                
                                <div class="customer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        <input id="date" name="date" type="date" class="form-control" placeholder="Date"/>
                                    </div>
									</div>
							
									 <div class="customer2">
									 		<h4>From</h4>
									<div class="input-group">
                                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></span>
                                        <input id="fromdate"type="date" class="form-control" placeholder="From"/>
                                    </div>
									<h4>To</h4>
									<div class="input-group">
                                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        <input id="todate" type="date" class="form-control" placeholder="To" />
                                    </div>
                                </div>
                </br><button type="button" id="submitreportquery" class="btn btn-primary btn-lg btn3d"><span class="glyphicon glyphicon-search"></span> View</button> 
				
            </div>       
</form>			
        <div class="panel-body">    
 
  
    
       </div>
        </div>
   

</form>
<script type="text/javascript">

$("#submitreportquery").click(function(event){	

var reportType=$('input[name=reporttype]:checked').val();
var dailydate=$("#date").val();
var fromdate=$("#fromdate").val();
var todate=$("#todate").val();

 $('#groupreportform .submit').click();
	//alert("Testing Tesing 12");
	 var actionstring="viewgroupreport.php?reporttype="+reportType+"&ddate="+dailydate+"&fromdate="+fromdate+"&todate="+todate;
	 window.location.href=actionstring;
/*$.ajax({
           type: "GET",
	       url: actionstring,
           data: $("#individualreportform").serialize(), // serializes the form's elements.
           success: function(data)
           { //
              alert(data); // show response from the php script.
		
			 // var datafill=Number(data)+1;
			//  var theData=pad(datafill,4);
			theData=data;
	


		
           },
		   
		   async:false
         });
  		   */
 //   event.preventDefault(); 
	
	});
	
 $(document).ready(function(){
	 
	 


 
        $(".customer").toggle();
		 $(".customer2").toggle();
    
    
});

 $(document).ready(function(){
    $("#a").click(function(){
        $(".customer").show();
		 $(".customer2").hide();
    });
	  $("#d").click(function(){
        $(".customer2").show();
		 $(".customer").hide();
    });
});
    
       $(document).ready(function(){
    $("#b").click(function(){
        $(".customer").hide();
		 $(".customer2").hide();
    });
});

$(document).ready(function(){
    $("#c").click(function(){
        $(".customer").hide();
		 $(".customer2").hide();
    });
});
 
</script>
<?php
include("footer.php");




?>