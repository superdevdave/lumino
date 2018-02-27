
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
	  $("#edLeadSource").val(data[12]);
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
			
    $(".add-row").click(function(event){
		
	
		  granddiscount=$("#DiscountAmount").val();
			   granddeposit=$("#DepositAmount").val();
			   
            var store = $("#store").val();
			
            var itemdescription = $("#itemdescription").val();
            var unitprice = $("#unitprice").val();
             var qty = $("#qty").val();
               var total = 1.15*($("#qty").val()*$("#unitprice").val());
			     var normaltotal =($("#qty").val()*$("#unitprice").val())-granddiscount+granddeposit;
				  vat=(total-normaltotal);
				  $("#granddiscount").html(granddiscount);
				  $("#granddeposit").html(granddeposit);
				  grandvat+=vat;
			   grandTotal+=total-granddiscount+granddeposit;
            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + store + "</td><td>" + itemdescription + "</td><td>" + unitprice + "</td><td>" + qty + "</td><td>" + total + "</td></tr>";

		
		
			$("table tbody").append(markup);
		$("#grandtotal").html(grandTotal);
		$("#grandvat").html(grandvat);
		
		$("#unitprice").val("Unit Price");
		 $("#itemdescription").val("Description");
		 $("#qty").val("Qty");
		
        });

		$('#button').click(function () {
    var ids = $.map(table.rows('.selected').data(), function (item) {
        return item[0]
    });
    console.log(ids)
    alert(table.rows('.selected').data().length + ' row(s) selected');
});


        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){

                    $(this).parents("tr").remove();
				
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
