<?php include("includes/header.php");  ?>
<?php $page_title="APICTO"; ?>
<?php date_default_timezone_set("Asia/Manila"); ?>
<?php
if (isset($_POST['save_repair_computer_history'])) {
    $getComputer=retrieve("SELECT * FROM computers WHERE id=?",array($_GET['computer_id']));
    manage("INSERT INTO repair_computer_history(computer_id,date_repaired,remarks,created_at)
        VALUES(?,?,?,?)",array($_POST['repair_computer_history_id'],date("Y-m-d",strtotime($_POST['repair_computer_history_date'])),
        $_POST['repair_computer_history_remarks'],date("Y-m-d H:i:s a")));

    manage("INSERT INTO inventory_logs(computer_name,page,action,details,date) VALUES(?,?,?,?,?)",
    array(gethostbyaddr($_SERVER["REMOTE_ADDR"]),"Repair Computer History","ADD",
            "<details>
                <p>Add Repair Computer History</p>
                <p>
                    Asset ID: ".$getComputer[0]['asset_id']."<br>
                    Brand & Model: ".$getComputer[0]['cpu_brand_model']."<br>
                    Remarks: ".$_POST['repair_computer_history_remarks']."<br>
                    Date Repaired: ".date("Y-m-d",strtotime($_POST['repair_computer_history_date']))."
                </p>
            </details>",
        date("Y-m-d H:i:s a")));

    echo "<script type='module'>
        Swal.fire('Success','Added Repai History successfully','success');
    </script>";
}

if(isset($_POST['save_computer_repair_history'])){
    $getComputer=retrieve("SELECT * FROM computers WHERE id=?",array($_GET['computer_id']));
    $getCompRepairHistory=retrieve("SELECT * FROM repair_computer_history WHERE id=?",array($_POST['edit_computer_history_id']));

    manage("UPDATE repair_computer_history SET date_repaired=?, remarks=? WHERE id=?",
    array($_POST['edit_computer_history_date_repaired'],$_POST['edit_computer_history_remarks'],$_POST['id']));

    manage("INSERT INTO inventory_logs(computer_name,page,action,details,date) VALUES(?,?,?,?,?)",
    array(gethostbyaddr($_SERVER["REMOTE_ADDR"]),"Repair Computer History","UPDATE",
            "<details>
                <p>Update Repair Computer History</p>
                <p>
                    Asset ID: ".$getComputer[0]['asset_id']."<br>
                    Brand & Model: ".$getComputer[0]['cpu_brand_model']."<br>
                    Remarks: ".$getCompRepairHistory[$i]['remarks']." => ".$_POST['edit_computer_history_remarks']."<br>
                    Date Repaired: ".$getCompRepairHistory[$i]['date_repaired']." => ".date("Y-m-d",strtotime($_POST['edit_computer_history_date_repaired']))."
                </p>
            </details>",
        date("Y-m-d H:i:s a")));

    echo "<script type='module'>
        Swal.fire('Success','Added Repair History successfully','success');
    </script>";
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
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $get_repair_history=retrieve("SELECT 
                                                repair_computer_history.computer_id AS computer_id,
                                                repair_computer_history.date_repaired AS date_repaired, 
                                                repair_computer_history.remarks AS remarks 
                                                FROM repair_computer_history INNER JOIN computers ON repair_computer_history.computer_id=computers.id 
                                                WHERE repair_computer_history.computer_id=?",array($_GET['computer_id']));
                                        for ($i=0; $i < COUNT($get_repair_history); $i++) { 
                                            echo "<tr>
                                            <td>".$get_repair_history[$i]['date_repaired']."</td>
                                            <td>".$get_repair_history[$i]['remarks']."</td>
                                            <td>
                                                <span class='mr-1 edit_computer_history'
                                                    edit_computer_history_id='".$get_repair_history[$i]['id']."'
                                                    edit_computer_history_date_repaired='".$get_repair_history[$i]['date_repaired']."'
                                                    edit_computer_history_remarks='".$get_repair_history[$i]['remarks']."'
                                                    data-toggle='modal' data-target='#edit_computer_history_modal'>
                                                    <i class='fas fa-pencil'></i>
                                                </span>
                                            </td>
                                            </tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <form method="POST">
                                <div class="row mt-3">
                                    <input type="text" name="repair_computer_history_id" id="repair_computer_history_id" value="<?php echo $_GET['computer_id'] ?>" hidden>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <small class="grey-text mt-2">Date Repaired</small>
                                                <input class="form-control" type="date" name="repair_computer_history_date" id="repair_computer_history_date">
                                            </div>
                                            <div class="col-md-12">
                                                <small class="grey-text mt-2">Remarks/Job Done</small>
                                                <textarea class="form-control" name="repair_computer_history_remarks" id="repair_computer_history_remarks" style="resize:none;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm" name="save_repair_computer_history">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_computer_history_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Update Computer Repair History</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <form method="POST">
              <div class="row mt-3">
                <input type="text" name="edit_computer_history_id" id="edit_computer_history_id" hidden>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Date Acquired</small>
                      <input class="form-control" type="date" name="edit_computer_history_date_repaired" id="edit_computer_history_date_repaired">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Remarks</small>
                      <textarea class="form-control" name="edit_computer_history_remarks" id="edit_computer_history_remarks" style="resize:none;"></textarea>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-sm" name="save_computer_repair_history">Save</button>
            </form>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
<script>
$(document).ready(function(){

    $(".edit_computer_history").click(function(){
        $("#edit_computer_history_id").val($(this).attr("edit_computer_history_id"));
        $("#edit_computer_history_date_repaired").val($(this).attr("edit_computer_history_date_repaired"));
        $("#edit_computer_history_remarks").val($(this).attr("edit_computer_history_remarks"));
        $("#edit_computer_history_modal").modal("show");
    });

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