  <?php  
session_start();
error_reporting(0);
include('conn.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

//code deletion
if(isset($_GET['delid']))
{
$rowid=intval($_GET['delid']);
$data1=[':rowid'=>$rowid];
$query='delete from tblexpense where ID=:rowid';
$stat=$conn->prepare($query);
$del=$stat->execute($data1);

if($del){
echo "<script>alert('Record successfully deleted');</script>";
echo "<script>window.location.href='manage-expense.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

}

}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker || Manage Expense</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Expense</li>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Expense</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<div class="col-md-12">
							
							<div class="table-responsive">
								
            <table class="table table-bordered mg-b-0">
              <thead>
                <tr>
                  <th> S.NO</th>
                  <th>Expense Item</th>
                  <th>Expense Cost</th>
                  <th>Expense Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
              $userid=$_SESSION['detsuid'];
              $data=[':userid'=>$userid];
$ret='SELECT * from tblexpense where UserId=:userid';
$stat=$conn->prepare($ret);
$stat->execute($data);
$fet=$stat->fetchAll(PDO::FETCH_ASSOC);

//while ($row=mysqli_fetch_array($ret)) {
foreach($fet as $row):

	$id=$row['ID'];
	$cnt=$cnt+1;

?>
            
                <tr>
                	<form method="POST">


                  <td><input type="text" name="ID" value="<?php echo $id;?>" hidden><?php echo $id;?></td>
              
                  <td><input type="text" name="c_item" value="<?php echo $row['ExpenseItem'];?>" hidden><?php  echo $row['ExpenseItem'];?></td>
                  <td><input type="text" name="e_cost" value="<?php echo $row['ExpenseCost'];?>" hidden><?php  echo $row['ExpenseCost'];?></td>
                  <td><input type="text" name="e_date" value="<?php echo $row['ExpenseDate'];?>" hidden><?php  echo $row['ExpenseDate'];?></td>
                  <td><a onclick="return confirm('Delete?')" href="manage-expense.php?delid=<?php echo $row['ID'];?>">Delete</a>
                  		<button class="btn" name="updt">update</button>
                  </td>
                  </form>
                  <?php
                  			
                  if (isset($_POST['updt'])) {
                  	$no=$_POST['ID'];
                  	

							$aa=$_POST['c_item'];
							$bb=$_POST['e_cost'];
							$cc=$_POST['e_date'];
							$_SESSION['c_item']=$aa;
							$_SESSION['ID']=$no;
							$_SESSION['e_cost']=$bb;
							$_SESSION['e_date']=$cc;
							
							?>
							
					<meta http-equiv="refresh" content="1;editdata.php">
					<?php
						}
                  ?>
                </tr>

                <?php 





endforeach;?>
               
             
            </table>
            
          </div>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<?php include_once('includes/footer.php');?>
		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
<?php }  ?>



  <?php  



?>