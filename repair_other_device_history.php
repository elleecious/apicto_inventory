<?php include("includes/header.php");  ?>
<?php $page_title="APICTO"; ?>
<?php date_default_timezone_set("Asia/Manila"); ?>
<?php
if (isset($_POST['save_repair_other_devices_history'])) {
    $getOtherDevices=retrieve("SELECT * FROM other_device WHERE id=?",array($_GET['other_devices_id']));
    manage("INSERT INTO repair_other_devices_history(other_devices_id,date_repaired,remarks,created_at)
        VALUES(?,?,?,?)",array($_POST['repair_other_devices_history_id'],date("Y-m-d",strtotime($_POST['repair_other_devices_history_date'])),
        $_POST['repair_other_devices_history_remarks'],date("Y-m-d H:i:s a")));

        echo "<script type='module'>
            Swal.fire('Success','Added Repair History successfully','success');
        </script>";

        manage("INSERT INTO inventory_logs(computer_name,page,action,details,date) VALUES(?,?,?,?,?)",
        array(gethostbyaddr($_SERVER["REMOTE_ADDR"]),"Repair Other Device History","ADD",
                "<details>
                    <p>Add Repair Other Device History</p>
                    <p>
                        Asset ID: ".$getOtherDevices[0]['asset_id']."<br>
                        Brand & Model: ".$getOtherDevices[0]['brand']." ".$getOtherDevices[0]['model']."<br>
                        Remarks: ".$_POST['repair_other_devices_history_remarks']."<br>
                        Date Repaired: ".date("Y-m-d",strtotime($_POST['repair_other_devices_history_date']))."
                    </p>
                </details>",
            date("Y-m-d H:i:s a")));
}
?>
<div class="row mx-auto mt-3">
    <div class="col-md-12 mb-2">
    <div class="row">
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header p-2 bg-primary text-white">
                    Repair History
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered w-100 text-center" cellspacing="0" cellpadding="0" id="tblRepairHistory">
                                <thead>
                                <tr>
                                    <th>Date Repaired</th>
                                    <th>Remarks/Job Done</th>     
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $get_other_devices_history=retrieve("SELECT
                                            repair_other_devices_history.other_devices_id AS other_devices_id,
                                            repair_other_devices_history.date_repaired AS date_repaired, 
                                            repair_other_devices_history.remarks AS remarks 
                                            FROM repair_other_devices_history INNER JOIN other_device ON repair_other_devices_history.other_devices_id=other_device.id 
                                            WHERE repair_other_devices_history.other_devices_id=?",array($_GET['other_devices_id']));
                                        for ($i=0; $i < COUNT($get_other_devices_history); $i++) { 
                                            echo "<tr>
                                                <td>".$get_other_devices_history[$i]['date_repaired']."</td>
                                                <td>".$get_other_devices_history[$i]['remarks']."</td>
                                            </tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <form method="POST">
                                <div class="row mt-3">
                                    <input type="hidden" name="repair_other_devices_history_id" id="repair_other_devices_history_id" value="<?php echo $_GET['other_devices_id'] ?>" hidden>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <small class="grey-text mt-2">Date Repaired</small>
                                                <input class="form-control" type="date" name="repair_other_devices_history_date" id="repair_other_devices_history_date">
                                            </div>
                                            <div class="col-md-12">
                                                <small class="grey-text mt-2">Remarks/Job Done</small>
                                                <textarea class="form-control" name="repair_other_devices_history_remarks" id="repair_other_devices_history_remarks" style="resize:none;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm" name="save_repair_other_devices_history">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<script>
$(document).ready(function(){
    $("#tblRepairHistory").DataTable({
        "scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":5,
		"order": [],
    });
})
</script>