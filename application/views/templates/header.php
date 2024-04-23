<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- ciapp header -->
    <title>MyApp</title>
    <link rel="icon" type="image/x-icon" href="/pictures/wp.jpg">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- include bootstrap using CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!--Peter Added style sheet-->
    <!--Malibu scrollbar/sidebar scrollbar CSS-->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css" />
    <!--Peter's Personal CSS-->
    <link rel="stylesheet" href="/css/peter_side_nav_bar.css">
    <!--MaliBu Scrollbar Sidebar scrollbar JS-->
    <script src="https://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://kit.fontawesome.com/5009a972bb.js" crossorigin="anonymous"></script>


    <!-- bootstrap icona -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <div id="navCalDiv">
        <div id="monthscroller">
        </div>
    </div>
    <!--Sidebar-->
    <div id="sidebar">
        <nav class="navbar navbar-dark">
            <a class="navbar-brand" href="/index.html"><img id="headerLogo" src="/images/myapp1.png"
                    alt="Myapp logo"></a>
            <ul class="navbar-nav mt-4" id="accordion">

                <li class=""><a class="nav-link active" href="/index.html"><span><i
                                class="bi me-2 bi-speedometer2"></i>Dashboard</span></a></li>
                <li class=""><a class="nav-link" href="/index.html"><span><i
                                class="bi me-2 bi-card-text"></i>Flashcards</span></a></li>
                <li class=""><a
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed nav-link"
                        data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false"
                        href="/index.html"><span><i class="bi me-2 bi-sticky-fill"></i>Quicknotes</span></a>
                    <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="nav-link d-inline-flex text-decoration-none rounded"><span><i
                                            class="bi me-2 bi-sticky-fill"></i>Quicknotes</span></a></li>
                            <li><a href="#" class="nav-link d-inline-flex text-decoration-none rounded"><span><i
                                            class="bi me-2 bi-music-note-list"></i>Playlist</span></a></li>
                            <li><a href="#" class="nav-link d-inline-flex text-decoration-none rounded"><span><i
                                            class="bi me-2 bi-cookie"></i>Recipes</span></a></li>
                            <li><a href="#" class="nav-link d-inline-flex text-decoration-none rounded"><span><i
                                            class="bi me-2 bi-journals"></i>Blogs</span></a></li>
                            <li><a href="#" class="nav-link d-inline-flex text-decoration-none rounded"><span><i
                                            class="bi me-2 bi-check2-square"></i>Todos</span></a></li>

                            <?php echo anchor("quicknote/list", "<span><i class='bi me-2 bi-check2-square'></i>Note Board</span>", array("class" => "nav-link d-inline-flex text-decoration-none rounded")); ?>
                            <?php echo anchor("quicknote/insert", "<span><i class='bi me-2 bi-check2-square'></i>Note Insert</span>", array("class" => "nav-link d-inline-flex text-decoration-none rounded")); ?>
                        </ul>
                    </div>
                </li>
                <li class=""><a class="nav-link" href="/index.html"><span><i
                                class="bi me-2 bi-gear-fill"></i>Settings</span></a></li>
            </ul>
        </nav>
    </div>
    <!--Content:Navbar&Content-->
    <div id="content">
        <!--Navbar-->
        <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <!--Toggle Sidebar(mobile left)-->
                <span id="sidebarCollapse">
                    <i class="fas fa-align-left"></i>
                </span>

                <!--Search form-->
                <form class="d-flex">
                    <button class="btn" type="submit" name="header_search_submit"><i class="fas fa-search"></i></button>
                    <input class="form-control" id="header_search_query" type="search" name="findme"
                        placeholder="Search" style="border:0;background-color: #f8f9fa !important;" value=>
                </form>

                <button class="navbar-toggler navbartoggleicon" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">

                    <i class="fas fa-align-justify"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex flex-row-reverse collapse navbar-collapse" id="navbarSupportedContent">
                        <?php
                            //only superadmin can register new user
                            if(isset($_SESSION["superadmin"]) && $_SESSION['superadmin'] == 1) {
                                echo anchor("user/register", "register", array('class' => 'btn btn-outline-dark me-2'));
                                echo anchor("user/logout", "logout", array('class' => 'btn btn-outline-dark'));
                            } else {
                                //user options
                                if(isset($_SESSION["user_id"])) {
                                    //user logged in header

                                    echo anchor("user/logout", "logout", array('class' => 'btn btn-outline-dark me-2'));

                                    echo anchor("user/profile", $_SESSION["username"], array('class' => 'btn btn-outline-dark me-2'));

                                } else {
                                    //user header without login yet
                                    echo anchor("user/login", "login", array('class' => 'btn btn-outline-dark me-2'));
                                }
                            }
                            ?>
                        <!-- <div class="p-2"><button class="btn btn-outline-dark" type="submit">register</button></div> -->
                        <!-- <div class="p-2">
                            <button class="btn btn-outline-dark" type="submit">Login</button>
                        </div> -->
                        <!-- <div class="p-2"><button class="btn btn-outline-dark" type="submit">Search</button></div> -->
                    </div>
                </div>
        </nav>
        <!--MainPage Start-->
        <div id="mainPage">