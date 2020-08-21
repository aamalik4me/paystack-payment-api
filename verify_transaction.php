<head>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'jaiz_user_management_system');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

$reference = $_REQUEST['reference'];
if (empty($reference) || !$reference || $reference<0) {
	header("location: payment.php");
}
 $sql=mysqli_query($con,"select paidreference from userpayment where paidreference='$reference'");
            $row=mysqli_num_rows($sql);
            if($row>0)
            {
                //echo "<script>alert('Already Paid Successfully');</script>";

                 echo '
                    <script type="text/javascript">
                    $(document).ready(function(){
                    swal({title:"Done", 
                    text:"This Payment already Exist in our Account", 
                    icon:"warning", 
                    buttons: true, 
                    dangerMode: true,
                    
                    })
                    });
                    </script>
                    '; 
            } else{ 
 				$msg=mysqli_query($con,"insert userpayment (paidreference) values('$reference')");
				echo "$reference";

				 if($msg)
            {
               // echo "<script>alert('Register successfully');</script>";
               
                 echo '
                <script type="text/javascript">
                $(document).ready(function(){
                swal({title:"Done", 
                text:"Paid  successfully", 
                icon:"success", 
                buttons: true, 
                dangerMode: true
                })
                });
                </script>
                ';
            }
            }




?>
