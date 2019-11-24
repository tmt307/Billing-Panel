<?php require_once('includes/header.php'); ?>
<?php require_once('includes/navbar.php'); ?>



        <?php if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // echo $id;
        $sql = "DELETE FROM invoices WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':id' => $id));
        header("LOCATION: list-invoices.php?deleted");
        }
        if(isset($_GET['deleted']))
        {
        echo '<div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p class="uk-text-capitalized">The invoice has been deleted successfully.</p>
        </div>';
        } ?>
        <h3>List Invoices </h3>
        <table class="uk-table uk-table-middle uk-table-divider">
            <thead>
                <tr>
                    <th >#</th>
                    <th>Account Name</th>
                    <th>Amount</th>
                    <th>Invoice Date</th>
                    <th>Due Date</th>
                    <th>Invoice</th>
                    <th>Status</th>
                    <th>INVOICE TYPE </th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody> <?php $invoices = $pdo->query("SELECT * FROM invoices")->fetchAll();?>
                <?php  foreach ($invoices as $invoice) {?>
                <tr>
                    <?php $invoice_id = $invoice['client_id']; ?>
                    <td><?php echo $invoice['id'] ?></td>
                    <?php $clients = $pdo->query("SELECT * FROM clients WHERE id = '$invoice_id' ")->fetchAll(); ?>
                    <?php  foreach ($clients as $client) {?>
                    <td><?php // echo $client['firstname']; ?>
                        <?php echo $client['lastname']; ?>
                    (<?php echo $client['company_name']; ?>)</td>
                    <?php }; ?>
                    <td><?php echo $invoice['price']; ?></td>
                    <td><?php echo $invoice['invoice_created']; ?></td>
                    <td><?php echo $invoice['payment_terms_date']; ?></td>
                    <td><?php echo $invoice['due_date']; ?></td>
                    <td><?php echo $invoice['invoice_status']; ?></td>
                    <td><?php echo $invoice['type_of_invoice'];?></td>
                    <td>
                        <a class="uk-button uk-button-success "
                        style="margin:5px;width: 200px" href="view-invoice.php?invoicekey=<?php echo $invoice['invoicekey']?>" type="button">View Invoice</a>
                        <br />  



                          <a class="uk-button uk-button-primary "
                        style="margin:5px;width: 200px" href="invoice.php?invoicekey=<?php echo $invoice['invoicekey']?>" type="button">Edit Invoice</a>
                        <br />  



                        <form action="list-invoices.php?id=<?php echo $invoice['id'];?>" method="post">
                            <input style="margin:5px;width: 200px" class="uk-button uk-button-danger" name="btn-delete" type="submit" onclick="return confirm('Are you sure you want delete this Invoice?')" value="Delete Invoice">
                        </form>
                        <?php };?>
                    </tr>
                </tbody>
            </table>
    </div>
    <?php require_once('includes/footer.php'); ?>