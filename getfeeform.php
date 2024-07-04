<?php
include("php/dbconnect.php");

if(isset($_POST['req']) && $_POST['req']=='1') 
{

$sid = (isset($_POST['student']))?mysqli_real_escape_string($conn,$_POST['student']):'';

 $sql = "select s.id,s.sname,s.balance,s.fees,s.contact,b.branch,s.joindate from student as s,branch as b where b.id=s.branch and  s.delete_status='0' and s.id='".$sid."'";
$q = $conn->query($sql);
if($q->num_rows>0)
{

$res = $q->fetch_assoc();
echo '  <form class="form-horizontal" id ="signupForm1" action="fees.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Tên:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" disabled  value="'.$res['sname'].'" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Liên hệ:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" disabled  value="'.$res['contact'].'" />
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Tổng học phí:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="totalfee" id="totalfee"   value="'.$res['fees'].'" disabled />
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Học phí còn lại:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="balance"  id="balance" value="'.$res['balance'].'" disabled />
	  <input type="hidden" value="'.$res['id'].'" name="sid">
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Đã thanh toán:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="paid"  id="paid"  />
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Thời gian thanh toán:</label>
    <div class="col-sm-10">
	
      <input type="text" class="form-control" name="submitdate"  id="submitdate" style="background:#fff;"  readonly />
    </div>
  </div>
  
  
   <div class="form-group">
    <label class="control-label col-sm-2" for="email">Ghi chú:</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="transcation_remark" id="transcation_remark"></textarea>
    </div>
  </div>
 
 
 
 
 
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="save">Lưu</button>
    </div>
  </div>
</form>

<script type="text/javascript">
$(document).ready( function() {
$("#submitdate").datepicker( {
        changeMonth: true,
        changeYear: true,
       
        dateFormat: "yy-mm-dd",
      
    });
	
	
///////////////////////////

$( "#signupForm1" ).validate( {
				rules: {
					submitdate: "required",
					
					paid: {
						required: true,
						digits: true,
						max:'.$res['balance'].'
					}	
					
					
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-10" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class=\'glyphicon glyphicon-remove form-control-feedback\'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class=\'glyphicon glyphicon-ok form-control-feedback\'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );


//////////////////////////	
	
	
	
});

</script>
';

}else
{
echo "Một cái gì đó sai! Hãy thử sau một thời gian.";
}


}

if(isset($_POST['req']) && $_POST['req']=='2') 
{

$sid = (isset($_POST['student']))?mysqli_real_escape_string($conn,$_POST['student']):'';
$sql = "select paid,submitdate,transcation_remark from fees_transaction  where stdid='".$sid."'";
$fq = $conn->query($sql);
if($fq->num_rows>0)
{


 $sql = "select s.id,s.sname,s.balance,s.fees,s.contact,b.branch,s.joindate from student as s,branch as b where b.id=s.branch  and s.id='".$sid."'";
$sq = $conn->query($sql);
$sr = $sq->fetch_assoc();

echo '
<h4>Thông tin học sinh sinh viên</h4>
<div class="table-responsive">
<table class="table table-bordered">
<tr>
<th>Tên</th>
<td>'.$sr['sname'].'</td>
<th>Lớp học</th>
<td>'.$sr['branch'].'</td>
</tr>
<tr>
<th>Liên Hệ</th>
<td>'.$sr['contact'].'</td>
<th>Thời gian tham gia</th>
<td>'.date("d-m-Y", strtotime($sr['joindate'])).'</td>
</tr>


</table>
</div>
';


echo '
<h4>Thông tin học phí</h4>
<div class="table-responsive">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Thời gian</th>
        <th>Đã thanh toán</th>
        <th>Ghi chú</th>
      </tr>
    </thead>
    <tbody>';
	$totapaid = 0;
while($res = $fq->fetch_assoc())
{
$totapaid+=$res['paid'];
        echo '<tr>
        <td>'.date("d-m-Y", strtotime($res['submitdate'])).'</td>
        <td>'.$res['paid'].'</td>
        <td>'.$res['transcation_remark'].'</td>
      </tr>' ;
}
      
echo '	  
    </tbody>
  </table>
 </div> 
 
<table style="width:150px;" >
<tr>
<th>Tổng các khoản: 
</th>
<td>'.$sr['fees'].'
</td>
</tr>

<tr>
<th>Tổng học phí thanh toán: 
</th>
<td>'.$totapaid.'
</td>
</tr>

<tr>
<th>Học phí còn lại: 
</th>
<td>'.$sr['balance'].'
</td>
</tr>
</table>
 ';


 }
else
{
echo 'No fees submit.';
}
 
}
		
		 
			
			
	

?>