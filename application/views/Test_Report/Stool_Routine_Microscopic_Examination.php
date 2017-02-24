<style>
    table tr td p{text-align: center;padding:10px;}
</style>
<table style="width: 80%;text-align: center;" align="center">
   
	<tr>
		<th><h4>PHYSICAL EXAMINATION<h4></th>
	</tr>
    <?php $i=0; foreach($columns as $listColumns):?>
		<?php $i++; if($i>5) break;?>
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
	<tr>
		<th><h4>MICROSCOPIC EXAMINATION</h4></th>
		
	</tr>
	<?php $j=1;  foreach($columns as $listColumns):?>
		<?php $j++; if($j>=$i){?>
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
    <?php }endforeach;?>
	
</table>
