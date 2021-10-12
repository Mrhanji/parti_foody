<!DOCTYPE html>
<?php 
include '../include/config.php';
session_start();
if(!isset($_SESSION['uname'])){
   header("Location : login.php");
}
    function num($id,$name,$conn){
    $getall="SELECT COUNT($id) FROM $name";
$got =mysqli_query($conn,$getall);
$gotusercount=mysqli_fetch_array($got);
 
   return $gotusercount['0'];
}


?>
<html>
<title>Admin Panel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">
<?php include 'sidebar.php';?>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
   <a href="city_list.php"> <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-building w3-xxxlarge"></i></div>
        <div class="w3-right">
         <h3><?php echo num(city_id,city_list,$conn);?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Citys</h4>
      </div>
    </div></a>
    
  <a href="product_list.php">
        <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-product-hunt w3-xxxlarge"></i></div>
        <div class="w3-right">
         <h3><?php echo num(product_id,products,$conn);?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Products</h4>
      </div>
    </div>
      
      
  </a>  <a href="category_list.php">
        <div class="w3-quarter">
      <div class="w3-container w3-pink w3-padding-16">
        <div class="w3-left"><i class="fa fa-list-ul w3-xxxlarge"></i></div>
        <div class="w3-right">
         <h3><?php echo num(id,product_category,$conn);?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Categorys</h4>
      </div>
    </div>
      
      
  </a>
  
  
  <a href="order_list.php">
        <div class="w3-quarter">
      <div class="w3-container w3-orange w3-padding-16">
        <div class="w3-left"><i class="fa fa-first-order w3-xxxlarge"></i></div>
        <div class="w3-right">
         <h3><?php echo num(order_id,orders,$conn);?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Orders</h4>
      </div>
    </div>
      
      
  </a>
    
  <a href="restaurants_list.php">  <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-cutlery w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo num(restaurants_id,restaurants,$conn);?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Restaurants</h4>
      </div>
    </div></a>
    
     <a href="seats_list.php">
        <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
        <div class="w3-right">
         <h3><?php echo num(id,seat,$conn);?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Seats</h4>
      </div>
    </div>
      
      
  </a>
    
    
 
    
    <a href='user_list.php'><div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo num(user_id,userlist,$conn);?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div></a>
       
      <a href="contact_list.php">
        <div class="w3-quarter">
      <div class="w3-container w3-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-info w3-xxxlarge"></i></div>
        <div class="w3-right">
         <h3><?php echo num(id,contact,$conn);?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Contact Requests</h4>
      </div>
    </div>
      
      
  </a>
    
  </div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
    
    </div>
  </div>
  <hr>
 
  <hr>
  <div class="w3-container">
    <h5>Recent Users</h5>
    <ul class="w3-ul w3-card-4 w3-white">
        
        <?php $recent=mysqli_query($conn,"SELECT *FROM userlist LIMIT 3 ");
        if(mysqli_num_rows($recent)>0){
            while($d=mysqli_fetch_assoc($recent)){
                
            
        ?>
      <li class="w3-padding-16">
        <img src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge"><a href="view_user.php?id=<?php echo $d['user_id']?>"><?php echo $d['name'];?></a></span><br>
      </li><?php }}?>
  
    </ul>
  </div>
  <hr>



  <!-- Footer -->
<?php 

include 'footer.php';

?>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
