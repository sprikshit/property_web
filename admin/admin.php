<?php
$db = mysqli_connect("localhost", "u409085386_dash", "D@sh1234", "u409085386_dash");





// Check the connection
if (!$db) {
    die('Connection failed: ' . mysqli_connect_error());
}

$sql = "SELECT * FROM picz";
$sql1 = "SELECT * FROM signup";
$sql2 = "SELECT * FROM picz WHERE Statuss = 'Rent'";
$sql3 = "SELECT * FROM picz WHERE Statuss = 'Sale'";
$sql4 = "SELECT AVG(Pricee) as Avp FROM picz";

$result = mysqli_query($db, $sql);
if (!$result) {
    die('Query error: ' . mysqli_error($db));
}

$result1 = mysqli_query($db, $sql1);
if (!$result1) {
    die('Query error: ' . mysqli_error($db));
}

$result2 = mysqli_query($db, $sql2);
if (!$result2) {
    die('Query error: ' . mysqli_error($db));
}

$result3 = mysqli_query($db, $sql3);
if (!$result3) {
    die('Query error: ' . mysqli_error($db));
}

$result4 = mysqli_query($db, $sql4);
if (!$result4) {
    die('Query error: ' . mysqli_error($db));
}

$row = mysqli_fetch_assoc($result4);
$average = $row['Avp'];

$countprop = mysqli_num_rows($result);
$countusers = mysqli_num_rows($result1);
$countrent = mysqli_num_rows($result2);
$countsale = mysqli_num_rows($result3);
?>

<style>



@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");


</style>


<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_property.php">
                            <i class="bi bi-plus-circle-fill"></i> Add Property
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_commerical.php">
                            <i class="bi bi-plus-circle-fill"></i> Add Commercial Property
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edit.php">
                            <i class="bi bi-display"></i> View Residentail Property
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edit2.php">
                            <i class="bi bi-display"></i> View Commercial Property
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form_Query.php">
                        <i class="bi bi-person-lines-fill"></i> ContactUs Query's
                        </a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="adminlogout.php">
                            <i class="bi bi-people"></i> Logout
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-4">
                    <li>
                        <a href="#" class="nav-link d-flex align-items-center">
                            <div class="me-4">
                                <div class="position-relative d-inline-block text-white">
                                </div>
                            </div>
                        
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link d-flex align-items-center">
                            <div class="me-4">
                                <div class="position-relative d-inline-block text-white">
                                   </div>
                            </div>
                        
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link d-flex align-items-center">
                            <div class="me-4">
                                <div class="position-relative d-inline-block text-white">
                                </div>
                            </div>
                            
                        </a>
                    </li>
                </ul>
                <!-- Push content down -->
               
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
                        </div>
                        <!-- Actions -->
                     
                    <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        <li class="nav-item ">
                            <a href="#" class="nav-link active">All files</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="row g-6 mb-6">
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Number of Properties Available</span>
                                        <span class="h3 font-bold mb-0"><?php echo $countprop; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                            <i class="bi bi-house-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Users</span>
                                        <span class="h3 font-bold mb-0"><?php echo $countusers; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   
                <!-- Card stats -->
                <div class="row g-6 mb-6">
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Number of Properties for Sale</span>
                                        <span class="h3 font-bold mb-0"><?php echo $countsale; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                            <i class="bi bi-house-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Number of Properties for Rent</span>
                                        <span class="h3 font-bold mb-0"><?php echo $countrent; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                            <i class="bi bi-house-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-sm-12 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Average Price</span>
                                        <span class="h3 font-bold mb-0"><?php echo  $average; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                            <i class="bi bi-cash-stack"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>