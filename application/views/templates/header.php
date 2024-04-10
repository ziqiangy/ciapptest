<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	

  <title>ZIQIANG YUAN MANAGEMENT APP</title>
  <link rel="icon" type="image/x-icon" href="/pictures/logo-sq.jpg">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="/node_modules/jquery/dist/jquery.min.js"></script>
  <!-- include bootstrap using CDN-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


	
</head>
<body>
<style>
  body{
        margin:0;
    }
</style>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a class="navbar-brand" href="/">
      <img src="/pictures/yelloman.jpg" alt="yelloman" width="30" height="30">
      PeterYuanApp
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Flashcard
          </a>
          <ul class="dropdown-menu">
<li><?php echo anchor("flashcard/oneCardView", "Flashcard Study", array("class" => "dropdown-item")); ?></li>
<li><?php echo anchor("flashcard/displayAllList", "Flashcards List", array("class" => "dropdown-item")); ?></li>
<li><?php echo anchor("flashcard/insertView", "Insert One", array("class" => "dropdown-item")); ?></li>
<li><?php echo anchor("flashcard/displayMultiInsert", "Insert Multi", array("class" => "dropdown-item")); ?></li>
<li><?php echo anchor("flashcate/list", "Show My Categories", array("class" => "dropdown-item")); ?></li>
<li><?php echo anchor("flashcate/insert", "Insert Category", array("class" => "dropdown-item")); ?></li>
<li><?php echo anchor("flashcard/searchByCate", "Search By Category", array("class" => "dropdown-item")); ?></li>
          </ul>
        </li>


        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            List
          </a>
          <ul class="dropdown-menu">

          <li><?php echo anchor("quicknote/list", "Notes", array("class" => "dropdown-item")); ?></li>
          <li><?php echo anchor("Readinglist/list", "Playist", array("class" => "dropdown-item")); ?></li>
          <li><?php echo anchor("Recipelist/list", "Recipe", array("class" => "dropdown-item")); ?></li>
          <li><?php echo anchor("blog/list", "Blogs", array("class" => "dropdown-item")); ?></li>
          <li><?php echo anchor("todo/list", "Todos", array("class" => "dropdown-item")); ?></li>

          </ul>
        </li>


        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Insert
          </a>
          <ul class="dropdown-menu">
          <li><?php echo anchor("quicknote/insert", "Notes", array("class" => "dropdown-item")); ?></li>
          <li><?php echo anchor("Readinglist/insert", "Playist", array("class" => "dropdown-item")); ?></li>
          <li><?php echo anchor("Recipelist/insert", "Recipe", array("class" => "dropdown-item")); ?></li>
          <li><?php echo anchor("blog/insert", "Blogs", array("class" => "dropdown-item")); ?></li>
          <li><?php echo anchor("todo/insert", "Todos", array("class" => "dropdown-item")); ?></li>

          </ul>
        </li>
        
      </ul>
      <form class="d-flex">
      
        <?php 


        //only superadmin can register new user
        if(isset($_SESSION["superadmin"])&&$_SESSION['superadmin']==1){
          echo anchor("user/register", "register", array('class' => 'btn btn-outline-dark me-2'));
          echo anchor("user/logout", "logout", array('class' => 'btn btn-outline-dark'));
        }else{
          //user options
          if(isset($_SESSION["user_id"])) {
            //user logged in header
            echo anchor("user/profile", $_SESSION["username"], array('class' => 'btn btn-outline-dark me-2'));
            echo anchor("user/logout", "logout", array('class' => 'btn btn-outline-dark'));
        } else {
          //user header without login yet
            echo anchor("user/login", "login", array('class' => 'btn btn-outline-dark'));
        }
        }
      ?>
      </form>
    </div>
  </div>
</nav>



<div class="container">