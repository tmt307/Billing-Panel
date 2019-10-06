
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>

<style type="text/css">
  .ck-editor__editable {
    min-height: 259px;
}
</style>

<?php // error_reporting(E_ALL);
//ini_set('display_errors', 1); ?>

<?php if (isset($_GET['invoicekey'])) {  

require_once('edit-invoice.php'); 

} else { ?>

<?php// ini_set('display_errors',1); error_reporting(E_ALL);
?>
<div class="uk-width-1-2 uk-card uk-card-primary uk-card-body" >
  <h3>Create a new invoice </h3>
<?php

$price = '';
$qty = '';
$total = '';
$description_of_invoice = '';
$client_id = '';
$currency = '';
$taxable = '';
$terms_of_service = '';
$invoice_status = '';
$type_of_invoice = '';
$due_date = '';
$payment_terms_date = '';
$payment_type = '';
$invoice_created = '';
$staff_id = $row['userID'];


 
$seed = str_split('abcdefghijklmnopqrstuvwxyz'
.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
 .'0123456789'); 

shuffle($seed); 
$rand = '';
foreach (array_rand($seed, 2) as $k) $rand .= $seed[$k];

   // echo $rand;

//echo $invoicekey;

if (isset($_POST['btn-create-invoice'])) {

$price = $_POST['price'];
$qty = $_POST['qty'];
$total = $_POST['total'];
$description_of_invoice = $_POST['description_of_invoice'];
$client_id = $_POST['client_id'];
$currency = $_POST['currency'];
$taxable = $_POST['taxable'];
$terms_of_service = $_POST['terms_of_service'];
$invoice_status = $_POST['invoice_status'];
$type_of_invoice = $_POST['type_of_invoice'];
$due_date = $_POST['due_date'];
$payment_terms_date = $_POST['payment_terms_date'];
$payment_type = $_POST['payment_type'];
$invoicekey = $_POST['client_id'] . $rand;
$invoice_created =  date("Y-m-d");
$staff_id = $_POST['client_id'];


// $LAST_ID = $this->conn->lastInsertId();
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters
$stmt = $pdo->prepare("INSERT INTO invoices (price,qty,total,description_of_invoice,client_id,currency,taxable,terms_of_service,invoice_status,type_of_invoice, payment_type,due_date, invoice_created, payment_terms_date,staff_id,invoicekey) 

VALUES (:price, :qty, :total, :description_of_invoice, :client_id, :currency, :taxable, :terms_of_service, :invoice_status, :type_of_invoice, :payment_type, :due_date, :invoice_created, :payment_terms_date, :staff_id, :invoicekey)");
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':qty', $qty);
    $stmt->bindParam(':total', $total);
    $stmt->bindParam(':description_of_invoice', $description_of_invoice);
    $stmt->bindParam(':client_id', $client_id);
    $stmt->bindParam(':currency', $currency);
    $stmt->bindParam(':taxable', $taxable);
    $stmt->bindParam(':terms_of_service', $terms_of_service);
    $stmt->bindParam(':invoice_status', $invoice_status);
    $stmt->bindParam(':type_of_invoice', $type_of_invoice);
    $stmt->bindParam(':payment_type', $payment_type);
    $stmt->bindParam(':due_date', $due_date);
    $stmt->bindParam(':invoice_created', $invoice_created);
    $stmt->bindParam(':payment_terms_date', $payment_terms_date);
    $stmt->bindParam(':invoicekey', $invoicekey);
    $stmt->bindParam(':staff_id', $staff_id);
    $stmt->execute();


    
echo '<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p class="uk-text-capitalize">The invoice has been created Successfully</p>
</div>';

}


else {

var_dump($pdo->errorInfo());
}


?>






<form action="invoice.php" method="post" >
    <br />
    <div  class="uk-child-width-expand  uk-grid-small uk-text-center" uk-grid>
        <div class="uk-width-1-3@s">
            <input class="uk-input" id="price" type="text" required oninput="setTwoNumberDecimal(this)" step="0.01"  value="0.00" type="number" name="price" oninput="calculate();" placeholder="Price">
        </div>
        <div class="uk-width-1-3@s">
            <input class="uk-input" type="text"  oninput="calculate();" id="qty" required name="qty" placeholder="Quantity">
        </div>
        <div class="uk-width-1-3@s">
            <input class="uk-input"  id="total" required  name="total" placeholder="Total">
        </div>
    </div>
    <br />
    <textarea name="description_of_invoice" id="editor" placeholder="Description Of Invoice"> </textarea>
    <br />
    <div class="uk-child-width-expand uk-grid-small uk-text-center" uk-grid>
        <div class="uk-width-1-2">
            <select required name="currency" class="uk-select uk-form-width-large" >
                <option value="" disabled selected>Select a Currency</option>
                <option value="USD">USD</option>
                <option value="GBP">GBP</option>
            </select>
        </div>
        
        <div class="uk-width-1-2">
            <select required name="taxable" class="uk-select  uk-form-width-large" >
                <option  value="" disabled selected>Taxable</option>
                <option  value="yes" >Yes</option>
                <option  value="no" >No</option>
            </select>
        </div>
    </div>
    <br />
    <textarea name="terms_of_service" id="editor2" placeholder="Terms Of Service"> </textarea>
</div>
<div class="uk-width-1-3  uk-card uk-card-default uk-card-body" >
    <h3> Select a client </h3>
    <select class="uk-select uk-select  uk-form-width-large " required name="client_id" >
        <option value="" disabled selected>Select a Client</option>
        <?php $clients = $pdo->query("SELECT * FROM clients")->fetchAll(); ?>
        <?php  foreach ($clients as $client) {?>
        <option  name="client_id"  value="<?php echo $client['id']; ?>"><?php echo $client['firstname']; ?> <?php echo $client['lastname']; ?> ( <?php echo $client['company_name']; ?> ) </option>
        <?php };?>
    </select>
    
</select>
<h3>OR </h3>
<a class="uk-button uk-button-default " href="#modal-sections"  uk-toggle>Add a new client</a>

<br/>

<br/>
<div class="uk-width-1-1">
    <select reqiuired name="invoice_status" class="uk-select">
        <option disabled selected>Select Invoice Status</option>
        <option value="Outstanding">Outstanding</option>
        <option value="Paid" >Paid</option>
        <option value="Unpaid">Unpaid</option>
        <option value="Cancelled" >Canceled</option>
    </select>
</div>
<br/>
<div class="uk-width-1-1">
    <select reqiuired name="payment_type" class="uk-select">
        <option disabled selected>Select payment Type</option>
        <option value="Paypal">Paypal</option>
        <option value="Credit/Debt" >Credit/debt</option>
    </select>
</div>
<div class="uk-width-1-1">
    <br />
    <select  name="type_of_invoice" class="uk-select">
        <option disabled selected>Select Type of invoice</option>
        <option  name="type_of_invoice"  value="Recurring" >Recurring </option>
        <option  name="type_of_invoice" value="One Time Payment"  >One Time Payment </option>

    </select>
</div>
<br />
<input type="text" class=" uk-input" name="due_date" placeholder="Select Due Date" id="calendar-tomorrow">
<br />
<br />

<input type="text" class=" uk-input"   name="payment_terms_date" placeholder="Select Payment Terms" id="calendar-tomorrow">
<br /><br />
<input class="uk-button uk-button-primary" name="btn-create-invoice" type="submit" value="Create Invoice">
</form>
</div>



<script type="text/javascript">
    flatpickr('#calendar-tomorrow', {
});


  function calculate() {
        var price = document.getElementById('price').value; 
        var qty = document.getElementById('qty').value;
        var total = document.getElementById('total'); 
        var total = parseFloat(price * qty);
          document.getElementById('total').value = total.toFixed(2);

    }

function setTwoNumberDecimal(obj) {
    //remove any existing decimal
    p = obj.value.replace('.','');

    //get everything except the last 2 digits
    var l = p.substring(-2, p.length-2);

    //get the last 2 digits
    var r = p.substring(p.length-2,p.length);

    //update the value
    obj.value = l + '.' + r;
}


var editor = null;
ClassicEditor.create(document.querySelector("#editor"), {
  toolbar: [
    "headings",
    "bold",
    "italic",
    "link",
    "bulletedList",
    "numberedList",
    "blockQuote",
    "insertimage",
    "undo",
    "redo"
  ]
})

ClassicEditor.create(document.querySelector("#editor2"), {
  toolbar: [
    "headings",
    "bold",
    "italic",
    "link",
    "bulletedList",
    "numberedList",
    "blockQuote",
    "insertimage",
    "undo",
    "redo"
  ]
})

  .then(editor => {
    //debugger;
    window.editor = editor;
  })
  .catch(error => {
    console.error(error);
  });


</script>

<?php require('invoice-add-new-client.php'); 

};?>



   