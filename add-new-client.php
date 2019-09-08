
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>

<div class="uk-width-3-4 uk-card uk-card-primary uk-card-body" >

<?php
ini_set('display_errors',1); error_reporting(E_ALL);

print_r($_POST);


$staff_id = '';
$firstname = '';
$lastname = '';
$address_line_1 = '';
$address_line_2 = '';
$company_name = '';
$city = '';
$state_region = '';
$email = '';
$postcode = '';
$phone_number = '';
$payment_type = '';
$password = '';
$staff_id = '';




if (isset($_POST['btn-add-client'])) {

// $staff_id = '';
// $firstname = '';
// $lastname = '';
// $address_line_1 = '';
// $address_line_2 = '';
// $company_name = '';
// $city = '';
// $state_region = '';
// $email = '';
// $postcode = '';
// $phone_number = '';
// $payment_type = '';
// $password = '';
// $staff_id = '';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address_line_1 = $_POST['address_line_1'];
$address_line_2 = $_POST['address_line_2'];
$company_name = $_POST['company_name'];
$city = $_POST['city'];
$state_region = $_POST['state_region'];
$email = $_POST['email'];
$postcode = $_POST['postcode'];
$phone_number = $_POST['phone_number'];
$payment_type = $_POST['payment_type'];
$password = $_POST['password'];
$staff_id = $row['userID'];

// $LAST_ID = $this->conn->lastInsertId();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters
    $stmt = $pdo->prepare("INSERT INTO clients (firstname, lastname, email, address_line_1,address_line_2,company_name,city,state_region,postcode,phone_number,payment_type,password,staff_id) 

VALUES ( :firstname, :lastname,  :email,  :address_line_1, :address_line_2, :company_name, :state_region, :city, :postcode, :phone_number, :payment_type, :password, :staff_id)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address_line_1', $address_line_1);
    $stmt->bindParam(':address_line_2', $address_line_2);
    $stmt->bindParam(':company_name', $company_name);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state_region', $state_region);
    $stmt->bindParam(':postcode', $postcode);
    $stmt->bindParam(':phone_number', $phone_number);
    $stmt->bindParam(':payment_type', $payment_type);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':staff_id', $staff_id);

// // insert a row
//     $firstname = $_POST["firstname"];
//     $lastname = $_POST["lastname"];

    $stmt->execute();

    echo "New records created successfully";
}

else {

var_dump($pdo->errorInfo());
}
// print_r($sql);

// header("LOCATION: add-new-client.php?successful");


if(isset($_GET['successful']))
{

echo '<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>Your account details have been edited successfully.</p>
</div>';
}

?>

