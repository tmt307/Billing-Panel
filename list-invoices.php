
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>


<div class="uk-width-3-4 ">
    <div class="uk-card uk-card-primary uk-card-body">
        <h3>List Invoices </h3>
        <table class="uk-table uk-table-middle uk-table-divider">
            <thead>
                <tr>
                    <th >#</th>
                    <th>Account Name</th>
                    <th>Amount</th>
                    <th>Invoice Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1244</td>
                    <td>John Doe (EYPIC Dzn)</td>
                    <td>£150.00</td>
                    <td>01/12/2018</td>
                    <td>01/22/2018</td>
                    <td>Paid</td>                    
                    <td>One Time</td>
                    <td><button class="uk-button uk-button-default" type="button">View Invoice</button></td>
                </tr>
            </tbody>

        </table>
    </div>
</div>

<?php require_once('includes/footer.php'); ?>

