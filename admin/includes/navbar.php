<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Hello Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="profile.php">
                    <i class='fas fa-user-alt'></i>
                    <span>My Profile</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class='fas fa-chalkboard-teacher'></i>
                    <span>Users</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"> users : </h6>
                        <a class="collapse-item" href="visitingfaculty.php">Visiting Faculty</a>
                        <a class="collapse-item" href="permanentfaculty.php">Permanent Faculty</a>
                        <!--<a class="collapse-item" href="technicalassitance.php">Technical Assitance</a>
                        <a class="collapse-item" href="systemadmin.php">System Admin</a>--->
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="addadmin.php">
                    <i class='fas fa-user-cog'></i>
                    <span>Add Admin</span></a>
            </li>
             <!-- Heading -->
             <div class="sidebar-heading">
                Requistion
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class='fas fa-chalkboard-teacher'></i>
                    <span>Requistion Form</span>
                </a>
                <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"> Form : </h6>
                        <a class="collapse-item" href="form1.php">Form 1(Lab Related)</a>
                        <a class="collapse-item" href="form2.php">Form 2(Computer Related)</a>
                        <a class="collapse-item" href="form3.php">Form 3(Book Related)</a>
                        <a class="collapse-item" href="form4.php">Form 4(General Infa)</a>
                    </div>
                </div>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="myrequisition.php">
                    <i class='fas fa-user-alt'></i>
                    <span>My Requisition</span></a>
            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="allrequisition.php">
                    <i class='fas fa-user-alt'></i>
                    <span>All Requisition</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bookrequisition.php">
                    <i class='fas fa-book-open'></i>
                    <span>Book Requisition</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
</ul>
<!-- End of Sidebar -->