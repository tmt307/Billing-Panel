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


<div class="uk-section uk-padding-remove">
		<div class="uk-grid-collapse" uk-grid>
			<div id="sidebar" class="uk-width-1-4 uk-visible@m uk-padding-small uk-padding-remove-top uk-animation-slide-left uk-section-secondary">

		<ul class="uk-nav-secondary uk-nav-parent-icon" uk-nav>
			<li class="uk-active"><a href="#"> Account Dashboard </a></li>
			<span><?php echo $row['userName']; ?> Welcome Back </span>
			<hr >
			<li class="uk-parent">
				<a href="#">Account Settings</a>
				<ul class="uk-nav-sub">
					<li><a href="#">Edit Account</a></li>
					<li><a href="#">Change Password</a></li>
					<li>
						<a href="logout.php">Logout</a>
					</li>
				</ul>
			</li>
			<li class="uk-parent">
				<a href="#">Clients</a>
				<ul class="uk-nav-sub">
					<li><a href="#">Add New Client</a></li>
					<li><a href="#">List Clients</a></li>
				</ul>
			</li>
			
			<li class="uk-parent">
				<a href="#">Billing</a>
				<ul class="uk-nav-sub">
					<li><a href="#">List Invoices</a></li>
					<li><a href="#">Create New Invoice</a></li>
				</ul>
			</li>
			
			<li class="uk-parent">
				<a href="#">Orders</a>
				<ul class="uk-nav-sub">
					<li><a href="#">List Orders</a></li>
					<li><a href="#">Add New Order</a></li>
				</ul>
			</li>
			<li class="uk-parent">
				<a href="#">Products & Services</a>
				<ul class="uk-nav-sub">
					<li><a href="#">List Products / Services</a></li>
					<li><a href="#">Add New Product/Service</a></li>
				</ul>
			</li>
			<li class="uk-parent">
				<a href="#">Accounting</a>
				<ul class="uk-nav-sub">
					<li><a href="#">Recent Transactions</a></li>
					<li><a href="#">Financal Summary</a></li>
				</ul>
			</li>
			<li class="uk-parent">
				<a href="#">Support</a>
				<ul class="uk-nav-sub">
					<li><a href="#">Active Support Tickets</a></li>
					<li><a href="#">Outstanding Support Tickets</a></li>
					<li><a href="#">List Support Tickets</a></li>
					<li><a href="#">Closed Support Tickets</a></li>
				</ul>
			</li>
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

<div class="uk-text-center" uk-grid>
    <div class="uk-width-1-auto">
        <div class="uk-card uk-card-secondary uk-card-body">

  <canvas id="chartjs-0" style="height:380px; width:620px"></canvas>
  <script>
    new Chart(document.getElementById("chartjs-0"), {
      "type": "line",
      "data": {
        "labels": ["11-24 13:05", "11-24 19:05", "11-24 22:05", "11-25 10:05", "11-25 14:05", "11-25 19:05", "11-25 23:05", "11-26 10:05", "11-26 13:05", "11-26 18:05", "11-26 22:05"],
        "datasets": [{
          "label": "Day Income from last 30 days",
          "data": [5, 10, 20, 30, 25, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150, 160, 170, 180, 190, 200],
          "fill": true,
          "borderColor": "#fffcdc",
          "lineTension": .4,
          "pointBorderColor": "blue",
          "spanGaps": true,
        }]
      },
      "options": {
        legend: {
          labels: {
            fontColor: "white",
            fontSize: 16
          }
        },
        scales: {
          yAxes: [{
            ticks: {
              fontColor: "white"
            },
            gridLines: {
              display: true,
              color: "#1e87f0"
            }
          }],
          xAxes: [{
            ticks: {
              fontColor: "white",
            },
            gridLines: {
              display: true,
              color: "#1e87f0"
            }
          }]
        }
      }
    });
  </script>
</div>

</div>

</div>




    <div class="uk-width-1-1">
        <div class="uk-card uk-card-secondary uk-card-body">

        	<h5> Recent Orders </h5>
<table class="uk-table uk-table-middle uk-table-divider">
    <thead>
        <tr>
            <th >#</th>
            <th >Client Name</th>
            <th>Product/Service</th>
            <th>Invoice Date</th>
            <th>Due Date</th>
            <th>Payment Gateway</th>
            <th>Amount Paid</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1244</td>
            <td>John Doe (Logic Designs)</td>
            <td>Logo Design</td>
            <td>01/08/2019</td>
            <td>08/08/2019</td>
            <td>PayPal</td>
            <td>£150.00</td>
            <td><button class="uk-button uk-button-primary" type="button">Paid</button></td>
            <td><button class="uk-button   uk-button-default" type="button">View Order</button></td>
        </tr>
    </tbody>
    <tbody>
        <tr>
            <td>1245</td>
            <td>John Doe (Logic Designs)</td>
            <td>Logo Design</td>
            <td>01/08/2019</td>
            <td>08/08/2019</td>
            <td>PayPal</td>
            <td>£150.00</td>
            <td><button class="uk-button uk-button-danger" type="button">Unpaid</button></td>
            <td><button class="uk-button  uk-button-default" type="button">View Order</button></td>
        </tr>
    </tbody>


</table>


        </div>
    </div>
    <div class="uk-width-1-2">
        <div class="uk-card uk-card-secondary uk-card-body">1-2</div>
    </div>
</div>
			</div>
		</div>
	</div>
</div>

</div>



