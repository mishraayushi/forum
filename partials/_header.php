<?php
session_start();
echo  '<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/PHPFORUMPROJECT">Navbar</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/PHPFORUMPROJECT">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
        </a>
        <ul class="dropdown-menu">';
        // we can use the limit function to limit the categories upto 3
        $sql="SELECT category_name ,category_id FROM `categories` LIMIT 3";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
        }
          
         
        
        
          echo '</ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contactus</a>
      </li>
      
    </ul>';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '
    <form class="d-flex" role="search" method="GET" action="search.php">
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <p class="text-light mx-2 my-0">Welcome '. $_SESSION['useremail'].'</p>
      <a href="partials/logout.php" class="btn btn-outline-success">Logout</a>';
      
    }
  else{
    echo'
      <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal"" >Login</button>
      <button class="btn btn-outline-success mx-1"  data-bs-toggle="modal" data-bs-target="#signupModal"">Sign Up</button>';
  }
     
      echo' 
      </div>
   
  </div>
</nav>';
include 'partials/login_modal.php';
include 'partials/signup_modal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo'<div class="alert alert-success  alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can now login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}



?>