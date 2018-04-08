
	<script type="text/javascript" src="js/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/jszip.min.js"></script>
    <script type="text/javascript" src="js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="js/buttons.print.min.js"></script>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/dataTables.select.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="js/knockout-3.4.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/chart.min.js"></script>
	<script type="text/javascript" src="js/chart-data.js"></script>
	<script type="text/javascript" src="js/easypiechart.js"></script>
	<script type="text/javascript" src="js/easypiechart-data.js"></script>
	<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>




	<script type="text/javascript">
	var currentRowId;

	//Load Datatables
$(window).load(function() {
 $('#example').DataTable({
			    dom: 'Bfrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
		  select:true,
	columnDefs: [ {
            orderable: true,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]


	});

} );

$(document).ready(function (){
var chektable;

	
var pad='00000';
 /*
// Select your input element.
var number = document.getElementById('qty');
var number2 = document.getElementById('unitprice');

// Listen for input event on numInput.
number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58)
      || e.keyCode == 8)) {
        return false;
    }
}


number2.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58)
      || e.keyCode == 8)) {
        return false;
    }
}

*/
var rowracho;
$('#CloseOppForm input[type="checkbox"]').change(function() {
    alert("You just clicked checkbox with the name " + this.name)
});

	//Get Id of Selected DataTable Row
 $('#example tbody').on('click', '.select-checkbox', function(e){

      var $row = $(this).closest('tr');

	  var table=$('#example').DataTable();

      // Get row data
      var data = table.row($row).data();

      // Get row ID and Record Data TO use in Opportunities Edit Modal Form
     var rowId = data[0];

	 $("#edOpportunityID").val(data[0]);
	 $("#CloseOppID").val(data[0]);
	 $("#CancelOppID").val(data[0]);

	 $("#edOpportunityName").val(data[1]);
	 $("#edOrganisation").val(data[4]);
	 $("#edSalesType").val(data[5]);
	 $("#edRentalAmount").val(data[6]);
	 $("#edDescription").val(data[8]);
	 $("#edContactPerson").val(data[9]);
	$("#edContactEmail").val(data[10]);
	 $("#edContactPhone").val(data[11]);
	  $("#edLeadSource").val(data[12]).change();
	 $("#edMaturityDate").val(data[13]);

	$("#edLaptops").val(data[15]);
     $("#edDesktops").val(data[16]);
	  $("#edServers").val(data[17]);
	   $("#edProjectors").val(data[18]);
	    $("#edNetworking").val(data[15]);
		  $("#edMonitors").val(data[19]);


      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
      e.stopPropagation();


   });


   ///THIS IS FOR THE PROCESS PROFORMA ADD ITEMS SCRIPT
			var vatTotal=0;
			var grandTotal=0;
			var grandvat=0;
			var granddiscount=0;
			var granddeposit=0;
			
			var grandProformadocno;

		

		


		
//GET THE CURRENT DOCNO ADD 1 THEN UPDATE THE TABLE
    $("#generateProforma").click(function(event){
		
		chektable='update';
		
		//FUNCTION TO ADDING LEADING ZEROES TO PROFORMA NO
 function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}
 
		var actionstring="process.php?action=getProformaNo";
		
$.ajax({
           type: "GET",
           url: actionstring,
           data: $("#generateProformaForm").serialize(), // serializes the form's elements.
           success: function(data)
           { //window.location.href=actionstring;
              //alert(data); // show response from the php script.
			  var datafill=Number(data)+1;
			  var theData=pad(datafill,6);
			  
			//  alert(theData);
		//var ctxt = '' + data;

	
		//	  alert(theData);
			 
           }

         });
  		   
    event.preventDefault(); 
 
		 
});


////Adding Items to processphpproformaform

 //var frm = $('#additemform');
 //var actionstring="process.php?action=addProformaItem?itemdesc="+$("#itemdescription").val()+"?unitprice="+$("#unitprice").val()+"?qty="+$("#qty").val()+"?store="+$("#store").val()+"?total="+total;
 
// alert(actionstring);
 
 $("#additemform").submit(function(e) {


//FUNCTION TO ADDING LEADING ZEROES TO PROFORMA NO
 function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

 var theData;

var actionstring="process.php?action=getProformaNo";
$.ajax({
           type: "GET",
	       url: actionstring,
           data: $("#generateProformaForm").serialize(), // serializes the form's elements.
           success: function(data)
           { //window.location.href=actionstring;
              //alert(data); // show response from the php script.
		
			 // var datafill=Number(data)+1;
			//  var theData=pad(datafill,4);
			theData=data;
	


		
           },
		   
		   async:false
         });
  		   
    event.preventDefault(); 


if (chektable=='update')
{ 
 var datafill=Number(theData)+1;
			  var theData1=pad(datafill,6);
			  	currentProformaDoc=theData1;
				plaindocno=theData;
				grandProformadocno=currentProformaDoc;
alert (currentProformaDoc);
}
else
{
 var datafill=Number(theData);
			  var theData2=pad(datafill,6);
			  	currentProformaDoc=theData2;
					plaindocno=theData;
						grandProformadocno=currentProformaDoc;
alert (currentProformaDoc);
	
}
	
alert(chektable);


   
   var total = 1.15*($("#qty").val()*$("#unitprice").val());
   
var normaltotal =Number($("#qty").val()*$("#unitprice").val())-Number(granddiscount)+Number(granddeposit);
				 var vat=Number(total-normaltotal);
    var url="process.php?action=addProformaItem&itemdesc="+$("#itemdescription").val()+"&unitprice="+$("#unitprice").val()+"&qty="+$("#qty").val()+"&store="+$("#store").val()+"&total="+total+"&vat="+vat+"&docno="+currentProformaDoc+"&updatestate="+chektable+"&plaindocno="+plaindocno;

    //var url = "path/to/your/script.php"; // the script where you handle the form input.

$.ajax({
           type: "POST",
	       url: url,
           data: $("#additemform").serialize(), // serializes the form's elements.
           success: function(data,response)
           { //window.location.href=actionstring;
              //alert(data); // show response from the php script.
		
			 // var datafill=Number(data)+1;
			//  var theData=pad(datafill,4);
			
		alert(response);
		
           },
		   async:false
		   

         });
  e.preventDefault(); 
	  chektable='dontupdate';
    granddiscount=$("#DiscountAmount").val();
			   granddeposit=$("#DepositAmount").val();

            var store = $("#store").val();

            var itemdescription = $("#itemdescription").val();
            var unitprice = $("#unitprice").val();
             var qty = $("#qty").val();

			     var normaltotal =Number($("#qty").val()*$("#unitprice").val())-Number(granddiscount)+Number(granddeposit);
				 var vat=Number(total)-Number(normaltotal);
				  $("#granddiscount").html(Number(granddiscount));
				  $("#granddeposit").html(Number(granddeposit));

				  grandvat+=Number(vat);
				var   grandTot1=Number(total)-Number(granddiscount);
				var grandTot2=Number(grandTot1)+Number(granddeposit);
			   grandTotal+=Number(total)-Number(granddiscount)+Number(granddeposit);
			   //grandTotal+=grandTot2;
			   //grandTot1=0;
			 //  grandTot1=0;
			   
            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + store + "</td><td>" + itemdescription + "</td><td>" + unitprice + "</td><td>" + qty + "</td><td>" + total + "</td></tr>";



			$("#proforma tbody").append(markup);
		$("#grandtotal").html(grandTotal);
		$("#grandvat").html(grandvat);
		$("#unitprice").val("Unit Price");
		 $("#itemdescription").val("Description");
		 $("#qty").val("Qty");


 //var ids = $.map(table.rows('.selected').data(), function (item) {
   //   return item[0]
//  });
	

   // alert(table.rows('.selected').data().length + ' row(s) selected');
	

 
   //e.preventDefault(); // avoid to execute the actual submit of the form.

});
 
 //SUBMIT PROFORMA INVOICE
 
    $("#SubmitProforma").click(function(event){
		
		 $('#proformaBodyForm .submit').click();
	var grandexcl=Number(grandTotal)/Number(1.15);
	var tax=Number(grandvat);
	alert(grandProformadocno);
	alert(grandvat+" "+grandTotal+" "+grandexcl)
		
		
	
		

	
 //  return false;
   
   
   
		 	var actionstring="process.php?action=submitProforma&tax="+tax+"&total="+grandTotal+"&subtotal="+grandexcl+"&docno="+grandProformadocno+"&description="+$("#Details").val()+"&cashname="+$("#ContactName").val()+"&customer="+$("#Customer").val()+"&phone="+$("#PhoneNumber").val()+"&address="+$("#Address1").val()+"&address2="+$("#Address2").val()+"&province="+$("#province").val()+"&city="+$("#City").val()+"&email="+$("#email").val()+"&depositcash="+$("#DepositAmount").val()+"&depositperiod="+$("#DepositPeriod").val()+"&discount="+$("#DiscountAmount").val()+"&remarks="+$("#Remarks").val()+"&rentalterm="+$("#RentalTerm").val()+"&rentaldesc="+$("#RentalDescription").val();
  event.preventDefault();
  
			$.ajax({
           type: "POST",
	       url: actionstring,
           data: $("#proformaBodyForm").serialize(), // serializes the form's elements.
           success: function(data,response)
           { //window.location.href=actionstring;
              //alert(data); // show response from the php script.
		
			 // var datafill=Number(data)+1;
			//  var theData=pad(datafill,4);
			theData=data;
			
			alert(data);
			alert(response);


		
           }
	
		
         });
		 	  
		});
  


        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("#proforma tbody").find('input[name="record"]').each(function(){
            	 $(this).parents("tbody").empty();
					$("#grandtotal").html("");
		$("#grandvat").html("");
		$("#granddiscount").html("");
$("#granddeposit").html("");
		grandTotal=0;
			 grandvat=0

				if($(this).is(":checked")){



                }

            });
        });



});

//Allow Multiple Modal Dialogs on same page
$(document).on('show.bs.modal', '.modal', function () {
    if ($(".modal-backdrop").length > -1) {
        $(".modal-backdrop").not(':first').remove();
    }
});
///
$( "input" ).on( "click", function() {
  $( "#log" ).html( $( "input:checked" ).val() + " is checked!" );
});

//Display Range value
function updateTextInput(val) {
          document.getElementById('textInput').value=val;
        }


		///Prevent Negative Number Entry in Number Fields




</script>

</body>
</html>
