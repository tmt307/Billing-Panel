<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('header.php');

session_start();
require_once 'functions.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
    $user_home->redirect('login.php');
}

$stmt = $user_home->runQuery("SELECT * FROM account_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<header id="top-head" class="uk-position-fixed">
    <div class="uk-container uk-container-expand uk-background-primary">
        <nav class="uk-navbar uk-light" data-uk-navbar="mode:click; duration: 250">
            <div class="uk-navbar-left">
                <div class="uk-navbar-item uk-hidden@m">
                    <a class="uk-logo" href="#"><img class="custom-logo" src="img/dashboard-logo-white.svg" alt=""></a>
                </div>
                <ul class="uk-navbar-nav uk-visible@m">
                    <li><a href="#">Accounts</a></li>
                    <li>
                        <a href="#">Settings <span data-uk-icon="icon: triangle-down"></span></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-nav-header">Your Account</li>
<!--                                <li><a href="#"><span data-uk-icon="icon: info"></span> Summary</a></li>-->
                                <li><a href="#"><span data-uk-icon="icon: refresh"></span> Edit</a></li>
                                <li><a href="#"><span data-uk-icon="icon: settings"></span> Configuration</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#"><span data-uk-icon="icon: image"></span> Your Data</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#"><span data-uk-icon="icon: sign-out"></span> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="uk-navbar-item uk-visible@s">
                    <form action="index.php" class="uk-search uk-search-default">
                        <span data-uk-search-icon></span>
                        <input class="uk-search-input search-field" type="search" placeholder="Search">
                    </form>
                </div>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li><a href="#" data-uk-icon="icon:user" title="Your profile" data-uk-tooltip></a></li>
                    <li><a href="#" data-uk-icon="icon: settings" title="Settings" data-uk-tooltip></a></li>
                    <li><a href="#" data-uk-icon="icon:  sign-out" title="Sign Out" data-uk-tooltip></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

		<!-- LEFT BAR -->
		<aside id="left-col" class="uk-light uk-visible@m">
			<div class="left-logo uk-flex uk-flex-middle">
				<img class="custom-logo" src="img/dashboard-logo.svg" alt="">
			</div>
			<div class="left-content-box  content-box-dark">
				<img src="img/avatar.svg" alt="" class="uk-border-circle profile-img">
				<h4 class="uk-text-center uk-margin-remove-vertical text-light">John Doe</h4>

				<div class="uk-position-relative uk-text-center uk-display-block">
				    <a href="#" class="uk-text-small uk-text-muted uk-display-block uk-text-center" data-uk-icon="icon: triangle-down; ratio: 0.7">Admin</a>
				    <div class="uk-dropdown user-drop" data-uk-dropdown="mode: click; pos: bottom-center; animation: uk-animation-slide-bottom-small; duration: 150">
				    	<ul class="uk-nav uk-dropdown-nav uk-text-left">
								<li><a href="#"><span data-uk-icon="icon: info"></span> Summary</a></li>
								<li><a href="#"><span data-uk-icon="icon: refresh"></span> Edit</a></li>
								<li><a href="#"><span data-uk-icon="icon: settings"></span> Configuration</a></li>
								<li class="uk-nav-divider"></li>
								<li><a href="#"><span data-uk-icon="icon: image"></span> Your Data</a></li>
								<li class="uk-nav-divider"></li>
								<li><a href="#"><span data-uk-icon="icon: sign-out"></span> Sign Out</a></li>
					    </ul>
				    </div>
				</div>
			</div>

			<div class="left-nav-wrap">
				<ul class="uk-nav uk-nav-default uk-nav-parent-icon" data-uk-nav>


                    <li class=""><a href="#"><span class="fas fa-home uk-margin-small-right"></span></span>Dashboard</a>

                    </li>

					<li class="uk-parent"><a href="#"><span class="fad fa-users uk-margin-small-right"></span></span>Clients</a>
						<ul class="uk-nav-sub">
							<li><a href="#">Add New Client</a></li>
                            <li><a  href="#">List Clients</a></li>
						</ul>
					</li>
                    <li class="uk-parent"><a href="#"><span class="fas fa-file-invoice-dollar uk-margin-small-right"></span></span>Staff</a>
                        <ul class="uk-nav-sub">
                            <li><a href="#">List Staff Members</a></li>
                            <li><a  href="#"> Add New Staff Members</a></li>
                            <li><a  href="#">Staff Groups</a></li>
                        </ul>
                    </li>


                    <li class="uk-parent"><a href="#"><span class="fas fa-users uk-margin-small-right"></span></span>Staff</a>
                        <ul class="uk-nav-sub">
                            <li><a href="#">List Staff Members</a></li>
                            <li><a  href="#"> Add New Staff Members</a></li>
                            <li><a  href="#">Staff Groups</a></li>
                        </ul>
                    </li>


                    <li class="uk-parent"><a href="#"><span class="fas fa-file-invoice-dollar uk-margin-small-right"></span></span>Clients</a>
                        <ul class="uk-nav-sub">
                            <li><a href="#">Create New Invoice</a></li>
                            <li><a  href="#">List Invoices</a></li>

                        </ul>
                    </li>



                    <li class="uk-parent"><a href="#"><span class="fas fa-cubes uk-margin-small-right"></span>Products/Services</a>
                        <ul class="uk-nav-sub">
                            <li><a  href="#">Add New Product/Service</a></li>
                            <li><a  href="#">List Products/Services</a></li>
                        </ul>
                    </li>


                    <li class="uk-parent"><a href="#"><span class=" fas fa-sack-dollar uk-margin-small-right"></span>Accounting</a>
                        <ul class="uk-nav-sub">
                            <li><a  href="#">Recent Transactions</a></li>
                            <li><a title="List Clients" href="#">Financal Summary</a></li>
                        </ul>
                    </li>




                    <li class="uk-parent"><a href="#"><span  class=" fas fa-cog uk-margin-small-right"></span> Settings</a>
                        <ul class="uk-nav-sub">
                            <li><a  href="#">General Settings</a></li>
                            <li><a  href="#">Manage Currancies</a></li>
                            <li><a  href="#">Payment Gateways</a></li>
                            <li><a  href="#">Google Recaptcha</a></li>
                            <li><a  href="#">Email Templates</a></li>
                            <li><a  href="#">Automation Settings</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </aside>




			</div>
			<div class="bar-bottom">
				<ul class="uk-subnav uk-flex uk-flex-center uk-child-width-1-5" data-uk-grid>
					<li>
						<a href="#" class="uk-icon-link" data-uk-icon="icon: home" title="Home" data-uk-tooltip></a>
					</li>
					<li>
						<a href="#" class="uk-icon-link" data-uk-icon="icon: settings" title="Settings" data-uk-tooltip></a>
					</li>
					<li>
						<a href="#" class="uk-icon-link" data-uk-icon="icon: social"  title="Social" data-uk-tooltip></a>
					</li>

					<li>
						<a href="#" class="uk-icon-link" data-uk-tooltip="Sign out" data-uk-icon="icon: sign-out"></a>
					</li>
				</ul>
			</div>
		</aside>
		<!-- /LEFT BAR -->

?>
