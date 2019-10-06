
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>

<style type="text/css">
  .ck-editor__editable {
    min-height: 259px;
}
</style>


<?php if (isset($_GET['invoicekey'])) { 
$invoicekey = $_GET['invoicekey'];
$invoices = $pdo->query("SELECT * FROM invoices WHERE invoicekey = '$invoicekey' ")->fetchAll(); 


foreach ($invoices as $getinvoice) { ?>
<div class="uk-width-1-2 uk-card uk-card-primary uk-card-body" >
  <h3>Editing invoice #<?php echo $getinvoice['id']; ?> </h3>
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
$staff_id = $getinvoice['staff_id'];


// $seed = str_split('abcdefghijklmnopqrstuvwxyz'
// .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
//  .'0123456789'); 

// shuffle($seed); 
// $rand = '';
// foreach (array_rand($seed, 2) as $k) $rand .= $seed[$k];

   // echo $rand;

//echo $invoicekey;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (isset($_POST['btn-create-invoice'])) {
$id = $_GET['invoicekey'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$total = $_POST['total'];
$description_of_invoice = $_POST['description_of_invoice'];
$client_id = $getinvoice['staff_id'];
$currency = $_POST['currency'];
$taxable = $_POST['taxable'];
$terms_of_service = $_POST['terms_of_service'];
$invoice_status = $_POST['invoice_status'];
$type_of_invoice = $_POST['type_of_invoice'];
$due_date = $_POST['due_date'];
$payment_terms_date = $_POST['payment_terms_date'];
$payment_type = $_POST['payment_type'];
$invoice_created =  date("Y-m-d");
$staff_id = $getinvoice['staff_id'];
$id = $getinvoice['id'];


// echo $id;
// $LAST_ID = $this->conn->lastInsertId();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters

$sql = "UPDATE invoices SET price=:price,
qty=:qty,
total=:total,
description_of_invoice=:description_of_invoice,
client_id=:client_id,
currency=:currency,
taxable=:taxable,
terms_of_service=:terms_of_service,
invoice_status=:invoice_status,
type_of_invoice=:type_of_invoice,
payment_type=:payment_type,
due_date=:due_date,
invoice_created=:invoice_created,
payment_terms_date=:payment_terms_date,
staff_id=:staff_id,
invoicekey=:invoicekey
WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':price' => $price,
':qty' => $qty,
':total' => $total,
':description_of_invoice' => $description_of_invoice,
':client_id' => $client_id,
':currency' => $currency,
':taxable' => $taxable,
':terms_of_service' => $terms_of_service,
':invoice_status' => $invoice_status,
':type_of_invoice' => $type_of_invoice,
':payment_type' => $payment_type,
':due_date' => $due_date,
':invoice_created' => $invoice_created,
':payment_terms_date' => $payment_terms_date,
':staff_id' => $staff_id,
':invoicekey' => $invoicekey,
':id' => $id, 

));

 header('Location: '.$_SERVER['REQUEST_URI']);


echo '<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p class="uk-text-capitalize">Invoice #'.$id.' has been updated Successfully</p>
</div>';

}


else {

var_dump($pdo->errorInfo());
}


?>

