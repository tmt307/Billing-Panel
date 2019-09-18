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
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
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

<td width="50%" style="color:#000; "><br />123 Anystreet<br />Your City<br />GD12 4LP<br /><span style="font-family:Arial;">&#9742;</span> 01777 123 567</td>
<td width="50%" style="text-align: right;">

<span style="font-weight: bold; font-size: 14pt;"></span>
<br />123 Anystreet<br />Your City2
<br />GD12 4LP<br />
<span style="font-family:Arial;"></span> 
01777 123 567</td>

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
mpdf-->
<div style="text-align: right">Date: 13th November 2008</div>
<table width="100%" style="font-family: serif;" cellpadding="10"><tr>


</tr></table>
<br />
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="10%">Item</td>
<td width="15%"> Price</td>
<td width="15%">Quantity</td>
<td width="15%">Total</td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->
<tr>

<td align="center">'. $invoice['id'] .'</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td class="cost">&pound;12.26</td>
<td class="cost">&pound;325.60</td>
</tr>
<!-- END ITEMS HERE -->
<tr>
<td class="blanktotal" colspan="3" rowspan="6"></td>
<td class="totals">Subtotal:</td>
<td class="totals cost">&pound;1825.60</td>
</tr>
<tr>
<td class="totals">Tax:</td>
<td class="totals cost">&pound;18.25</td>
</tr>
<tr>
<td class="totals">Shipping:</td>
<td class="totals cost">&pound;42.56</td>
</tr>
<tr>
<td class="totals"><b>TOTAL:</b></td>
<td class="totals cost"><b>&pound;1882.56</b></td>
</tr>
<tr>
<td class="totals">Deposit:</td>
<td class="totals cost">&pound;100.00</td>
</tr>
<tr>
<td class="totals"><b>Balance due:</b></td>
<td class="totals cost"><b>&pound;1782.56</b></td>
</tr>
</tbody>
</table>
<div style="text-align: center; font-style: italic;">Payment terms: payment due in 30 days</div>
</body>
</html>
';

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
$mpdf->SetTitle($websitename);
$mpdf->SetAuthor($websitename);
$mpdf->SetWatermarkText($invoice['invoice_status']);
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'Arial';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output('invoices/invoice-'.$invoice['id'].'-'.$invoice['invoicekey'].'.pdf', 'F');
}; };
?>