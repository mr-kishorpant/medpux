<style>
    table tr td p{text-align: center;padding:10px;}
</style>
<table style="width: 80%;text-align: center;" align="center">
    <tr>
        <?php foreach ($columns as $col):?>
            <th><?= str_replace('_',' ',$col->field_name)?></th>
            <th><?php if($col->column_1!='a') echo $col->column_1;?></th>
            <th><?php if($col->column_2!='a') echo $col->column_2;?></th>
            <th><?php if($col->column_3!='a') echo $col->column_3;?></th>
            <th><?php if($col->column_4!='a') echo $col->column_4;?></th>
            <th><?php if($col->column_5!='a') echo $col->column_5;?></th>

            <?php break; endforeach;?>
    </tr>
    <?php foreach($columns as $listColumns):?>
        <tr>
            <td><p class="column_value" style="text-align: center;">
                    <?php $file_value=$this->ReportModel->ColumnValue($listColumns->id,$transaction_id)->field_value;
                    if(!empty($file_value) && isset($file_value)) echo str_replace('_',' ',$file_value);?></p></td>
            <td><p class="column_value" style="text-align: center;"><?php $file_value=$this->ReportModel->ColumnValue($listColumns->id,$transaction_id)->value1;
                    if(!empty($file_value) && isset($file_value)) echo $file_value;?></p></td>
            <td><p class="column_value" style="text-align: center;"><?php $file_value=$this->ReportModel->ColumnValue($listColumns->id,$transaction_id)->value2;
                    if(!empty($file_value) && isset($file_value)) echo $file_value;?></p></td>
            <td><p class="column_value" style="text-align: center;"><?php $file_value=$this->ReportModel->ColumnValue($listColumns->id,$transaction_id)->value3;
                    if(!empty($file_value) && isset($file_value)) echo $file_value;?></p></td>
            <td><p class="column_value" style="text-align: center;"><?php $file_value=$this->ReportModel->ColumnValue($listColumns->id,$transaction_id)->value4;
                    if(!empty($file_value) && isset($file_value)) echo $file_value;?></p></td>
            <td><p class="column_value" style="text-align: center;"><?php $file_value=$this->ReportModel->ColumnValue($listColumns->id,$transaction_id)->value5;
                    if(!empty($file_value) && isset($file_value)) echo $file_value;?></p></td>
        </tr>
    <?php endforeach;?>
</table>

	<p style="max-width:500px;">
    COMMENT :<br>THE LEVELS OF THYROID HORMONE( T3& T4) ARE LOW IN CASE OF PRIMARY, SECONDARYAND TERTIARY HYPOTHYROIDISM AND SOMETIMES IN NONTHYROIDAL ILLNESS ALSO INCREASED LEVEL ARE FOUND IN GRAVE~S DISEASE, HYPERTHYROIDISM AND THYROID HORMONE RESISTANCE.</p><p> T3 LEVALE ARE ALSO RAISSD IN T3 THYROTOXICOSIS TSH LEVEL RAISED IN PRIMARY .

</p>