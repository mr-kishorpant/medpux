<script>
    $(document).ready(function(){
       $('#printButton').click(function(){
           printsection()
       });
    });
    function printsection()
    {

            var headstr = "<html><head><style>#print_report{margin-top:20px;}</style><title></title></head><body>";
            var creategap="<br><br><br><br><br><br>";
            var footstr = "</body>";
            var newstr = document.all.item('print_report').innerHTML;
            var testname=document.all.item('test_name').innerHTML;
            var testvalue=document.all.item('test_value').innerHTML;

        var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr+creategap+newstr+testname+testvalue+footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;

    }

</script>
<style>
    @media print {
        #print_report {
            margin-top: 50px;
        }
    }
    .column_name{max-width: 150px;text-align: left;margin-right: 20px;}
    .column_value{max-width:800px;text-align: left !important;}
	table tr th{text-align:left !important;padding-right:10px;padding-left:10px;}
</style>
<div class="container">
    <p class="text-right"><i style="cursor: pointer;font-size: 14px;" id="printButton" class="glyphicon glyphicon-print"></i> </p>
    <div class="" id="print_report">
        <div class="row">

            <p class="text-center"><h3 class="text-center">Patient Details</h3></p>
            <table class="table table-condensed table-bordered">
                <tr>
                    <th>Patient Name:</th>
                    <td><?= $customer->customer_name?></td>
                    <th>Mobile No.</th>
                    <td><?= $customer->customer_phone?></td>
                    <th>D.O.B</th>
                    <td><?= date('d-M-Y',strtotime($customer->customer_dob))?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <th>Height</th>
                    <td></td>
                    <th>Weight</th>
                    <th></th>
                    <th>Blood Group</th>
                    <td></td>
                </tr>
            </table>

        </div>
    </div>
    <div style="text-align: center;" class="text-center" id="test_name">
        <p style="text-align: center;"><h4><?= $test_name?></h4></p>
    </div>
    <p>
        <pre id="test_value">