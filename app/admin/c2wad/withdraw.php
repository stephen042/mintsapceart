<?php
session_start();


include "../../conn.php";
include "../../config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_SESSION['uid'])){
	



}
else{


	header("location:../c2wadmin/signin.php");
}

if(isset($_POST['complete'])){
	
	$tnx = $_POST['tnx'];
	$moni = $_POST['moni'];
	$email = $_POST['email'];
  $umode = $_POST['umode'];
  $uwallet = $_POST['wallet'];
	

		
		$sql1 = "UPDATE btc SET status = 'successful'  WHERE id = '$tnx'";
		
		$sql2= "SELECT * FROM btc WHERE id = '$tnx'";
  $result2 = mysqli_query($link,$sql2);
  if(mysqli_num_rows($result2) > 0){
   $row = mysqli_fetch_assoc($result2);
   $row['status'];
 
  }
  
  $sqlus= "SELECT * FROM users WHERE email = '$email'";
  $resultus = mysqli_query($link,$sqlus);
  if(mysqli_num_rows($resultus) > 0){
   $rowus = mysqli_fetch_assoc($resultus);
   $usernamewtc = $rowus['fname'];
 
  }
 
if(isset($row['status']) &&  $row['status']== "successful"){
	
	$msg = "Transaction already successful!";

}else{
		
		if(mysqli_query($link, $sql1)){
	
		$msg = "transaction approved successfully and investor is credited!";
if($msg = "transaction approved successfully and investor is credited!"){
		
		
		
		include_once "PHPMailer/PHPMailer.php";
    require_once 'PHPMailer/Exception.php';
    
    $mail= new PHPMailer();
     $mail->setFrom($emaila);
   $mail->FromName = $name;
    $mail->addAddress($email, $usernamewtc);
    $mail->Subject = "Withdrawal Request Approval";
    $mail->isHTML(true);
    $mail->Body = '
     <table style="color:rgb(0,0,0);font-family:&quot;Times New Roman&quot;;font-size:medium;font-style:normal;font-variant-ligatures:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(0,23,54);text-decoration-style:initial;text-decoration-color:initial" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#001736">
   <tbody>
      <tr>
         <td valign="top" align="center">
            <table width="650" cellspacing="0" cellpadding="0" border="0">
               <tbody>
                  <tr>
                     <td style="width:650px;min-width:650px;font-size:0pt;line-height:0pt;margin:0px;font-weight:normal;padding:55px 0px">
                        <div style="text-align:center">
                           <img src="https://'.$bankurl.'/admin/c2wad/logo/'.$logo.'" style="height:240!important;width:338px;margin-bottom:20px" tabindex="0">
                           
                        </div>
                        <table style="width:650px;margin:0px auto" cellspacing="0" cellpadding="0" border="0">
                           <tbody>
                              <tr>
                                 <td style="padding-bottom:10px">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                       <tbody>
                                          <tr>
                                             <td style="padding:60px 30px;border-radius:26px 26px 0px 0px" bgcolor="#000036">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                   <tbody>
                                                      <tr>
                                                         <td style="color:rgb(255,255,255);font-family:Muli,Arial,sans-serif;font-size:20px;line-height:46px;padding-bottom:25px;font-weight:bold">Hi '.$fname.' ,</td>
                                                      </tr>
                                                      <tr>
                                                         <td style="color:rgb(193,205,220);font-family:Muli,Arial,sans-serif;font-size:20px;line-height:30px;padding-bottom:25px">
                                                            <div>Your withdrawal request has been approved. Thanks for choosing us<b> .<br></b></div>
                                                            <div><b><br></b></div>
                                                            <div><b>Details :<br></b></div>
                                                            <div><br></div>
                                                            <div>Amount : '.$moni.' ETH</div>
                                                            <div>Mode : '.$umode.'</div>
                                                            <div>Ethereum Address: '.$uwallet.'</div>
                                                            <div><br></div>
                                                            <div><br></div>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table style="width:650px;margin:0px auto" cellspacing="0" cellpadding="0" border="0">
                           <tbody>
                              <tr>
                                 <td style="padding:50px 30px;border-radius:0px 0px 26px 26px" bgcolor="#000036">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                       <tbody>
                                          <tr>
                                             <td style="color:rgb(0,153,255);font-family:Muli,Arial,sans-serif;font-size:18px;line-height:30px;text-align:center;padding-bottom:10px">© '.$cy.' '.$name.'. All Rights Reserved.</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
   </table>
   ';
    
    
    if($mail->send()){
  
      
    }
    
  
} else {
    $msg = "transaction was not approved! ";
}
		}
}
}



