<div class="container">
    <div class="jumbotron">
        <div class="text-center"><h2>Add New Test</h2></div>
        <table class="table">
            <tr>
                <th>Patient Name</th>
                <td><?= $patient->customer_name?></td>
                <th>Phone Number</th>
                <td><?= $patient->customer_phone?></td>
                <th>D.O.B</th>
                <td><?= $patient->customer_dob?></td>
            </tr>
        </table>
    </div>
   <table class="table table-responsive">
       <tr>
           <th>Serial No</th>
           <th>Test Name</th>
           <th>Test Price</th>
           <th>Total Price</th>
           <th>Action</th>
       </tr>
        <tr>
           <?php echo form_open('Test/TemporaryTest');?>
           <td>N/A<input type="hidden" name="phone_no" value="<?= $patient->customer_phone?>"></td>
           <td>
               <select class="form-control" name="test_name" id="test_name">
                   <option value="">Select Test</option>
                   <?php foreach ($TestAvailable as $listTest):?>

                    <option value="<?= $listTest->test_id?>"><?= str_replace('_',' ',$listTest->test_name)?></option>
                   <?php endforeach;?>
               </select>
           </td>
           <td><input type="text" class="form-control" id="test_price" name="test_price"> </td>
           <td><input type="text" class="form-control" placeholder="Refered By"  name="refered_by"> </td>
           <td><button class="btn btn-info btn-md">Add</button></td>
       <form>
       </tr>
        </tr>

           <?php $sum=0;$i=1; foreach ($temporary_test as $temp_data):?>
            <tr>
                    <td><?= $i++?></td>
                    <td><?= $temp_data->test_name?></td>
                    <td></td>
                    <td><?= $temp_data->test_price?><?php $sum=$sum+$temp_data->test_price;?></td>

                    <td><a href="<?= base_url()?>Test/RemoveTempData/<?= $patient->customer_phone?>/<?= $temp_data->id?>"><i class="glyphicon glyphicon-remove"></i> </a></td>
            </tr>
           <?php endforeach;?>
            <!--
            <tr>
                <td colspan="2"></td>
                <th>Coupon Amount</th>
                <td><input type="number" id="coupon_value" name="coupon_value" pattern="{0-9}" class="form-control"></td>
                <td><button type="button" class="btn btn-sm btn-info" id="apply_coupon">Apply</button></td>
            </tr>-->
            <tr>
                <td colspan="2"></td>
                <th>Total Amount</th>
                <th><input type="hidden" id="total_value" name="total_value" value="<?= $sum?>"> <?= $sum?></th>
                <td>
                            <a href="<?= base_url()?>Test/SaveTransaction/<?= $patient->customer_phone?>">
                                <button type="button" class="btn btn-success btn-sm">Pay By Cash-<span id="valuetopay"></span>
                                </button>
                            </a>
                </td>
            </tr>
   </table>
</div>
<script>


    $(document).ready(function() {
        $('#apply_coupon').click(function () {
            var total_value=$('#total_value').val();
            var coupon_value=$('#coupon_value').val();
            if(total_value>=coupon_value)
            {
                var baltopay=total_value-coupon_value;
                $('#valuetopay').html(baltopay);
            }
            else
                alert('Coupon Value Can Not Be More then Test Value');

        });
    });

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