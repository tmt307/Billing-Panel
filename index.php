
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>


 <div class="uk-width-3-4 uk-card uk-card-secondary uk-card-body" >

  <canvas id="chartjs-0" style="height:380px; width:620px"></canvas>
  <script>
    new Chart(document.getElementById("chartjs-0"), {
      "type": "line",
      "data": {
        "labels": ["11-24 13:05", "11-24 19:05", "11-24 22:05", "11-25 10:05", "11-25 14:05", "11-25 19:05", "11-25 23:05", "11-26 10:05", "11-26 13:05", "11-26 18:05", "11-26 22:05"],
        "datasets": [{
          "label": "Day Income from last 30 days",
          "data": [5, 10, 20, 30, 25, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150, 160, 170, 180, 190, 200],
          "fill": true,
          "borderColor": "#fffcdc",
          "lineTension": .4,
          "pointBorderColor": "blue",
          "spanGaps": true,
        }]
      },
      "options": {
        legend: {
          labels: {
            fontColor: "white",
            fontSize: 16
          }
        },
        scales: {
          yAxes: [{
            ticks: {
              fontColor: "white"
            },
            gridLines: {
              display: true,
              color: "#1e87f0"
            }
          }],
          xAxes: [{
            ticks: {
              fontColor: "white",
            },
            gridLines: {
              display: true,
              color: "#1e87f0"
            }
          }]
        }
      }
    });
  </script>
</div>





    <div class="uk-width-1-1 ">
        <div class="uk-card uk-card-secondary uk-card-body">

        	<h5> Recent Orders </h5>
<table class="uk-table uk-table-middle uk-table-divider">
    <thead>
        <tr>
            <th >#</th>
            <th >Client Name</th>
            <th>Product/Service</th>
            <th>Invoice Date</th>
            <th>Due Date</th>
            <th>Payment Gateway</th>
            <th>Amount Paid</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1244</td>
            <td>John Doe (Logic Designs)</td>
            <td>Logo Design</td>
            <td>01/08/2019</td>
            <td>08/08/2019</td>
            <td>PayPal</td>
            <td>£150.00</td>
            <td><button class="uk-button uk-button-primary" type="button">Paid</button></td>
            <td><button class="uk-button   uk-button-default" type="button">View Order</button></td>
        </tr>
    </tbody>
    <tbody>
        <tr>
            <td>1245</td>
            <td>John Doe (Logic Designs)</td>
            <td>Logo Design</td>
            <td>01/08/2019</td>
            <td>08/08/2019</td>
            <td>PayPal</td>
            <td>£150.00</td>
            <td><button class="uk-button uk-button-danger" type="button">Unpaid</button></td>
            <td><button class="uk-button  uk-button-default" type="button">View Order</button></td>
        </tr>
    </tbody>
</table>
</div>
</div>

<?php require_once('includes/footer.php'); ?>