<form action="" method="post" >

    <h3> Add A New Client </h3>
    <div class="uk-margin">
        <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" name="firstname" value="" placeholder="First Name" >
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" name="lastname" value="" placeholder="Last Name" >
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" name="address_line_1" value="" placeholder="Address Line 1" >
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" name="address_line_2" placeholder="Address Line 2" >
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" name="company_name" placeholder="Company Name" >
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" name="city" name="city" placeholder="City" >
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" name="email" value="" placeholder="Email Address" >
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" name="state_region" placeholder="State/Region" >
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-inline">
            <input class="uk-input uk-form-width-large" type="text" value="" name="postcode" placeholder="Postcode" >
        </div>
    </div>

    <div class="uk-margin">
        <select class="uk-select uk-form-width-large" name="country" placeholder="Country">
            <option name="country" value="Select a Country">Country</option>
            <option name="country" value="Afghanistan">Afghanistan</option>
            <option name="country" value="Åland Islands">Åland Islands</option>
            <option name="country" value="Albania">Albania</option>
            <option name="country" value="Algeria">Algeria</option>
            <option name="country" value="American Samoa">American Samoa</option>
            <option name="country" value="Andorra">Andorra</option>
            <option name="country" value="Angola">Angola</option>
            <option name="country" value="Anguilla">Anguilla</option>
            <option name="country" value="Antarctica">Antarctica</option>
            <option name="country" value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option name="country" value="Argentina">Argentina</option>
            <option name="country" value="Armenia">Armenia</option>
            <option name="country" value="Aruba">Aruba</option>
            <option name="country" value="Australia">Australia</option>
            <option name="country" value="Austria">Austria</option>
            <option name="country" value="Azerbaijan">Azerbaijan</option>
            <option name="country" value="Bahamas">Bahamas</option>
            <option name="country" value="Bahrain">Bahrain</option>
            <option name="country" value="Bangladesh">Bangladesh</option>
            <option name="country" value="Barbados">Barbados</option>
            <option name="country" value="Belarus">Belarus</option>
            <option name="country" value="Belgium">Belgium</option>
            <option name="country" value="Belize">Belize</option>
            <option name="country" value="Benin">Benin</option>
            <option name="country" value="Bermuda">Bermuda</option>
            <option name="country" value="Bhutan">Bhutan</option>
            <option name="country" value="Bolivia">Bolivia</option>
            <option name="country" value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option name="country" value="Botswana">Botswana</option>
            <option name="country" value="Bouvet Island">Bouvet Island</option>
            <option name="country" value="Brazil">Brazil</option>
            <option name="country" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option name="country" value="Brunei Darussalam">Brunei Darussalam</option>
            <option name="country" value="Bulgaria">Bulgaria</option>
            <option name="country" value="Burkina Faso">Burkina Faso</option>
            <option name="country" value="Burundi">Burundi</option>
            <option name="country" value="Cambodia">Cambodia</option>
            <option name="country" value="Cameroon">Cameroon</option>
            <option name="country" value="Canada">Canada</option>
            <option name="country" value="Cape Verde">Cape Verde</option>
            <option name="country" value="Cayman Islands">Cayman Islands</option>
            <option name="country" value="Central African Republic">Central African Republic</option>
            <option name="country" value="Chad">Chad</option>
            <option name="country" value="Chile">Chile</option>
            <option name="country" value="China">China</option>
            <option name="country" value="Christmas Island">Christmas Island</option>
            <option name="country" value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option name="country" value="Colombia">Colombia</option>
            <option name="country" value="Comoros">Comoros</option>
            <option name="country" value="Congo">Congo</option>
            <option name="country" value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
            <option name="country" value="Cook Islands">Cook Islands</option>
            <option name="country" value="Costa Rica">Costa Rica</option>
            <option name="country" value="Cote D'ivoire">Cote D'ivoire</option>
            <option name="country" value="Croatia">Croatia</option>
            <option name="country" value="Cuba">Cuba</option>
            <option name="country" value="Cyprus">Cyprus</option>
            <option name="country" value="Czech Republic">Czech Republic</option>
            <option name="country" value="Denmark">Denmark</option>
            <option name="country" value="Djibouti">Djibouti</option>
            <option name="country" value="Dominica">Dominica</option>
            <option name="country" value="Dominican Republic">Dominican Republic</option>
            <option name="country" value="Ecuador">Ecuador</option>
            <option name="country" value="Egypt">Egypt</option>
            <option name="country" value="El Salvador">El Salvador</option>
            <option name="country" value="Equatorial Guinea">Equatorial Guinea</option>
            <option name="country" value="Eritrea">Eritrea</option>
            <option name="country" value="Estonia">Estonia</option>
            <option name="country" value="Ethiopia">Ethiopia</option>
            <option name="country" value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
            <option name="country" value="Faroe Islands">Faroe Islands</option>
            <option name="country" value="Fiji">Fiji</option>
            <option name="country" value="Finland">Finland</option>
            <option name="country" value="France">France</option>
            <option name="country" value="French Guiana">French Guiana</option>
            <option name="country" value="French Polynesia">French Polynesia</option>
            <option name="country" value="French Southern Territories">French Southern Territories</option>
            <option name="country" value="Gabon">Gabon</option>
            <option name="country" value="Gambia">Gambia</option>
            <option name="country" value="Georgia">Georgia</option>
            <option name="country" value="Germany">Germany</option>
            <option name="country" value="Ghana">Ghana</option>
            <option name="country" value="Gibraltar">Gibraltar</option>
            <option name="country" value="Greece">Greece</option>
            <option name="country" value="Greenland">Greenland</option>
            <option name="country" value="Grenada">Grenada</option>
            <option name="country" value="Guadeloupe">Guadeloupe</option>
            <option name="country" value="Guam">Guam</option>
            <option name="country" value="Guatemala">Guatemala</option>
            <option name="country" value="Guernsey">Guernsey</option>
            <option name="country" value="Guinea">Guinea</option>
            <option name="country" value="Guinea-bissau">Guinea-bissau</option>
            <option name="country" value="Guyana">Guyana</option>
            <option name="country" value="Haiti">Haiti</option>
            <option name="country" value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
            <option name="country" value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
            <option name="country" value="Honduras">Honduras</option>
            <option name="country" value="Hong Kong">Hong Kong</option>
            <option name="country" value="Hungary">Hungary</option>
            <option name="country" value="Iceland">Iceland</option>
            <option name="country" value="India">India</option>
            <option name="country" value="Indonesia">Indonesia</option>
            <option name="country" value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
            <option name="country" value="Iraq">Iraq</option>
            <option name="country" value="Ireland">Ireland</option>
            <option name="country" value="Isle of Man">Isle of Man</option>
            <option name="country" value="Israel">Israel</option>
            <option name="country" value="Italy">Italy</option>
            <option name="country" value="Jamaica">Jamaica</option>
            <option name="country" value="Japan">Japan</option>
            <option name="country" value="Jersey">Jersey</option>
            <option name="country" value="Jordan">Jordan</option>
            <option name="country" value="Kazakhstan">Kazakhstan</option>
            <option name="country" value="Kenya">Kenya</option>
            <option name="country" value="Kiribati">Kiribati</option>
            <option name="country" value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
            <option name="country" value="Korea, Republic of">Korea, Republic of</option>
            <option name="country" value="Kuwait">Kuwait</option>
            <option name="country" value="Kyrgyzstan">Kyrgyzstan</option>
            <option name="country" value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
            <option name="country" value="Latvia">Latvia</option>
            <option name="country" value="Lebanon">Lebanon</option>
            <option name="country" value="Lesotho">Lesotho</option>
            <option name="country" value="Liberia">Liberia</option>
            <option name="country" value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option name="country" value="Liechtenstein">Liechtenstein</option>
            <option name="country" value="Lithuania">Lithuania</option>
            <option name="country" value="Luxembourg">Luxembourg</option>
            <option name="country" value="Macao">Macao</option>
            <option name="country" value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
            <option name="country" value="Madagascar">Madagascar</option>
            <option name="country" value="Malawi">Malawi</option>
            <option name="country" value="Malaysia">Malaysia</option>
            <option name="country" value="Maldives">Maldives</option>
            <option name="country" value="Mali">Mali</option>
            <option name="country" value="Malta">Malta</option>
            <option name="country" value="Marshall Islands">Marshall Islands</option>
            <option name="country" value="Martinique">Martinique</option>
            <option name="country" value="Mauritania">Mauritania</option>
            <option name="country" value="Mauritius">Mauritius</option>
            <option name="country" value="Mayotte">Mayotte</option>
            <option name="country" value="Mexico">Mexico</option>
            <option name="country" value="Micronesia, Federated States of">Micronesia, Federated States of</option>
            <option name="country" value="Moldova, Republic of">Moldova, Republic of</option>
            <option name="country" value="Monaco">Monaco</option>
            <option name="country" value="Mongolia">Mongolia</option>
            <option name="country" value="Montenegro">Montenegro</option>
            <option name="country" value="Montserrat">Montserrat</option>
            <option name="country" value="Morocco">Morocco</option>
            <option name="country" value="Mozambique">Mozambique</option>
            <option name="country" value="Myanmar">Myanmar</option>
            <option name="country" value="Namibia">Namibia</option>
            <option name="country" value="Nauru">Nauru</option>
            <option name="country" value="Nepal">Nepal</option>
            <option name="country" value="Netherlands">Netherlands</option>
            <option name="country" value="Netherlands Antilles">Netherlands Antilles</option>
            <option name="country" value="New Caledonia">New Caledonia</option>
            <option name="country" value="New Zealand">New Zealand</option>
            <option name="country" value="Nicaragua">Nicaragua</option>
            <option name="country" value="Niger">Niger</option>
            <option name="country" value="Nigeria">Nigeria</option>
            <option name="country" value="Niue">Niue</option>
            <option name="country" value="Norfolk Island">Norfolk Island</option>
            <option name="country" value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option name="country" value="Norway">Norway</option>
            <option name="country" value="Oman">Oman</option>
            <option name="country" value="Pakistan">Pakistan</option>
            <option name="country" value="Palau">Palau</option>
            <option name="country" value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
            <option name="country" value="Panama">Panama</option>
            <option name="country" value="Papua New Guinea">Papua New Guinea</option>
            <option name="country" value="Paraguay">Paraguay</option>
            <option name="country" value="Peru">Peru</option>
            <option name="country" value="Philippines">Philippines</option>
            <option name="country" value="Pitcairn">Pitcairn</option>
            <option name="country" value="Poland">Poland</option>
            <option name="country" value="Portugal">Portugal</option>
            <option name="country" value="Puerto Rico">Puerto Rico</option>
            <option name="country" value="Qatar">Qatar</option>
            <option name="country" value="Reunion">Reunion</option>
            <option name="country" value="Romania">Romania</option>
            <option name="country" value="Russian Federation">Russian Federation</option>
            <option name="country" value="Rwanda">Rwanda</option>
            <option name="country" value="Saint Helena">Saint Helena</option>
            <option name="country" value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option name="country" value="Saint Lucia">Saint Lucia</option>
            <option name="country" value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option name="country" value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
            <option name="country" value="Samoa">Samoa</option>
            <option name="country" value="San Marino">San Marino</option>
            <option name="country" value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option name="country" value="Saudi Arabia">Saudi Arabia</option>
            <option name="country" value="Senegal">Senegal</option>
            <option name="country" value="Serbia">Serbia</option>
            <option name="country" value="Seychelles">Seychelles</option>
            <option name="country" value="Sierra Leone">Sierra Leone</option>
            <option name="country" value="Singapore">Singapore</option>
            <option name="country" value="Slovakia">Slovakia</option>
            <option name="country" value="Slovenia">Slovenia</option>
            <option name="country" value="Solomon Islands">Solomon Islands</option>
            <option name="country" value="Somalia">Somalia</option>
            <option name="country" value="South Africa">South Africa</option>
            <option name="country" value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
            <option name="country" value="Spain">Spain</option>
            <option name="country" value="Sri Lanka">Sri Lanka</option>
            <option name="country" value="Sudan">Sudan</option>
            <option name="country" value="Suriname">Suriname</option>
            <option name="country" value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option name="country" value="Swaziland">Swaziland</option>
            <option name="country" value="Sweden">Sweden</option>
            <option name="country" value="Switzerland">Switzerland</option>
            <option name="country" value="Syrian Arab Republic">Syrian Arab Republic</option>
            <option name="country" value="Taiwan, Province of China">Taiwan, Province of China</option>
            <option name="country" value="Tajikistan">Tajikistan</option>
            <option name="country" value="Tanzania, United Republic of">Tanzania, United Republic of</option>
            <option name="country" value="Thailand">Thailand</option>
            <option name="country" value="Timor-leste">Timor-leste</option>
            <option name="country" value="Togo">Togo</option>
            <option name="country" value="Tokelau">Tokelau</option>
            <option name="country" value="Tonga">Tonga</option>
            <option name="country" value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option name="country" value="Tunisia">Tunisia</option>
            <option name="country" value="Turkey">Turkey</option>
            <option name="country" value="Turkmenistan">Turkmenistan</option>
            <option name="country" value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option name="country" value="Tuvalu">Tuvalu</option>
            <option name="country" value="Uganda">Uganda</option>
            <option name="country" value="Ukraine">Ukraine</option>
            <option name="country" value="United Arab Emirates">United Arab Emirates</option>
            <option name="country" value="United Kingdom">United Kingdom</option>
            <option name="country" value="United States">United States</option>
            <option name="country" value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option name="country" value="Uruguay">Uruguay</option>
            <option name="country" value="Uzbekistan">Uzbekistan</option>
            <option name="country" value="Vanuatu">Vanuatu</option>
            <option name="country" value="Venezuela">Venezuela</option>
            <option name="country" value="Viet Nam">Viet Nam</option>
            <option name="country" value="Virgin Islands, British">Virgin Islands, British</option>
            <option name="country" value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
            <option name="country" value="Wallis and Futuna">Wallis and Futuna</option>
            <option name="country" value="Western Sahara">Western Sahara</option>
            <option name="country" value="Yemen">Yemen</option>
            <option name="country" value="Zambia">Zambia</option>
            <option name="country" value="Zimbabwe">Zimbabwe</option>
        </select>
    </div>
    <div class="uk-margin">
        <div class="uk-inline">
            <input class="uk-input uk-form-width-large" name="phone_number" type="text" value="" placeholder="Phone Number" >
        </div>
    </div>

    <div class="uk-margin">
        <select name="payment_type" class="uk-select uk-form-width-large" placeholder=" Payment Method">
            <option value="Select a Payment Method">Select a Payment Method</option>
            <option value="Paypal">Paypal</option>
            <option value="Bank Transfer">Paypal</option>
            <option value="Credit/Debt Card"> Credit/Debt Card</option>
        </select>
    </div>
    <div class="uk-margin">
        <select class="uk-select uk-form-width-large" name="currency" placeholder="Currency">
            <option name="currency" value="Select a Payment Method">Currency </option>
            <option  name="currency" value="Paypal">USD</option>
            <option  name="currency" value="Bank Transfer">GBP</option>
        </select>
    </div>

    <div class="uk-margin">
        <div class="uk-inline">
            <input name="password" class="uk-input uk-form-width-large" type="text" value="" placeholder="Password" >
        </div>
    </div>

  
          <input type="submit" value="Add New Client" name="btn-add-client" class="uk-button uk-button-primary">
    </form>
</div>
