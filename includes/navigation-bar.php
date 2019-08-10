<?php 

include('header.php'); 

session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('login.php');
}

$stmt = $user_home->runQuery("SELECT * FROM users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<div class="uk-grid-collapse" uk-grid>
  <div id="sidebar" class="uk-width-1-4 uk-visible@m uk-padding-small uk-section-default">
    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
      <h3><li class="uk-active"> Account Dashboard</li>
    <span><?php echo $row['userName']; ?> Welcome Back </span></h3>
      <hr >
      <a href="index.php">Dashboard</a>
      <li class="uk-parent">
        <a href="#">Account Settings</a>
        <ul class="uk-nav-sub">
          <li><a href="edit-account.php">Edit Account</a></li>
          <li><a href="change-password.php">Change Password</a></li>
          <li>
            <a href="logout.php">Logout</a>
          </li>
        </ul>
      </li>
      <li class="uk-parent">
        <a href="#">Clients</a>
        <ul class="uk-nav-sub">
          <li><a href="add-new-client.php">Add New Client</a></li>
          <li><a href="list-clients.php">List Clients</a></li>
        </ul>
      </li>
      
      <li class="uk-parent">
        <a href="#">Billing</a>
        <ul class="uk-nav-sub">
          <li><a href="create-new-invoice.php">Create New Invoice</a></li>
          <li><a href="list-invoices.php">List Invoices</a></li>
        </ul>
      </li>
      
      <li class="uk-parent">
        <a href="#">Products & Services</a>
        <ul class="uk-nav-sub">
          <li><a href="#">Add New Product/Service</a></li>
          <li><a href="#">List Products / Services</a></li>
        </ul>
      </li>

      <li class="uk-parent">
        <a href="#">Accounting</a>
        <ul class="uk-nav-sub">
          <li><a href="#">Recent Transactions</a></li>
          <li><a href="#">Financal Summary</a></li>
        </ul>
      </li>
<!--       <li class="uk-parent">
        <a href="#">Support</a>
        <ul class="uk-nav-sub">
          <li><a href="#">Active Support Tickets</a></li>
          <li><a href="#">Outstanding Support Tickets</a></li>
          <li><a href="#">List Support Tickets</a></li>
          <li><a href="#">Closed Support Tickets</a></li>
        </ul>
      </li> -->
      <li class="uk-parent">
        <a href="#">Staff</a>
        <ul class="uk-nav-sub">
          <li><a href="#">List Staff Members</a></li>
          <li><a href="#">Add New Staff Members</a></li>
          <li><a href="#">Staff Groups</a></li>
        </ul>
      </li>
      <li class="uk-parent">
        <a href="#">Utilites</a>
        <ul class="uk-nav-sub">
          <li><a href="#">Activity Log</a></li>
          <li><a href="#">Server Status</a></li>
        </ul>
      </li>
      <li class="uk-parent">
        <a href="#">Settings</a>
        <ul class="uk-nav-sub">
          <li><a href="#">General Settings</a></li>
          <li><a href="#">Payment Gateways</a></li>
          <li><a href="#">Google Recaptcha</a></li>
          <li><a href="#">Email Templates</a></li>
          <li><a href="#">Automation Settings</a></li>
        </ul>
      </li>
    </ul>
  </div>




