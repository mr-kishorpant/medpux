
<div class="container-fluid">
    <div class="row">
        <p class="text-center"><?= $test->test_name?></p>
    </div>
    <table class="table table-responsive">
        <?php foreach ($column_names as $column):?>

            <?php echo form_open('/Dashboard/SaveColumnValues');?>
            <input type="hidden" name="transaction_id" value="<?= $transaction_id?>">
            <input type="hidden" name="test_id" value="<?= $test->test_id?>">
        <tr>
            <input type="hidden" name="field_id" value="<?= $column->id?>">
            <th><?= $column->field_name?></th>
            <?php $default_value=$column->default_field_name?>
            <td><input type="text" name="field_value" value="<?= $default_value?>" class="form-control"> </td>
            <?php if(isset($column->column_1) && $column->column_1!=='a'){?>
            <th><?= $column->column_1 ?></th>
            <td><input type="text" name="value1" value="
        <?php if(isset($this->LabModel->LabTestValueByTransactionId($transaction_id,$column->id)->value1))
            echo trim($this->LabModel->LabTestValueByTransactionId($transaction_id,$column->id)->value1)?>" class="form-control">
            </td>
            <?php }?>
            <?php if(isset($column->column_2) && $column->column_2!=='a'){?>
                <th><?= $column->column_2 ?></th>
                <td><input type="text" name="value2" value="<?php if(isset($this->LabModel->LabTestValueByTransactionId($transaction_id,$column->id)->value2))
                        echo trim($this->LabModel->LabTestValueByTransactionId($transaction_id,$column->id)->value2)?>" class="form-control"> </td>
            <?php }?>
            <?php if(isset($column->column_3)  && $column->column_3!=='a'){?>
                <th><?= $column->column_3 ?></th>
                <td><input type="text" name="value3" value="<?php if(isset($this->LabModel->LabTestValueByTransactionId($transaction_id,$column->id)->value3))
                        echo trim($this->LabModel->LabTestValueByTransactionId($transaction_id,$column->id)->value3)?>" class="form-control"> </td>
            <?php }?>
            <?php if(isset($column->column_4)&& $column->column_4!=='a'){?>
                <th><?= $column->column_4 ?></th>
                <td><input type="text" name="value4" value="<?php if(isset($this->LabModel->LabTestValueByTransactionId($transaction_id,$column->id)->value4))
                    echo trim($this->LabModel->LabTestValueByTransactionId($transaction_id,$column->id)->value4)?>"  class="form-control"> </td>
            <?php }?>
            <?php if(isset($column->column_5) && $column->column_5!=='a'){?>
                <th><?= $column->column_5 ?></th>
                <td><input type="text" name="value5" value="<?php if(isset($this->LabModel->LabTestValueByTransactionId($transaction_id,$column->id)->value5))
                        echo trim($this->LabModel->LabTestValueByTransactionId($transaction_id,$column->id)->value5)?>" class="form-control"> </td>
            <?php }?>
	    <?php if(isset($column->default_note) && $column->default_note!=='a'){?>
                <th><?= $column->default_note ?></th>
                <td>
		<textarea type="text" name="note" value="" class="form-control">
		<?php if(isset($this->LabModel->LabTestValueByTransactionId($transaction_id,$column->id)->note))
                        echo trim($this->LabModel->LabTestValueByTransactionId($transaction_id,$column->id)->note)?>
		
		</textarea></td>
            <?php }?>
            <td><button class="btn btn-success btn-xs">Save</button></td>
        </tr>
        </form>
        <?php endforeach;?>

    </table>
</div>