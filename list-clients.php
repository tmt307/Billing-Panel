
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>

<?php $clients = $pdo->query("SELECT * FROM clients")->fetchAll(); ?>


<?php ini_set('display_errors',1); error_reporting(E_ALL);?>



    <div class=" uk-width-5-6 uk-card uk-card-primary uk-card-body">

<?php if (isset($_GET['id'])) {
$id = $_GET['id'];
// echo $id;
$sql = "DELETE FROM clients WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':id' => $id));
header("LOCATION: list-clients.php?deleted");
}
if(isset($_GET['deleted']))
{
echo '<div class="uk-alert-danger" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p class="uk-text-capitalized">The client has been deleted successfully.</p>
</div>';
} ?>


        <h3> Client List </h3>
        <table  width="100%" class="uk-table uk-table-middle  uk-table-justify  uk-table-divider">
            <thead>
                <tr>
                    <th  >#</th>
                    <th class="uk-table-expand" >First Name</th>
                    <th class="uk-table-expand" >Last Name</th>
                    <th class="uk-table-expand" >Company Name</th>
                    <th class="uk-table-expand" >Email Address</th>
                    <th class="uk-table-expand" >Total Income</th>
                    <th class="uk-table-expand" >Created Date</th>
                    <th class="uk-table-expand"> Actions</th>
                </tr>
            </thead>
            <?php  foreach ($clients as $client) {?>
            <tbody >
                <tr>
                    <td><?php echo $client['id'] ?></td>
                    <td><?php echo $client['firstname'] ?></td>
                    <td><?php echo $client['lastname'] ?></td>
                    <td><?php echo $client['company_name'] ?></td>
                    <td><?php echo $client['email'];?></td>
                    <td>£242</td>
                    <td>
                        <?php $date = new DateTime($client['created_date']);
                        $dateFormatted = $date->format('d/m/Y');
                        echo $dateFormatted; ?>
                    </td>
                    <td><button class="uk-button uk-button-success "
                        style="margin:5px;width: 200px" type="button">View Client</button>
                        <br />  <button     style="margin:5px;width: 200px" class="uk-button uk-button-default" type="button">Edit Client</button>



                <form action="list-clients.php?id=<?php echo $client['id'];?>" method="post"> 
                    <input style="margin:5px;width: 200px" class="uk-button uk-button-danger" name="btn-delete" type="submit" onclick="return confirm('Are you sure you want delete this client?')" value="Delete Client">
                </form></td>
                </tr>
            </tbody>
            <?php };?>
        </table>
    </div>
</div>
<?php require_once('includes/footer.php'); ?>

