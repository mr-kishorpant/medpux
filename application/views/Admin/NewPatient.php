<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <?php $data=array('class'=>'form_horizontal'); echo form_open('/Dashboard/CreatePatientAccount');?>
                <label>Customer Name</label>
                <input type="text" class="form-control" name="patient_name" placeholder="Enter Patient Name" required><br>
                <label>Contact No.</label>
                <input type="number" class="form-control" maxlength="10" name="patient_phone" placeholder="10 DIGIT Mobile NO" required max="9999999999"><br>
                <label>Email</label>
                <input type="email" class="form-control" name="patient_email" placeholder="Validated Email ID"><br>
                <label>D.O.B</label>
                <input type="date" class="form-control" name="patient_dob"><br>
            <center>                <button type="submit" class="btn btn-xs btn-info">Submit</button></center>



            </form>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>