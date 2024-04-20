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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css"/>
    <!--Peter's Personal CSS-->
    <link rel="stylesheet" href="/css/peter_side_nav_bar.css">
    <!--MaliBu Scrollbar Sidebar scrollbar JS-->
    <script src="https://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://kit.fontawesome.com/5009a972bb.js" crossorigin="anonymous"></script>

</head>
<body>

    <div id="navCalDiv">
        <div id="monthscroller">
        </div>
    </div>
    <!--Sidebar-->
    <div id="sidebar">
        <nav class="navbar navbar-dark">
            <a class="navbar-brand" href="/index.html"><img id="headerLogo" src="/images/myapp1.png" alt="Workglue logo"></a>
            <ul class="navbar-nav mt-4" id="accordion">
                <!--Dashboard-->
                <li class=""><a class="nav-link" href="/index.html"><img src="/images/peter-purchased/noun_dashboard_665064.svg"><span>Dashboard</span></a></li>
                <!--Leads/Bids-->
                <li class=""><a class="nav-link" data-toggle="collapse" href="#LBSubmenu"><img src="/images/peter-purchased/noun_Money_80664.svg"><span>Sales</span></a><ul class="collapse" id="LBSubmenu" data-parent="#accordion"><li class=""><a class="" href="/add-bid.html">Add New</a></li><li class=""><a class="" href="/bidlist2.html">List</a></li><li class=""><a class="" href="/bidboard.html">Bid Board</a></li></ul></li>                
                <!--Jobs-->
                <li class=""><a class="nav-link" data-toggle="collapse" href="#JobsSubmenu"><img src="/images/peter-purchased/noun_tools_1388483.svg"><span>Jobs</span></a>
                    <ul class="collapse" id="JobsSubmenu" data-parent="#accordion">
                        <li class=""><a class="" href="/joblist.html">List</a></li><li class=""><a class="" href="/calendar-byworker.html">By Worker</a></li>
                        <li class=""><a class="" href="/calendar-byjob.html">By Job</a></li><li class=""><a class="" href="/calendars/month2.html">Month</a></li><li class=""><a class="" href="/calendars/day.html">Day</a></li><li class=""><a class="" href="/production-status.html">Status</a></li>
                    </ul>
                </li>                
                <!--Customers-->
                <li class=""><a class="nav-link" data-toggle="collapse" href="#CustomersSubmenu"><img src="/images/peter-purchased/noun_Suitcase_2046469.svg"><span>Customers</span></a>
                    <ul class="collapse" id="CustomersSubmenu" data-parent="#accordion">
                        <li class=""><a class="" href="/list-accounts.html">Accounts</a></li>
                        <li class=""><a class="" href="/list-contacts.html">Contacts</a></li>
                        <li class=""><a class="" href="/mail2-list.html">Mailing Lists</a></li>
                    </ul>
                </li>                
                <!--Employees-->
                <li class=""><a class="nav-link" data-toggle="collapse" href="#EmployeesSubmenu"><img src="/images/peter-purchased/noun_Employee_2837107.svg"><span>Employees</span></a>
                    <ul class="collapse" id="EmployeesSubmenu" data-parent="#accordion">
                        <li class=""><a class="" href="/worker-list.html">List/Edit</a></li>
                        <li class=""><a class="" href="/timeclock-review.html">Time Clock</a></li>
            
                        <li class=""><a class="" href="/employee-time-add.html">Enter Hours</a></li>
                        <li class=""><a class="" href="/report-timesheet-week.html">Time Sheets</a></li>
                        <li class=""><a class="" href="/send-employee-bulk-email.html">Text/Email</a></li>
                        <li class=""><a class="" href="/timeoff.html">Time Off</a></li>
                        <li class=""><a class="" href="/subcontractor-list.html">Subs</a></li>
                        <li class=""><a class="" href="/sub-time-add.html">Sub Time</a></li>
                    </ul>
                </li>
                <!--Reports-->
                <li class=""><a class="nav-link" data-toggle="collapse" href="#ReportsSubmenu"><img src="/images/peter-purchased/noun_report_1219510.svg"><span>Reports</span></a>
                    <ul class="collapse" id="ReportsSubmenu" data-parent="#accordion">
                        <li class=""><a class="" href="/report-joblogs.html">Job Logs</a></li>
                        <li class=""><a class="" href="/report-jobs-salesperson.html">Sales</a></li>
                        <li class=""><a class="" href="/jobcost-alljobs.html">Job Cost</a></li>
                        <li class=""><a class="" href="/chart-monthly-sales.html">Monthly Labor</a></li>
                        <li class=""><a class="" href="/checklist_sheet.html">Checklists</a></li>
                        <li class=""><a class="" href="/report-marketing.html">Marketing</a></li>
                        <li class=""><a class="" href="/report-timeoff.html">Time Off</a></li>
                        <li class=""><a class="" href="/wip-report.html">WIP Report</a></li>
                        <li class=""><a class="" href="/report_menu.html">More Reports</a></li>
                    </ul>
                </li>
                <!--Support-->
                <li class=""><a class="nav-link" data-toggle="collapse" href="#SupportSubmenu"><img src="/images/peter-purchased/noun_dots_174959.svg"><span>Support</span></a>
                    <ul class="collapse" id="SupportSubmenu" data-parent="#accordion">
                        <li class=""><a class="" href="/mytasks-10day.html">My Tasks</a></li><li class=""><a class="" href="/calendars2/personal_calendar.html">My Calendar</a></li><li class=""><a class="" href="/edit-user.html">My Profile</a></li><li class=""><a class="" href="/company_calendar.html">Calendar</a></li><li class=""><a class="" href="/edit-db-fields.html">Custom Data</a></li><li class=""><a class="" href="/wg-account-info.html">Account</a></li><li class=""><a class="" href="/index.html?logout=yes">Log Out</a></li>                    </ul>
                </li>
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
                    <i  class="fas fa-align-left"></i>
                </span>

                <!--Search form-->
                <form class="d-flex">
                    <button class="btn" type="submit" name="header_search_submit"><i class="fas fa-search"></i></button>
                    <input class="form-control" id="header_search_query" type="search" name="findme" placeholder="Search" style="border:0;background-color: #f8f9fa !important;" value=>
                </form>
                
                
                <!-- <button class="navbar-toggler navbartoggleicon" type="button" data-toggle="collapse" data-target="#navbarToggler">
                    <i class="fas fa-align-justify"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggler">


                    
                    <ul class="navbar-nav ml-auto mt-0 mt-lg-0">
                        
                        <li class="nav-item mr-3"><a class="nav-link" id="reminderbutton" href="#">Add a task</a></li>                  
                        <li class="nav-item mr-3"><a class="nav-link" id="showCalendar" href="#">Apr 18<i class="fas fa-chevron-down"></i></a></li>
                       
                        <li class="nav-item"><a class="nav-link" id="tawkstatus" style="color: #EE7600; " href="#">Help</a></li>
                    </ul>
                </div> -->











                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      
      <div class="d-flex flex-row-reverse collapse navbar-collapse" id="navbarSupportedContent">
  <div class="p-2"><button class="btn btn-outline-success" type="submit">register</button></div>
  <div class="p-2"><button class="btn btn-outline-success" type="submit">Login</button></div>
  <div class="p-2"><button class="btn btn-outline-success" type="submit">Search</button></div>
</div>
    

            </div>
            
        </nav>
        <!--MainPage Start-->
        <div id="mainPage">