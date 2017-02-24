<style>
    table tr th,td{font-size:12px;text-align:center;}
    #datatable tr:nth-child(even) {background: #CCC}
    #datatable tr:nth-child(odd) {background: #FFF}
</style>
<table class="table table-condensed table-responsive">
        <tr>
            <th>Mobile No.</th>
            <th>Transaction No</th>
            <th>Transaction Date</th>
            <th>Patient Name</th>

        </tr>
    <tr>
        <?php echo form_open('/Dashboard/SearchTerm');?>
        <td><input type="text" pattern="[789][0-9]{9}" maxlength="10" name="mobile_no" placeholder="Enter Mobile No(10 Digit)" class="form-control" required> </td>
        <td><input type="text" name="transaction_no" value="no" class="form-control" placeholder="Enter Transaction No" required></td>
        <td><input type="date" name="transaction_date" value="<?php echo date('Y-m-d');?>" class="form-control" placeholder="Select Transaction Date"></td>
        <td><input type="text" name="patient_name" class="form-control" placeholder="Enter Patient Name"> </td>
        <th><button class="btn btn-xs btn-info">Submit</button></th>
        </form>
    </tr>
</table>
<!--Patient Result with details-->
<table class="table table-responsive" ID="datatable">
    <tr>
        <td>Date</td>
        <th>Transaction ID</th>
        <th>Test Price</th>
        <th>Patient Name</th>
        <th>Email</th>
        <th>Phone No.</th>
        <th>D.O.B</th>
        <th>Registered Date</th>
        <th>Source</th>
        <th>Test</th>
        <th>Mobile Enable</th>
        <th>Actions</th>
    </tr>
    <tr>
       <?php foreach ($transactions as $patient):?>
           <tr>
            <td><?= date('d-M-Y',strtotime($patient->transaction_date))?></td>
        <td><a href="<?= base_url('/Dashboard/Transactions/'.$patient->customer_phone.'/'.$patient->id)?>"><?= $patient->transaction_id?></a></td>
            <td><?= $patient->price?></td>
           <td><?= $patient->customer_name?></td>
            <td><?= $patient->customer_email?></td>
        <td><a href="<?= base_url()?>Dashboard/Transactions/<?= $patient->customer_phone?>"><?= $patient->customer_phone?></a></td>
           <td><?= date('d-M-Y',strtotime($patient->customer_dob))?></td>
            <td><?= date('d-M-Y',strtotime($patient->created_date))?></td>
           <td><?= $source[$patient->created_through]?></td>
           <td><a href="<?= base_url()?>Test/AddTest/<?= $patient->customer_phone?>"><i class="glyphicon glyphicon-plus"></i> </a></td>
          <td><?= $patient->phone_verified?></td>
            <td><i class="glyphicon glyphicon-edit"></i> </td>
    </tr>
        <?php endforeach;?>
    </tr>

</table>