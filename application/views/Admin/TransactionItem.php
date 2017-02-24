<div class="container">
    <table class="table table-responsive">
        <tr>
            <th>Id</th>
            <th>Test Name</th>
            <th>Mobile No</th>
            <th>Price</th>
            <th>Transaction By</th>
            <th>Date</th>
            <th>See Report</th>
        </tr>
        <?php $i=1; foreach ($transaction_items as $transaction_item):?>
            <tr>
                <td><?= $i++?></td>
                <td><a href="<?= base_url('/Dashboard/TestValues/'.$transaction_item->transaction_id.'/'.$transaction_item->test_id)?>"><?= $transaction_item->test_name?></a></td>
                <td><?= $transaction_item->mobile_no?></td>
                <td><?= $transaction_item->price?></td>
                <td><?= $transaction_item->transaction_by?></td>
                <td><?= date('d-M-Y',strtotime($transaction_item->date))?></td>
                <td><a TARGET="_blank" href="<?= base_url()?>Report/TestReports/<?= $customer_phone?>/<?= $transaction_item->transaction_id?>/<?php echo htmlentities($transaction_item->test_name);?>/<?= $transaction_item->test_id?>">See Reports</a></td>
            </tr>


        <?php endforeach;?>
    </table>

</div>