if(isset($_POST['delete'])){
	
	$tnx = $_POST['tnx'];
	
$sql = "DELETE FROM btc WHERE id='$tnx'";

if (mysqli_query($link, $sql)) {
    $msg = "Transaction deleted successfully!";
} else {
    $msg = "Transaction not deleted! ";
}
}
	
   
 


include 'header.php';





?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
  

  <link rel="stylesheet" href=" https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.6/css/buttons.jqueryui.min.css">



  

  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css">
  <link rel="stylesheet" href="">
 
  
    
    



  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
 

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.jqueryui.min.js"></script>
   
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
  
     
 <div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">



   <style>
 
	
   </style>


<div style="width:100%">
          <div class="box box-default">
            <div class="box-header with-border">

	<div class="row">
	

		 <h2 class="text-center">WITHDRAWAL MANAGEMENT</h2>
		  </br>

</br>
 <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
         
<div class="col-md-12 col-sm-12 col-sx-12">
               <div class="table-responsive">
                     <table class="display"  id="example">



					<thead>

						<tr class="info">
						<th>Email</th>
            <th>Mode</th>
						<th>Wallet Address</th>
						<th style="display:none;"></th>
						<th style="display:none;"></th>
            <th style="display:none;"></th>
						<th style="display:none;"></th>
								<th style="display:none;"></th>
			
							<th>Amount</th>
                             <th>Status</th>
							<th>Date</th>
                                <th>Action</th>
                                <th>Action</th>
                                

						</tr>
					</thead>



					<tbody>
					<?php $sql= "SELECT * FROM btc WHERE type = 'Withdrawal' ORDER BY id DESC";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){   

$row['status'];
   
   
if(isset($row['status']) &&  $row['status']== 'successful'){
	
	
	$sec = 'Successful &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-check" ></i>';

}else{
$sec ='Pending &nbsp;&nbsp;<i class="fa  fa-refresh" style=" font-size:20px;color:red"></i>';

}


				  ?>

						<tr class="primary">
						<form action="withdraw.php" method="post">
						
                          <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['mode'];?></td>
                            <td><?php echo $row['account'];?></td>
						  
						  <td style="display:none;"><input type="hidden" name="email" value="<?php echo $row['email'];?>"> </td>
							<td style="display:none;"><input type="hidden" name="moni" value="<?php echo $row['usd'];?>"> </td>
              <td style="display:none;"><input type="hidden" name="umode" value="<?php echo $row['mode'];?>"> </td>
							
							<td style="display:none;"><input type="hidden" name="tnx" value="<?php echo $row['id'];?>"> </td>
							
								<td style="display:none;"><input type="hidden" name="wallet" value="<?php echo $row['account'];?>"> </td>
						  
							<td><?php echo $row['usd'];?> ETH</td>
							<td><?php echo $sec ;?></td>
              
              <td><?php echo $row['date'];?></td>
			  
                           <td><button class="btn btn-primary" type="submit" name="complete" ><span class="glyphicon glyphicon-check"> Approve</span></button></td>
							
    <td><button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> Delete</span></button></td>
</form>


						</tr>
					  <?php
 }
			  }
			  ?>
					</tbody>



				</table>
</div>
          </div>

		  </div>
          <!-- /top tiles -->

          </div>

   

    </body>
              </div>
            </div>


              </div>


          <br />







    </body>
              </div>
            </div>





          </section>

   </div>
  </div>
</div>


  </body>
</html>

     
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
       
    } );
    

    table.buttons().container()
        .insertBefore( '#example_filter' );

        table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-12:eq(0)' );
} );
</script>






<script>
$(document).ready(function () {
        $('#table')
                .dataTable({
                    "responsive": true,
                    
                });

				
    });



				</script>

