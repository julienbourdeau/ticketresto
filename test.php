
<?php	require_once('lib/DBTools.php');
		require_once('lib/functions.php'); 
		

		//require_once 'sql/op_tables_vars.php';
		
		//add_option("LAST_UPDATE", date('d-m-Y'));
?>


<?php include('head.php'); ?>
<?php include 'header.php'; ?>

		<div id="myID" class="myClass" rel="myrel">test</div>

<?php include 'footer.php'; ?>

$(document).ready(function(){ 
     regFunct();
 });

function regFunct(){
     alert($("div#myID").attr("rel"));
 }