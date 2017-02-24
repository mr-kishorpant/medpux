<script>
    $(document).ready(function(){
       $('#showLab').click(function () {
           $('#newLab').show(600);
       }) ;
    });
    $(document).ready(function(){
        $('#contact_no').change(function () {
            $('#login_id').val($('#contact_no').val());
        }) ;
    });

</script>
<div class="container-fluid">
    <div class="row">
        <div style="float: right">
            <span ><i  style="font-size: 22px;cursor: pointer" id="showLab" class="glyphicon glyphicon-plus-sign"></i> </span>
        </div>
        <table  class="table table-stripped" style="display: none" id="newLab">
            <tr class="info">
                <th>Lab Name</th>
                <th>Contact No</th>
                <th>Email</th>
                <th>Login ID</th>
                <th>Address</th>
            </tr>
            <tr>
                <?php echo form_open('Admin/ManageLab/CreateLab');?>
                <td><input type="text" placeholder="Enter Lab Name" class="form-control" name="lab_name" required> </td>
                <td><input type="text" id="contact_no" placeholder="Lab Contact No." class="form-control" required name="contact_no"> </td>
                <td><input type="text" class="form-control" placeholder="Enter Lab Email" name="lab_email" required> </td>
                <td><input type="text" id="login_id" placeholder="" class="form-control" name="login_id" disabled> </td>
                <td><input type="text" class="form-control" placeholder="Enter Lab Address" name="address"> </td>
                <td><input type="number" class="form-control" name="doctors" min="0" max="500"> </td>
                <td><input type="number" class="form-control" name="no_of_test" min="0" max="500"> </td>
                <td><button type="submit"><i class="glyphicon glyphicon-save"></i> </button></td>
                </form>
            </tr>
        </table>

        <table class="table table-condensed">
            <tr>
                <th>LAB ID</th>
                <th>Lab Name</th>
                <th>Lab Contact No.</th>
                <th>Lab Email</th>
                <th>Lab Address</th>                
		<th>Empanelment</th>
		<th>Hours</th>
		<th>Collection Time</th>
		<th>Report Time</th>
		<th>Lab Pincode</th>
		<th>Payment Mode</th>
		<th>Home Collection</th>
		<th>Facilities</th>
                <th>Doctors</th>
                <th>Test Available</th>
		<th>Total Doctors</th>
                <th>Tests Available</th>
                <th>Action</th>
		
            </tr>
            <?php foreach($labs as $data):?>
            <tr>
                <td>
                    <a href="<?= base_url('Admin/ManageLab/MapTestWithLab/'.$data->id)?>">
                        <?= $data->id?>
                    </a>
                </td>
                <td><?= $data->client_name?></td>
                <td><?= $data->client_phone?></td>
                <td><?= $data->lab_email?></td>
                <td><?= $data->lab_address?></td>
		<td><?= $data->hours?></th>
		<td><?= $data->collection_time?></th>
		<td><?= $data->report_time?></th>
		<td><?= $data->lab_pincode?></th>
		<td><?= $data->payment_mode?></th>
		<td><?= $data->home_collection?></th>
		<td><?= $data->facilities?></th>		
                <td><?= $data->no_of_doc?></td>
                <td><?= $data->no_of_test?></td>
                <td><a href="<?= base_url('/Admin/ManageLab/DeleteLab/'.$data->id)?>"<button><i class="glyphicon glyphicon-remove"></i> </button></td>
            </tr>

            <?php endforeach;?>
        </table>
    </div>
</div>