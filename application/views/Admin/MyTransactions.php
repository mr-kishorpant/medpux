<div class="container">
    <table class="table table-responsive">
        <tr>
            <th>Row No</th>
            <th>Transaction No</th>

            <th>Contact No</th>
            <th>Total Amount</th>
            <th>Lab ID</th>
            <th>Coupon Value</th>
            <th>Transaction Date</th>
            <th>Transaction By</th>
        </tr>
        <?php $i=1; foreach ($transactions as $data):?>
            <tr>
                <td><?= $i++?></td>
                <td><a href="<?= base_url()?>Dashboard/TransactionItem/<?= $data->patient_contact_no?>/<?= $data->id?>"><p style="text-transform: uppercase"><?= $data->transaction_id?></p></a></td>
                <td><?= $data->patient_contact_no?></td>
                <td><?= $data->price?></td>
                <td><?= $data->lab_id?></td>
                <td><?= $data->coupon_value?></td>
                <td><?= $data->transaction_date?></td>
                <td><?= $data->transaction_by?></td>
            </tr>

        <?php endforeach;?>
    </table>

</div>