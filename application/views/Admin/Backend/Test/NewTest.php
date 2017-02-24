<div class="container">
    <div cla="jumbotron">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <div class="form-group" style="padding:25px;border:1px solid black;">
                    <?php echo form_open('/Admin/Test/AddTest');?>
                        <label>Test Name</label>
                        <input type="text" placeholder="Enter Test Name" name="test_name" class="form-control">
                        <br>
                        <label>Sub Test</label>
                        <select class="form-control" name="child_enable">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select><br>
                    <br>
                    <label>Test Price</label>
                    <input type="number" name="test_price" min="0" max="999999" class="form-control">
                    <br>

                        <center>
                            <button class="btn btn-md btn-info">Submit</button>
                        </center>
                    </form>
                </div>
            </div>
            <div class="col-md-4">

            </div>

        </div>
    </div>

</div>