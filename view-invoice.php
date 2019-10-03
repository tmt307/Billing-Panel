<?php 
require_once("vendor/pdf/autoload.php");  ?>

<?php require_once('includes/database-config.php'); ?>


<?php 
/* Start to develop here. Best regards https://php-download.com/ */
if (isset($_GET['invoicekey'])) {
// $id = $_GET['id'];



$invoicekey = $_GET['invoicekey'];
$invoices = $pdo->query("SELECT * FROM invoices WHERE invoicekey = '$invoicekey' ")->fetchAll(); 
//print_r($invoices);
if (!empty($invoices)){ 	
foreach($invoices as $invoice) {


$clientid = $invoice['client_id'];

$selectedclients = $pdo->query("SELECT * FROM clients WHERE id = '$clientid' ")->fetchAll(); 

$currency = $invoice['currency'];


$currencies = $pdo->query("SELECT * FROM currencies WHERE currency_name = '$currency' ")->fetchAll(); 

foreach($currencies as $currencey) {

foreach($selectedclients as $selectedclient) {

print_r($selectedclient);


$tax = $currencey['tax_amount'];

if ($invoice['taxable'] == 'no') {

	$tax = 0;
}

$num = $invoice['total'];
$percentage = $tax;
$num += $num*($percentage/100);


$html = '
<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: left;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}

.gray{
background-color:#EEEEEE;
}
</style>
</head>
<body>
<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<br />
<td width="80%" style="color:#000; "><span style="font-weight: bold; font-size: 14pt;">'. $websitename .'</span></td>
<td width="19%" style="color:#000; "><span style="font-weight: bold; font-size: 14pt;text-align:right">Invoice # '. $invoice['id'] .'</span></td>
</tr>
</table>
</table>



<table width="100%"><tr>
<br /> 
<td width="50%" style="color:#000; "> <br />
'.$websitename.' <br />
'.$accountfirstname.' '.$accountsurname.'
<br />
'.$account1stlineofaddress.'
<br />
'.$accountstate.' <br />
'.$accountcity.'<br />
'.$accountpostcode.'<br />



<td width="50%" style="text-align: right;"><br />


<span style="font-weight: bold; font-size: 14pt;"></span> <br/ > 
'.$selectedclient['company_name'].' <br />
'.$selectedclient['firstname'].' <br/ >
'.$selectedclient['lastname'].'  <br/ >
<br />
'.$selectedclient['address_line_1'].' <br />
'.$selectedclient['state_region'].' <br />
'.$selectedclient['city'].' <br />
'.$selectedclient['postcode'].' <br />


</td>
</tr>
</table>
</htmlpageheader>
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />

<hr />


<br />

<br />


<table class="items"  width="256px" style="font-size: 9pt;margin-left:80%; border-collapse: collapse; " cellpadding="11">
<tbody >
<tr >
<td class="totals gray">INVOICE #</td>
<td class="totals">'. $invoice['id'] .'</td>
</tr>
<tr>
<td class="totals gray">Status</td>
<td class="totals">'. $invoice['invoice_status'] .'</td>
</tr>
<tr>
<td class="totals gray">Invoice Date</td>
<td class="totals">'. $invoice['invoice_created'] .'</td>
</tr>
<tr>
<td class="totals gray">Due Date</td>
<td class="totals">'. $invoice['due_date'] .'</td>
</tr>
<tr>
<td class="totals gray">Payment Terms</td>
<td class="totals">'. $invoice['payment_terms_date'] .'</td>
</tr>

</tbody>
</table>
<br />


<br />
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="50%">Item Description </td>
<td width="10%">Price</td>
<td width="15%">Quantity</td>
<td width="15%">Total</td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->
<tr>

<td align="center">'. $invoice['description_of_invoice'] .'</td>
<td align="center" >'.$currencey['currency_symbol'].''. $invoice['price'] .'</td>
<td class="cost">'. $invoice['qty'] .'</td>
<td class="cost">'.$currencey['currency_symbol'].''. $invoice['total'] .'</td>
</tr>
<!-- END ITEMS HERE -->
<tr>
<td class="blanktotal"  colspan="2" rowspan="3"></td>
</tr>
<tr>
<td style="text-align:center;" class=" totals">Tax:</td>
<td   align="center" class=" totals cost">'.$tax.'%</td>
</tr>

<tr>
<td style="text-align:center;" class=" totals"><b>Grand Total:</b></td>
<td  align="center" class=" totals cost"><b>' .$currencey['currency_symbol'].''.$num. ' </b></td>
</tr>


</tbody>
</table>

<table class="items" width="100%" style="font-size: 9pt; margin-top:10%; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="100%"><b>Terms of Service</b></td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->


<tr>
<td class="text-left">'.$termsofservice.'</td>
</tr>

</tbody>
</table>


</body>
</html>
';
}
}
}
// $path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
// // require_once $path . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle($websitename );
$mpdf->SetAuthor($websitename);
$mpdf->SetWatermarkText($invoice['invoice_status']);
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'Arial';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output('invoices/invoice-'.$invoice['id'].'-'.$invoice['invoicekey'].'.pdf', 'i');
}; };
?> 