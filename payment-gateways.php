
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>


<div class="uk-width-1-2 uk-card uk-card-primary uk-card-body" >
  <h3>Create a new invoice </h3>

<?php
ini_set('display_errors',1); error_reporting(E_ALL);


$currency_name = '';
$currency_symbol = '';
$placement_of_currency = '';

$staff_id = $row['userID'];

if (isset($_POST['btn-add-currency'])) {
//print_r($_POST);

$currency_name = $_POST['currency_name'];
$currency_symbol = $_POST['currency_symbol'];
$placement_of_currency = $_POST['placement_of_currency'];
$staff_id = $row['userID'];

// $LAST_ID = $this->conn->lastInsertId();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters
$stmt = $pdo->prepare("INSERT INTO currencies (currency_name,currency_symbol,placement_of_currency,staff_id) 

VALUES (:currency_name, :currency_symbol, :placement_of_currency, :staff_id)");
    $stmt->bindParam(':currency_name', $currency_name);
    $stmt->bindParam(':currency_symbol', $currency_symbol);
    $stmt->bindParam(':placement_of_currency', $placement_of_currency);
    $stmt->bindParam(':staff_id', $staff_id);
    $stmt->execute();

echo '<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p class="uk-text-capitalize">The Currency has been added successfully</p>
</div>';


}

else {

var_dump($pdo->errorInfo());
}

 if (isset($_GET['id'])) {
$id = $_GET['id'];
// echo $id;
$sql = "DELETE FROM currencies WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':id' => $id));
header("LOCATION: currencies.php?deleted");
}
if(isset($_GET['deleted']))
{
echo '<div class="uk-alert-danger" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p class="uk-text-capitalized">The currency has been deleted successfully.</p>
</div>';
} ?>


<form action="" method="post" >

  <br />
    <div class="uk-width-1-1">
      <input class="uk-input" id="name" type="text" value="" type="text"  placeholder="Payment Gateway Name">
  </div>

  <br />
    <div class="uk-width-1-1">
          <textarea class="uk-textarea"  name="description" id="description"  placeholder="Description"></textarea>
  </div>

<br />
    <div class="uk-width-1-1">
      <input class="uk-input" id="name" type="text" value=""  placeholder="Public Key">
  </div>

<br />
    <div class="uk-width-1-1">
      <input class="uk-input" id="name" type="text" value=""  placeholder="Private Key">
  </div>

<br />


    <div class="uk-width-1-1">
      <input class="uk-input" id="paypal_email" type="text" value="" type="text" name="paypal_email" placeholder="Paypal Email">
    </div>


    <br/>
  <input class="uk-button uk-button-primary" name="btn-add-currency" type="submit" value="Add Payment Gateway">

</form>
</div>

<div class="uk-width-1-3 uk-card uk-card-default uk-card-body" style="background-color: #132653  !important;" >

<h3>List of Currencies</h3> 


        <table style="background-color: #2755ba  !important;width: 100%;" class=" uk-table-middle uk-table-divider">
            <thead>
                <tr>
                    <th>Currency Name</th>
                    <th>Currency Symbol</th>
                    <th>Placement Of Currency</th>
                    <th></th>
                </tr>
            </thead>
     	    <?php
         	    $currencies = $pdo->query("SELECT * FROM payment_methods")->fetchAll();
         	      foreach ($currencies as $currency) {?>
             <tr>
    
                <th><?php echo $currency['name']; ?></th>
                <th><?php echo $currency['currency_symbol']; ?></th>
                <th><?php echo $currency['placement_of_currency']; ?></th>
                <form action="currencies.php?id=<?php echo $currency['id'];?>" method="post"> 
       			<th> <input style="margin:5px;width: 200px;width: 100%;" class="uk-button uk-button-danger" name="deleted" type="submit" onclick="return confirm('Are you sure you want delete this Currency?')" value="Delete"></th>
                </tr>  	   <?php }; ?>
            </form>
		</table>
</div>

