
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>

<style type="text/css">
  .ck-editor__editable {
    min-height: 259px;
}
</style>


<div class="uk-width-1-2 uk-card uk-card-primary uk-card-body" >
  <h3>Create a new invoice </h3>

<?php
ini_set('display_errors',1); error_reporting(E_ALL);

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
$staff_id = $row['userID'];


 
$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                     .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                     .'0123456789'); // and any other characters
    shuffle($seed); // probably optional since array_is randomized; this may be redundant
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


$staff_id = $_POST['client_id'];


// $LAST_ID = $this->conn->lastInsertId();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters
$stmt = $pdo->prepare("INSERT INTO invoices (price,qty,total,description_of_invoice,client_id,currency,taxable,terms_of_service,invoice_status,type_of_invoice, payment_type,due_date,payment_terms_date,staff_id,invoicekey) 

VALUES (:price, :qty, :total, :description_of_invoice, :client_id, :currency, :taxable, :terms_of_service, :invoice_status, :type_of_invoice, :payment_type, :due_date, :payment_terms_date, :staff_id, :invoicekey)");
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
    $stmt->bindParam(':payment_terms_date', $payment_terms_date);
   $stmt->bindParam(':invoicekey', $invoicekey);
    $stmt->bindParam(':staff_id', $staff_id);
    $stmt->execute();

echo '<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p class="uk-text-capitalize">The invoice has been created Successfully</p>
</div>';

require 'generated-pdf.php';


}


else {

var_dump($pdo->errorInfo());
}


?>


<form action="create-pdf.php" method="post" >

  <br />
  <div  class="uk-child-width-expand uk-grid-small uk-text-center" uk-grid>
    <div class="uk-width-1-3@s">
      <input class="uk-input" id="price" type="text" required oninput="setTwoNumberDecimal(this)" step="0.01" value="0.00" type="number" name="price" oninput="calculate();" placeholder="Price">
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
       <select required name="taxable" class="uk-select uk-form-width-large" >
       <option  value="" disabled selected>Taxable</option>
        <option  value="yes" >Yes</option>
        <option  value="no" >No</option>
      </select>
    </div>
  </div>
        <br />

 <textarea name="terms_of_service" id="editor2" placeholder="Terms Of Service"> </textarea>


</div>

