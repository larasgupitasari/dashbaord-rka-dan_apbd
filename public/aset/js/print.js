<script>
$(document).ready(function() {  
$('#print').DataTable( {
 dom: 'Bfrtip',
 buttons: [
 'copyHtml5',
 'excelHtml5',
 'csvHtml5',
 'pdfHtml5'
 ]
 } );
} );
</script>