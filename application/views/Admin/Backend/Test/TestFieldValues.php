<script>
    $(document).ready(function(){
       $('#showRow').click(function () {
          $('#first_columns').show(500);
       });
    });
</script>
<div class="container-fluid">
    <table class="table table-responsive table-condensed">
        <tr>
            <th>Test Name</th>
            <th>Field Name</th>

            <th>Column Name</th>
            <th>Column Name</th>
            <th>Column Name</th>
            <th>Column Name</th>
            <th>Column Name</th>
	    <th>Note</th>
            <th><i class="glyphicon glyphicon-hand-down" style="cursor: pointer;" id="showRow"></i> </th>
        </tr>
        <?php echo form_open('Admin/Test/SaveColumns');?>
        <tr id="first_columns" style="display: none;">
            <td>
                <input type="hidden" value="<?= $test_id?>" name="test_id" readonly class="form-control">
            </td>
            <td><input type="text" name="field_name" class="form-control"><br><input type="text" name="default_field_name" class="form-control"></td>

            <td><input type="text" name="column_1" class="form-control"></td>
            <td><input type=text class="form-control" name="column_2"></td>
            <td><input type="text" class="form-control" name="column_3"></td>
            <td><input type="text" class="form-control" name="column_4"></td>
            <td><input type="text" class="form-control" name="column_5"></td>
		<td><textarea name="note" class="form-control"></textarea></td>
            <td><button class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-save-file"></i> </button></td>
        </tr>
    </form>
        <?php foreach ($test_columns as $column):?>
            <tr>
                <?php echo form_open('/Admin/Test/UpdateColumns');?>
                <input type="hidden" name="column_id" value="<?= $column->id?>">
                <input type="hidden" value="<?= $test_id?>" name="test_id" readonly class="form-control">
                <td><input type="text" class="form-control" name="test_name" value="<?= $test_data->test_name?>">

                </td>
                <td><input type="text" name="field_name" value="<?= $column->field_name?>" class="form-control">
                    <input type="text" name="default_field_name" value="<?= $column->default_field_name?>" class="form-control">
                </td>
                <td><input type="text" value="<?= $column->column_1?>" name="column_1" class="form-control">
                    <input type="text" name="default_column_1" value="<?= $column->default_column_1?>" class="form-control">

                </td>
                <td><input type="" value="<?= $column->column_2?>" class="form-control" name="column_2">
                    <input type="text"name="default_column_2" value="<?= $column->default_column_2?>" class="form-control">
                </td>
                <td><input type="text" value="<?= $column->column_3?>" class="form-control" name="column_3">
                    <input type="text" name="default_column_3" value="<?= $column->default_column_3?>" class="form-control">
                </td>
                <td><input type="text" value="<?= $column->column_4?>" class="form-control" name="column_4">
                    <input type="text" name="default_column_4" value="<?= $column->default_column_4?>" class="form-control">
                </td>
                <td><input type="text" class="form-control" value="<?= $column->column_5?>" name="column_5">
                    <input type="text" name="default_column_5" value="<?= $column->default_column_5?>" class="form-control">
                </td>
		<td><input type="text" class="form-control" value="<?= $column->default_note?>" name="note">
                </td>
		
                <td><button class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-briefcase"></i> </button>
                    <a href="<?= base_url('/Admin/Test/DeleteTestColumn/'.$test_id.'/'.$column->id)?>">
                        <button type="button" class="btn-xs btn-info"><i class="glyphicon glyphicon-remove"></i> </button></a></td>
                </form>
            </tr>

        <?php endforeach;?>
    </table>
</div>