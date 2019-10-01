
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>


<div class="uk-width-1-2 uk-card uk-card-primary uk-card-body" >
  <h3>Add new currency  </h3>

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
      <input class="uk-input" id="currency_name" type="text" value="" type="text" name="currency_name" placeholder="Currency Name">
  </div>
<br />
    <div class="uk-width-1-1">
      <input class="uk-input" id="currency_symbol" type="text" value="" type="text" name="currency_symbol" placeholder="Currency Symbol">
    </div>
<br/>
    <div class="uk-width-1-1">
          <select required name="placement_of_currency" class="uk-select uk-form-width-large" >
            <option value="" disabled selected>Placement Of Currency</option>
            <option value="Before">Before Price</option>
            <option value="After">After Price</option>
          </select>
    </div>
    <br/>
  <input class="uk-button uk-button-primary" name="btn-add-currency" type="submit" value="Create Invoice">

</form>
</div>

<div class="uk-width-1-3  uk-card uk-card-default uk-card-body" style="background-color: #132653 !important !important;" >

<h3>List of Currencies</h3> 


        <table style="background-color: #132653  !important;width: 100%;" class=" uk-table-middle uk-table-divider">
            <thead>
                <tr>
                    <th>Currency Name</th>
                    <th>Currency Symbol</th>
                    <th>Placement Of Currency</th>
                    <th></th>
                </tr>
            </thead>
     	    <?php
         	    $currencies = $pdo->query("SELECT * FROM currencies")->fetchAll();
         	      foreach ($currencies as $currency) {?>
             <tr>
    
                <th><?php echo $currency['currency_name']; ?></th>
                <th><?php echo $currency['currency_symbol']; ?></th>
                <th><?php echo $currency['placement_of_currency']; ?></th>
                <form action="currencies.php?id=<?php echo $currency['id'];?>" method="post"> 
       			<th> <input style="margin:5px;width: 200px;width: 100%;" class="uk-button uk-button-danger" name="deleted" type="submit" onclick="return confirm('Are you sure you want delete this Currency?')" value="Delete"></th>
                </tr>  	   <?php }; ?>
            </form>
		</table>
</div>

