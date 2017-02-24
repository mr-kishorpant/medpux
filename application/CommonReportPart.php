
<div class="container">
    <div class="">
        <div class="row">
            <p><i class="glyphicon glyphicon-print"></i> </p>
            <p class="text-center">
                <h3 class="text-center">Patient Details</h3>

            </p>
            <table class="table table-condensed table-bordered">
                <tr>
                    <th>Patient Name:</th>
                    <td><?= $customer->customer_name?></td>
                    <th>Mobile No.</th>
                    <td><?= $customer->customer_phone?></td>
                    <th>D.O.B</th>
                    <td><?= date('d-M-Y',strtotime($customer->customer_dob))?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <th>Height</th>
                    <td></td>
                    <th>Weight</th>
                    <th></th>
                    <th>Blood Group</th>
                    <td></td>
                </tr>
            </table>

        </div>
    </div>
    <p class="text-center">
            <h2><?= $test_name?></h2>
    </p>
    <p>
    <pre>