<form action="" method="post" >
    <br />
    <div  class="uk-child-width-expand  uk-grid-small uk-text-center" uk-grid>
        <div class="uk-width-1-3@s">
            <label class="uk-form-label uk-text-left" for="uk-form-label">Price</label>
            <input class="uk-input" id="price" type="text" required oninput="setTwoNumberDecimal(this)" step="0.01"  value="<?php if (!empty($getinvoice['price'])) { echo $getinvoice['price']; } ?>" type="number" name="price" oninput="calculate();" placeholder="Price">
        </div>

        <div class="uk-width-1-3@s">
            <label class="uk-form-label uk-text-left" for="uk-form-label">Quantity</label>
            <input class="uk-input" type="text"  oninput="calculate();" id="qty"  value="<?php if (!empty($getinvoice['qty'])) { echo $getinvoice['qty']; } ?>" required name="qty" placeholder="Quantity">
        </div>
        <div class="uk-width-1-3@s">
            <label class="uk-form-label uk-text-left" for="uk-form-label">Total</label>
            <input class="uk-input"  id="total" required  value="<?php if (!empty($getinvoice['total'])) { echo $getinvoice['total']; } ?>" name="total" placeholder="Total">
        </div>
    </div>
    <br />
    <label class="uk-form-label uk-text-left" for="uk-form-label">Description Of Invoice</label>
    <br />    <br />
    <textarea name="description_of_invoice" id="editor" placeholder="Description Of Invoice"> </textarea>
    <br />
    <div class="uk-child-width-expand uk-grid-small uk-text-center" uk-grid>
        <div class="uk-width-1-2">
            <label class="uk-form-label uk-text-left" for="uk-form-label">Select Currancey</label>
            <select required name="currency" class="uk-select uk-form-width-large" >
          <option disabled selected <?php if (!empty($getinvoice['currency'])) { echo $getinvoice['currency']; } ?> ><?php if (!empty($getinvoice['currency'])) { echo $getinvoice['currency']; } ?></option>   
               <option value="Outstanding">Outstanding</option>
                <option value="USD">USD</option>
                <option value="GBP">GBP</option>
            </select>
        </div>
        
        <div class="uk-width-1-2">
            <label class="uk-form-label uk-text-left" for="uk-form-label">Taxable</label>
            <select required name="taxable" class="uk-select  uk-form-width-large" >
          <option disabled selected <?php if (!empty($getinvoice['taxable'])) { echo $getinvoice['taxable']; } ?> ><?php if (!empty($getinvoice['taxable'])) { echo $getinvoice['taxable']; } ?></option>        <option value="Outstanding">Outstanding</option>
                <option  value="yes" >Yes</option>
                <option  value="no" >No</option>
            </select>
        </div>
    </div>
    <br />
        <label class="uk-form-label uk-text-left" for="uk-form-label">Terms Of Service</label>
        <br/> <br />
    <textarea name="terms_of_service" id="editor2" placeholder="Terms Of Service"> </textarea>
</div>
<div class="uk-width-1-3  uk-card uk-card-default uk-card-body" >

</select>

<br/>
<br/>
<div class="uk-width-1-1">
            <label class="uk-form-label uk-text-left" for="uk-form-label">Invoice Status</label>
    <select reqiuired name="invoice_status" class="uk-select">
          <option disabled selected <?php if (!empty($getinvoice['invoice_status'])) { echo $getinvoice['invoice_status']; } ?> ><?php if (!empty($getinvoice['invoice_status'])) { echo $getinvoice['invoice_status']; } ?></option>        <option value="Outstanding">Outstanding</option>
        <option value="Paid" >Paid</option>
        <option value="Unpaid">Unpaid</option>
        <option value="Cancelled" >Canceled</option>
    </select>
</div>
<br/>
<div class="uk-width-1-1">
     <label class="uk-form-label uk-text-left" for="uk-form-label">Payment Type</label>
    <select reqiuired name="payment_type" class="uk-select">
          <option disabled selected <?php if (!empty($getinvoice['payment_type'])) { echo $getinvoice['payment_type']; } ?> ><?php if (!empty($getinvoice['payment_type'])) { echo $getinvoice['payment_type']; } ?></option>
        <option value="Paypal">Paypal</option>
        <option value="Credit/Debt" >Credit/debt</option>
    </select>
</div>
<div class="uk-width-1-1">
    <br />
     <label class="uk-form-label uk-text-left" for="uk-form-label">Type Of Invoice</label>

    <select  name="type_of_invoice"  class="uk-select">
        <option disabled selected <?php if (!empty($getinvoice['type_of_invoice'])) { echo $getinvoice['type_of_invoice']; } ?> ><?php if (!empty($getinvoice['type_of_invoice'])) { echo $getinvoice['type_of_invoice']; } ?></option>
        <option  name="type_of_invoice"  value="Recurring" >Recurring </option>
        <option  name="type_of_invoice" value="One Time Payment"  >One Time Payment </option>

    </select>
</div>
<br />
     <label class="uk-form-label uk-text-left" for="uk-form-label">Due Date</label>

<input type="text" class=" uk-input" name="due_date" value="<?php if (!empty($getinvoice['due_date'])) { echo $getinvoice['due_date']; } ?>" placeholder="Select Due Date" id="calendar-tomorrow">
<br />
<br />
     <label class="uk-form-label uk-text-left" for="uk-form-label">Payment Terms Date</label>

<input type="text" class=" uk-input" value="<?php if (!empty($getinvoice['payment_terms_date'])) { echo $getinvoice['payment_terms_date']; } ?>"   name="payment_terms_date" placeholder="Select Payment Terms" id="calendar-tomorrow">
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

<?php }; } ?>