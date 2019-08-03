<?php include('header.php'); ?>
<a href="#offcanvas-slide" class="uk-button uk-button-default" uk-toggle>Open Dashboard</a>
<div id="offcanvas-slide" uk-offcanvas>
	<div class="uk-offcanvas-bar">
		<ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
			<li class="uk-active"><a href="#"> Account Dashboard </a></li>
		    <hr >
			<li class="uk-parent">
				<a href="#">Account Settings</a>
				<ul class="uk-nav-sub">
					<li><a href="#">Edit Account</a></li>
					<li><a href="#">Change Password</a></li>
					<li>
						<a href="#">Logout</a>
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
</div>
</div>