<div class="uk-width-1-4 uk-card uk-card-default uk-card-body" >
  <h3> Select a client </h3>
  <select class="uk-select" required name="client_id" >
    <option value="" disabled selected>Select a Client</option>
    <?php $clients = $pdo->query("SELECT * FROM clients")->fetchAll(); ?>
    <?php  foreach ($clients as $client) {?>
    <option  name="client_id"  value="<?php echo $client['id']; ?>"><?php echo $client['firstname']; ?> <?php echo $client['lastname']; ?> ( <?php echo $client['company_name']; ?> ) </option>
    <?php };?>
  </select>

  
  </select>
  <h3>OR </h3>
  <a class="uk-button uk-button-default" href="#modal-sections"  uk-toggle>Add A New Client</a>
  <div id="modal-sections" uk-modal>
    <div class="uk-modal-dialog">
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <div class="uk-modal-header">
        <h2 class="uk-modal-title">Add A New Client</h2>
      </div>
      <div class="uk-width-1-1 uk-card uk-card-default uk-card-body" >
        <div class="uk-margin">
          <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" placeholder="First Name" >
          </div>
        </div>
        <div class="uk-margin">
          <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" placeholder="Last Name" >
          </div>
        </div>
        <div class="uk-margin">
          <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" placeholder="Address Line 1" >
          </div>
        </div>
        <div class="uk-margin">
          <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" placeholder="Address Line 2" >
          </div>
        </div>
        <div class="uk-margin">
          <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" placeholder="Company Name" >
          </div>
        </div>
        <div class="uk-margin">
          <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" placeholder="City" >
          </div>
        </div>
        <div class="uk-margin">
          <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text"  value="<?php echo $row['userEmail']; ?>" placeholder="Email Address" >
          </div>
        </div>
        <div class="uk-margin">
          <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" placeholder="State/Region" >
          </div>
        </div>
        <div class="uk-margin">
          <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" placeholder="Postcode" >
          </div>
        </div>
        <div class="uk-margin">
          <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" placeholder="Postcode" >
          </div>
        </div>
        <div class="uk-margin">
          <select class="uk-select uk-form-width-large" placeholder="Country">
            <option value="Select a Country">Country</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Åland Islands">Åland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="Brunei Darussalam">Brunei Darussalam</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Cote D'ivoire">Cote D'ivoire</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guernsey">Guernsey</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-bissau">Guinea-bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
            <option value="Iraq">Iraq</option>
            <option value="Ireland">Ireland</option>
            <option value="Isle of Man">Isle of Man</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jersey">Jersey</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
            <option value="Korea, Republic of">Korea, Republic of</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macao">Macao</option>
            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
            <option value="Moldova, Republic of">Moldova, Republic of</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="Netherlands Antilles">Netherlands Antilles</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn">Pitcairn</option>
            <option value="Poland">Poland</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Reunion">Reunion</option>
            <option value="Romania">Romania</option>
            <option value="Russian Federation">Russian Federation</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Helena">Saint Helena</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
            <option value="Thailand">Thailand</option>
            <option value="Timor-leste">Timor-leste</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Viet Nam">Viet Nam</option>
            <option value="Virgin Islands, British">Virgin Islands, British</option>
            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
            <option value="Wallis and Futuna">Wallis and Futuna</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
          </select>
        </div>
        <div class="uk-margin">
          <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" placeholder="Phone Number" >
          </div>
        </div>
        <div class="uk-margin">
          <select  name="payment_type" class="uk-select uk-form-width-large" >
                <option value="" disabled selected>Select a Payment Method</option>
            <option  value="Paypal">Paypal</option>
            <option value="Bank Transfer">Paypal</option>
            <option value="Credit/Debt Card"> Credit/Debt Card</option>
          </select>
        </div>
        <div class="uk-margin">
          <select class="uk-select uk-form-width-large" >
                <option value="" disabled selected>Select a Payment Method</option>
            <option value="Paypal">USD</option>
            <option value="Bank Transfer">GBP</option>
          </select>
        </div>
        <div class="uk-margin">
          <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" placeholder="Password" >
          </div>
        </div>
        <div class="uk-modal-footer uk-text-right">
          <button class="uk-button uk-button-primary" type="button">Save</button>
        </div> 
      </div>

    </div>

  </div>
<br/>
<br/>
    <div class="uk-width-1-1">
      <select reqiuired name="invoice_status" class="uk-select">
       <option disabled selected>Select Invoice Status</option>
        <option value="Outstanding">Outstanding</option>
        <option value="Paid" >Paid</option>
        <option value="Unpaid">Unpaid</option>
        <option value="Cancelled" >Cancelled</option>
      </select>
    </div>
<br/>
    <div class="uk-width-1-1">
      <select reqiuired name="payment_type" class="uk-select">
       <option disabled selected>Select payment Type</option>
        <option value="Paypal">Paypal</option>
        <option value="Credit/Debt" >credit/debt</option>

      </select>
    </div>



    <div class="uk-width-1-1">

           <br />
      <select  name="type_of_invoice" class="uk-select">
        <option>Select Type of invoice</option>
            <?php $currencies = $pdo->query("SELECT * FROM currencies")->fetchAll();
                  foreach ($currencies as $currency) {?>
            <option  name="currency" value="<?php echo $currency['currency_name']; ?>"><?php echo $currency['currency_name']; ?></option>
        <?php }; ?>
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
        var total = price * qty;
          document.getElementById('total').value = total;

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