<div class="container">
    <table class="table table-responsive ">
        <tr>
            <th>S.no</th>
            <th>Test Name</th>
            <th>Test Price</th>
            <th>Allocated By</th>
        </tr>
        <tr>
            <?php echo form_open('Admin/ManageLab/SaveLabTest')?>
            <input type="hidden" name="id" value="<?= $id?>">
            <td><input type="text" name="client_id" value="<?= $lab_id?>" class="form-control"> </td>
            <td>
                <select class="form-control" id="test_name" name="test_id">
                    <option value="">Select Test</option>
                    <?php foreach ($tests as $listTest):?>
                        <option value="<?= $listTest->test_id?>"><?= $listTest->test_name?></option>
                    <?php endforeach;?>
                </select>
            </td>
            <td>
                <input type="no" name="test_price" id="test_price" class="form-control">
            </td>
            <td><input type="text" value="admin" class="form-control" disabled> </td>
            <td><button class="btn btn-sm btn-info" type="submit">Submit</button></td>
            </form>
        </tr>
        <?php $i=1; foreach ($my_test as $lab_test):?>
        <tr>
            <td><?= $i++?></td>
            <td align="left"><p style="text-align:left;"><?= str_replace('_',' ',$lab_test->test_name)?></p></td>
            <td><?= $lab_test->test_price?></td>
            <td><?= $lab_test->created_by?></td>
            <td><a href="<?= base_url('Admin/ManageLab/DeleteTestFromLab/'.$lab_id.'/'.$lab_test->test_name)?>"><i class="glyphicon glyphicon-remove"></i> </a> </td>
        </tr>
        <?php endforeach;?>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#test_name').change(function () {
            check();
        });
    });
    function check()
    {
        $.ajax(
            {
                type: 'GET',
                url: '/index.php/Test/PriceFinder/'+$('#test_name').val(),
                success: function (data)
                {

                    $data = jQuery.parseJSON(data);
                    $('#test_price').val($data.price);
                },
                error: function (xhr, status, error) {
                    alert(status + error);
                }
            }
        )

    }
</script>