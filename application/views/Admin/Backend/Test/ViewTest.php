
<table class="table table-responsive">
    <tr class="info">
        <th>Test ID</th>
        <th>Test Name</th>
        <th>Test Price</th>
        <th>Child Test</th>
        <th>Status</th>
        <th>Created By</th>
        <th>Created Date</th>
    </tr>
    <?php foreach($list_of_test as $list):?>
        <tr>
            <td><?= $list->test_id?></td>
            <td><a href="<?= base_url('/Admin/Test/TestFields/'.$list->test_id)?>"><?= $list->test_name?></a></td>
            <td><?= $list->test_price?></td>
            <td><?= $list->test_child_test?></td>
            <td><?= $list->test_status?></td>
            <td><?= $list->created_by?></td>
            <td><?php echo date('d-m-Y',strtotime($list->created_at));?></td>
        </tr>

    <?php endforeach;?>

</table>