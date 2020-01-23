
<<-------------------------- MYSQL-PHP OPERATION---------------------------------------------------------->>
<<-------------------------- MYSQL-PHP OPERATION---------------------------------------------------------->>

//SELECT OPERATIONS

$sql="SELECT id, user_id, password, name FROM investor_signin WHERE user_id = '".$user_id."'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if($count == 1){
$row = mysqli_fetch_assoc($result);

//INSERT OPERATIONS

if( $user_name_err  =="" && $user_name != "" &&
    $user_first_name_err =="" && $user_first_name != "" &&
    $user_last_name_err =="" && $user_last_name != "" &&
    $user_email_err  =="" && $user_email != "" &&
    $user_role_err =="" && $user_role != "" && $user_match_err == "" ){

    $date = date("Y-m-d H:i:s");

  $q1 = "INSERT INTO admin_user(user_name,user_first_name,user_last_name,user_email,user_password,user_role,created_at) VALUES ('$user_name','$user_first_name','$user_last_name','$user_email','$user_password','$user_role','$date')";

  $insert = mysqli_query($conn, $q1);

  if($insert){
   $success_message = "User account has been created successfully  !!";

 } else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}











//DELETE OPERATIONS

if(isset($_REQUEST['id'])) {
$sql = "DELETE FROM admin_user WHERE admin_user_id='".$_REQUEST['id']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
if($resultset) {
header("Location: admin_users.php");
exit();
}
}










//UPDATE OPERATIONS

if( $user_name_err  =="" && $user_name != "" &&
    $user_first_name_err =="" && $user_first_name != "" &&
    $user_last_name_err =="" && $user_last_name != "" &&
    $user_email_err  =="" && $user_email != "" &&
    $user_role_err =="" && $user_role != "" ){

  $date = date("Y-m-d H:i:s");

$q2 = "UPDATE admin_user
SET user_name ='".$user_name."',
user_first_name = '".$user_first_name."',
user_last_name = '".$user_last_name."',
user_email = '".$user_email."',
user_password = '".$user_password."',
user_role = '".$user_role."',
created_at = '".$date."' WHERE admin_user_id='".$_REQUEST['edit_id']."'";
$update = mysqli_query($conn, $q2);

if($update){
 header("Location: admin_users.php") ;
 exit();
 } else {
    echo "Error:<br>" . mysqli_error($conn);
}
}




SELECT


 <div class="form-control" style="margin:10px 0px;">
             <a href="#" class="mylink">Select City</a>
            
              <select name="location">
                <?php
                include("admin_connection.php");
                $f1 = "SELECT * FROM location";
                $result = mysqli_query($conn, $f1); 

                if (mysqli_num_rows($result) > 0) {
                 while($row = mysqli_fetch_assoc($result)) {

                  echo '<option value="'.trim($row['location_id']).'">'.$row['location_name'].'</option>';
                }
              } 
              ?>
            </select>



SELECT



          <a style="margin-left:20px;"class="mylink">Select Scheme</a>

            <select name="scheme">
                <?php
              
                $f1 = "SELECT * FROM investment_scheme";
                $result = mysqli_query($conn, $f1); 

                if (mysqli_num_rows($result) > 0) {
                 while($row = mysqli_fetch_assoc($result)) {

                  echo '<option value="'.trim($row['scheme_id']).'">'.$row['scheme_name'].'</option>';
                }
              } 
              ?>
            </select>



 <div class="form-group">
         <label>Enter Password</label>
         <input type="password" name="password" id="password" class="form-control" maxlength="20"/>
         <span id="error_password" class="text-danger"></span>
       </div>





<<-------------------------- JQUERY ---------------------------------------------------------->>
<<-------------------------- JQUERY ---------------------------------------------------------->>
<<-------------------------- JQUERY ---------------------------------------------------------->>
<<-------------------------- JQUERY ---------------------------------------------------------->>

//Jquery form validation 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

//Address 1 
 var ad_filter =  /^[0-9a-zA-Z]+$/;

//User ID Validation
  var u_filter = /^[0-9a-zA-Z]+$/;

//Email Validation
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

//First Name Validation (ONLY ALPHABET)
  var f_filter =  /^[a-zA-Z]+$/;

//NUMBER VALIDATION
var ia_filter = /^[0-9]+$/;

//MOBILE NUMBER VALIDATION 
  var m_filter = /^\d{10}$/;

//NUMBER LIMITATION
 var zip_filter = /^\d{6}$/;

//CAPITAL ALPHABET AND NUMBER VALIDATION
var ifsc_filter = /^[0-9A-Z]+$/;

//PAN CARD VALIDATION
 var p_filter =  /^([A-Z]{5})(\d{4})([A-Z]{1})$/;




  if($.trim($('#address_1').val()).length == 0)
  {
   error_address_1 = 'This Field is Mandatory';
   $('#error_address_1').text(error_address_1);
   $('#address_1').addClass('has-error');
  }
  else
  {
     if (!ad_filter.test($('#address_1').val())){
        error_address_1 = 'Invalid Address';
        $('#error_address_1').text(error_address_1);
        $('#address_1').addClass('has-error');
     } 
     else{  
       error_address_1 = '';
       $('#error_address_1').text(error_address_1);
       $('#address_1').removeClass('has-error');
  }  
}


//if Pass then go to Next Page
if(error_user_id != '' || error_email != '' || error_password != '' || error_first_name != '' || error_middle_name != '' || error_last_name != '')
  {
   return false;
  }
  else
  {
   $('#list_login_details').removeClass('active active_tab1');
   $('#list_login_details').removeAttr('href data-toggle');
   $('#login_details').removeClass('active');
   $('#list_login_details').addClass('inactive_tab1');
   $('#list_personal_details').removeClass('inactive_tab1');
   $('#list_personal_details').addClass('active_tab1 active');
   $('#list_personal_details').attr('href', '#personal_details');
   $('#list_personal_details').attr('data-toggle', 'tab');
   $('#personal_details').addClass('active in');
  }
 });


//Submit a Form
if(error_bank_name != ''|| error_branch_name != ''|| error_account_number != ''||
   error_account_type != ''|| error_ifsc_code != ''|| error_investment_amount != '')
  {
   return false;
  }
  else
  {
   $(document).css('cursor', 'prgress');
   $("#register_form").submit();
  }
 });
});



AJAX SELECT FOR INPUT


$(document).ready(function(){
 $("#scheme_name").change(function(){
var scheme_id = $(this).val();
$.ajax({
url:"load_scheme.php",
method:"POST",
data:{scheme_id:scheme_id},
success:function(data){
	$('#invest').html(data);
}
});

 });

});



