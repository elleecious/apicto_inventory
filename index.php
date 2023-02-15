<?php include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="APICTO Inventory"; ?>
<?php date_default_timezone_set("Asia/Manila"); ?>
<?php

$count_computers = retrieve("SELECT * FROM computers",array());
$count_other_devices = retrieve("SELECT * FROM other_device",array());

$count_laptop = retrieve("SELECT * FROM computers WHERE cpu_type=?",array("LAPTOP"));
$count_standard = retrieve("SELECT * FROM computers WHERE cpu_type=?",array("STANDARD"));
$count_sff = retrieve("SELECT * FROM computers WHERE cpu_type=?",array("SFF"));
$count_aio = retrieve("SELECT * FROM computers WHERE cpu_type=?",array("AIO"));

if (isset($_POST['add_computers'])) {
    manage("INSERT INTO computers(department,asset_id,primary_user,cpu_type,cpu_brand_model,cpu_processor,cpu_hdd_size,cpu_memory,
            cpu_graphics,monitor_brand,monitor_power_supply,ups_avr_brand_model,ups_avr_capacity,date_acquired,remarks,date_added,created_at) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($_POST['department'],$_POST['asset_id'],$_POST['primary_user'],
                    $_POST['cpu_type'],$_POST['cpu_brand_model'],$_POST['cpu_processor'],$_POST['cpu_hdd_size'],$_POST['cpu_memory'],
                    $_POST['cpu_graphics'],$_POST['monitor_brand'],$_POST['monitor_power_supply'],$_POST['ups_avr_brand_model'],
                    $_POST['ups_avr_capacity'],$_POST['date_acquired'],$_POST['remarks'],date("Y-m-d"),date("Y-m-d H:i:s a")));
    
    //logs
    manage("INSERT INTO inventory_logs(computer_name,page,action,details,date) VALUES(?,?,?,?,?)",
        array(gethostbyaddr($_SERVER["REMOTE_ADDR"]),"Dashboard","ADD","<details>
                <p>Add Computers</p>
                <p>
                    Department: ".$_POST['department']."<br>
                    Asset ID: ".$_POST['asset_id']."<br>
                    Primary User: ".$_POST['primary_user']."<br>
                    CPU Type: ".$_POST['cpu_type']."<br>
                    CPU Brand Model: ".$_POST['cpu_brand_model']."<br>
                    CPU Processor: ".$_POST['cpu_processor']."<br>
                    CPU HDD Size: ".$_POST['cpu_hdd_size']."<br>
                    CPU Memory: ".$_POST['cpu_memory']."<br>
                    CPU Graphics: ".$_POST['cpu_graphics']."<br>
                    Monitor Brand: ".$_POST['monitor_brand']."<br>
                    Monitor Power Supply: ".$_POST['monitor_power_supply']."<br>
                    UPS/AVR Brand Model: ".$_POST['ups_avr_brand_model']."<br>
                    UPS/AVR Capacity: ".$_POST['ups_avr_capacity']."<br>
                    Date Acquired: ".$_POST['date_acquired']."<br>
                    Remarks: ".$_POST['remarks']."<br>
                    Date Added: ".date("Y-m-d")."
                </p>
            </details>",date("Y-m-d H:i:s a")));
    
                    echo "<script type='module'>
            Swal.fire('Success','Added computers successfully','success');
        </script>";
}

if (isset($_POST['save_computers'])) {

    $getComputers=retrieve("SELECT * FROM computers WHERE id=?",array($_POST['edit_computers_id']));
    
    manage("UPDATE computers SET department=?, asset_id=?, primary_user=?, cpu_type=?, cpu_brand_model=?, 
            cpu_processor=?, cpu_hdd_size=?, cpu_memory=?, cpu_graphics=?,
            monitor_brand=?, monitor_power_supply=?, ups_avr_brand_model=?, ups_avr_capacity=?, date_acquired=?, remarks=?, updated_at=? WHERE id=?",
            array($_POST['edit_computers_department'],$_POST['edit_computers_asset_id'],$_POST['edit_computers_primary_user'],
            $_POST['edit_computers_cpu_type'],$_POST['edit_computers_cpu_brand_model'],$_POST['edit_computers_cpu_processor'],$_POST['edit_computers_cpu_hdd_size'],$_POST['edit_computers_cpu_memory'],
            $_POST['edit_computers_cpu_graphics'],$_POST['edit_computers_monitor_brand'],$_POST['edit_computers_monitor_power_supply'],$_POST['edit_computers_ups_avr_brand_model'],
            $_POST['edit_computers_ups_avr_capacity'],$_POST['edit_computers_date_acquired'],$_POST['edit_computers_remarks'],date("Y-m-d H:i:s a"),
            $_POST['edit_computers_id']));
    //logs
    manage("INSERT INTO inventory_logs(computer_name,page,action,details,date) VALUES(?,?,?,?,?)",
    array(gethostbyaddr($_SERVER["REMOTE_ADDR"]),"Dashboard","UPDATE","<details>
            <p>Update Computers</p>
            <p>
                    Department: ".$getComputers[0]['department']." => ".$_POST['edit_computers_department']."<br>
                    Asset ID: ".$getComputers[0]['asset_id']." => ".$_POST['edit_computers_asset_id']."<br>
                    Primary User: ".$getComputers[0]['primary_user']." => ".$_POST['edit_computers_primary_user']."<br>
                    CPU Type: ".$getComputers[0]['cpu_type']." => ".$_POST['edit_computers_cpu_type']."<br>
                    CPU Brand Model: ".$getComputers[0]['cpu_brand_model']." => ".$_POST['edit_computers_cpu_brand_model']."<br>
                    CPU Processor: ".$getComputers[0]['cpu_processor']." => ".$_POST['edit_computers_cpu_processor']."<br>
                    CPU HDD Size: ".$getComputers[0]['cpu_hdd_size']." => ".$_POST['edit_computers_cpu_hdd_size']."<br>
                    CPU Memory: ".$getComputers[0]['cpu_memory']." => ".$_POST['edit_computers_cpu_memory']."<br>
                    CPU Graphics: ".$getComputers[0]['cpu_graphics']." => ".$_POST['edit_computers_cpu_graphics']."<br>
                    Monitor Brand: ".$getComputers[0]['monitor_brand']." => ".$_POST['edit_computers_monitor_brand']."<br>
                    Monitor Power Supply: ".$getComputers[0]['monitor_power_supply']." => ".$_POST['edit_computers_monitor_power_supply']."<br>
                    UPS/AVR Brand Model: ".$getComputers[0]['ups_avr_brand_model']." => ".$_POST['edit_computers_ups_avr_brand_model']."<br>
                    UPS/AVR Capacity: ".$getComputers[0]['ups_avr_capacity']." => ".$_POST['edit_computers_ups_avr_capacity']."<br>
                    Date Acquired: ".$getComputers[0]['date_acquired']." => ".$_POST['edit_computers_date_acquired']."<br>
                    Remarks: ".$getComputers[0]['remarks']." => ".$_POST['edit_computers_remarks']."
                </p>
        </details>",date("Y-m-d H:i:s a")));

            echo "<script type='module'>
            Swal.fire('Success','Updated Computers successfully','success');
        </script>";
}

if (isset($_POST['add_otherdevice'])) {
    manage("INSERT INTO other_device(department,asset_id,primary_user,device_type,brand,model,hosted_by,shared_to,remarks,date_acquired,date_added,created_at) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?)",array($_POST['others_department'],$_POST['others_asset_id'],$_POST['others_primary_user'],
            $_POST['others_device_type'],$_POST['brand'],$_POST['model'],$_POST['hosted_by'],$_POST['shared_to'],
            $_POST['remarks'],$_POST['others_date_acquired'],date("Y-m-d"),date("Y-m-d H:i:s a")));

    //logs
    manage("INSERT INTO inventory_logs(computer_name,page,action,details,date) VALUES(?,?,?,?,?)",
    array(gethostbyaddr($_SERVER["REMOTE_ADDR"]),"Dashboard","UPDATE","<details>
            <p>Add Other Devices</p>
            <p>
                Department: ".$_POST['others_department']."<br>
                Asset ID: ".$_POST['others_asset_id']."<br>
                Primary User: ".$_POST['others_primary_user']."<br>
                Device Type: ".$_POST['others_device_type']."<br>
                Brand: ".$_POST['brand']."<br>
                Model: ".$_POST['model']."<br>
                Hosted By: ".$_POST['hosted_by']."<br>
                Shared To: ".$_POST['shared_to']."<br>
                Remarks: ".$_POST['remarks']."<br>
                Date Acquired: ".$_POST['others_date_acquired']."<br>
                Date Added: ".date("Y-m-d")."
            </p>
        </details>"));

    echo "<script type='module'>
            Swal.fire('Success','Added Other Devices successfully','success');
        </script>";
}

if (isset($_POST['save_otherdevice'])) {
    $getOtherDevice=retrieve("SELECT * FROM other_device WHERE id=?",array($_POST['edit_otherdevice_id']));
    manage("UPDATE other_device SET department=?, asset_id=?, primary_user=?, device_type=?, brand=?, 
            model=?, hosted_by=?, shared_to=?, remarks=?, date_acquired=?, updated_at=? WHERE id=?",
            array($_POST['edit_otherdevice_department'],$_POST['edit_otherdevice_asset_id'],$_POST['edit_otherdevice_primary_user'],
            $_POST['edit_other_device_type'],$_POST['edit_otherdevice_brand'],$_POST['edit_otherdevice_model'],
            $_POST['edit_otherdevice_hosted_by'],$_POST['edit_otherdevice_shared_to'],$_POST['edit_otherdevice_remarks'],
            $_POST['edit_otherdevice_date_acquired'],date("Y-m-d H:i:s a"),$_POST['edit_otherdevice_id']));

            echo "<script type='module'>
            Swal.fire('Success','Updated Other Devices successfully','success');
        </script>";

    manage("INSERT INTO inventory_logs(computer_name,page,action,details,date) VALUES(?,?,?,?,?)",
    array(gethostbyaddr($_SERVER["REMOTE_ADDR"]),"Dashboard","UPDATE","<details>
            <p>Update Other Devices</p>
            <p>
                Department: ".$getOtherDevice[0]['department']." => ".$_POST['edit_otherdevice_department']."<br>
                Asset ID: ".$getOtherDevice[0]['asset_id']." => ".$_POST['edit_otherdevice_asset_id']."<br>
                Primary User: ".$getOtherDevice[0]['primary_user']." => ".$_POST['edit_otherdevice_primary_user']."<br>
                Device Type: ".$getOtherDevice[0]['device_type']." => ".$_POST['edit_other_device_type']."<br>
                Brand: ".$getOtherDevice[0]['brand']." => ".$_POST['edit_otherdevice_brand']."<br>
                Model: ".$getOtherDevice[0]['model']." => ".$_POST['edit_otherdevice_model']."<br>
                Hosted By: ".$getOtherDevice[0]['hosted_by']." => ".$_POST['edit_otherdevice_hosted_by']."<br>
                Shared To: ".$getOtherDevice[0]['shared_to']." => ".$_POST['edit_otherdevice_shared_to']."<br>
                Remarks: ".$getOtherDevice[0]['remarks']." => ".$_POST['edit_otherdevice_remarks']."<br>
                Date Acquired: ".$getOtherDevice[0]['date_acquired']." => ".$_POST['edit_otherdevice_date_acquired']."
            </p>
        </details>",date("Y-m-d H:i:s a")));
}

if (isset($_POST['delete_computer'])) {
    manage("DELETE FROM computers WHERE id=?",array($_POST['delete_computer_id']));
    echo "<script type='module'>
    Swal.fire('Success','Deleted computers successfully','success');
</script>";
}

if (isset($_POST['delete_other_device'])) {
    manage("DELETE FROM other_device WHERE id=?",array($_POST['delete_other_device_id']));
    echo "<script type='module'>
    Swal.fire('Success','Deleted Other Device successfully','success');
</script>";
}
?>
<div class="row mx-auto mt-3">
	<div class="col-md-12 mb-2">
        <h6 class="text-center display-4">Inventory Management</h6>
		<div class="row">
            <div class="col-md-12 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Manage Computers
					</div>
                    <a class="btn btn-success col-md-2" data-toggle="modal" data-target="#add_computers_modal">Add Computers</a>
                    <div class="d-flex justify-content-center">
                        <h3>Laptop <span class="count badge badge-primary mr-3"><?php echo count($count_laptop); ?></span></h3>
                        <h3>Standard <span class="count badge badge-secondary mr-3"><?php echo count($count_standard); ?></span></h3>
                        <h3>SFF <span class="count badge badge-success mr-3"><?php echo count($count_sff); ?></span></h3>
                        <h3>AIO <span class="count badge badge-warning"><?php echo count($count_aio); ?></span></h3>
                    </div>
					<div class="card-body">
                        <span class="count badge badge-warning" style="font-size:32px;"><?php echo count($count_computers); ?></span>
						<div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-sm text-center" width="100%" cellspacing="0" cellpadding="0" id="tblComputers">
                                    <thead>
                                        <tr>
                                            <?php
                                                $stud_head=explode(",","Department,Asset ID,Primary User,Type,Brand & Model,Processor,HDD(size),Memory,Graphics,
                                                    Monitor Brand,Monitor Power Supply, UPS/AVR Brand Model,UPS/AVR Capacity,Date Acquired,Remarks,Date Added,Actions");
                                                foreach($stud_head as $stud_val)
                                                {
                                                    echo "<th>".$stud_val."</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $disp_computers = retrieve("SELECT * FROM computers ORDER BY department ASC",array());
                                            for ($i=0; $i < count($disp_computers); $i++) { 
                                            echo "<tr>
                                                    <td>".$disp_computers[$i]['department']."</td>
                                                    <td>".$disp_computers[$i]['asset_id']."</td>
                                                    <td>".$disp_computers[$i]['primary_user']."</td>
                                                    <td>".$disp_computers[$i]['cpu_type']."</td>
                                                    <td>".$disp_computers[$i]['cpu_brand_model']."</td>
                                                    <td>".$disp_computers[$i]['cpu_processor']."</td>
                                                    <td>".$disp_computers[$i]['cpu_hdd_size']."</td>
                                                    <td>".$disp_computers[$i]['cpu_memory']."</td>
                                                    <td>".$disp_computers[$i]['cpu_graphics']."</td>
                                                    <td>".$disp_computers[$i]['monitor_brand']."</td>
                                                    <td>".$disp_computers[$i]['monitor_power_supply']."</td>
                                                    <td>".$disp_computers[$i]['ups_avr_brand_model']."</td>
                                                    <td>".$disp_computers[$i]['ups_avr_capacity']."</td>
                                                    <td>".$disp_computers[$i]['date_acquired']."</td>
                                                    <td>".$disp_computers[$i]['remarks']."</td>
                                                    <td>".$disp_computers[$i]['date_added']."</td>
                                                    <td>
                                                        <span class='m-1 edit_computers'
                                                                edit_computers_id='".$disp_computers[$i]['id']."'
                                                                edit_computers_department='".$disp_computers[$i]['department']."'
                                                                edit_computers_asset_id='".$disp_computers[$i]['asset_id']."'
                                                                edit_computers_primary_user='".$disp_computers[$i]['primary_user']."'
                                                                edit_computers_cpu_type='".$disp_computers[$i]['cpu_type']."'
                                                                edit_computers_cpu_brand_model='".$disp_computers[$i]['cpu_brand_model']."'
                                                                edit_computers_cpu_processor='".$disp_computers[$i]['cpu_processor']."'
                                                                edit_computers_cpu_hdd_size='".$disp_computers[$i]['cpu_hdd_size']."'
                                                                edit_computers_cpu_memory='".$disp_computers[$i]['cpu_memory']."'
                                                                edit_computers_cpu_graphics='".$disp_computers[$i]['cpu_graphics']."'
                                                                edit_computers_monitor_brand='".$disp_computers[$i]['monitor_brand']."'
                                                                edit_computers_monitor_power_supply='".$disp_computers[$i]['monitor_power_supply']."'
                                                                edit_computers_ups_avr_brand_model='".$disp_computers[$i]['ups_avr_brand_model']."'
                                                                edit_computers_ups_avr_capacity='".$disp_computers[$i]['ups_avr_capacity']."'
                                                                edit_computers_date_acquired='".$disp_computers[$i]['date_acquired']."'
                                                                edit_computers_remarks='".$disp_computers[$i]['remarks']."'
                                                                data-toggle='modal' data-target='#edit_computers_modal'>
                                                            <i class='fas fa-pencil hvr-pop'></i>
                                                        </span>
                                                        <a class='m-1' href='repair_computer_history.php?computer_id=".$disp_computers[$i]['id']."' onclick='basicPopup(this.href);return false'>
                                                            <i class='fas fa-wrench hvr-pop'></i>
                                                        </a> 
                                                        <span class='m-1 delete_computers' title='Delete Computers'
                                                            delete_computer_id='".$disp_computers[$i]['id']."
                                                            data-toggle='modal' data-target='#delete_computers_modal'>
                                                            <i class='fas fa-trash-alt'></i>
                                                        </span>
                                                    </td>
                                                </tr>";
                                            }
                                        ?>
                                    </tbody>
                                 </table>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>

    <div class="col-md-12 mb-2">
		<div class="row">
            <div class="col-md-12 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Manage Other Device
					</div>
                    <a class="btn btn-success col-md-2" data-toggle="modal" data-target="#add_other_devices_modal">Add Other Devices</a>
					<div class="card-body">
                        <span class="count badge badge-warning" style="font-size:32px;"><?php echo count($count_other_devices); ?></span>
						<div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-sm text-center" width="100%" cellspacing="0" cellpadding="0" id="tblOthers">
                                    <thead>
                                        <tr>
                                            <?php
                                                $stud_head=explode(",","Department,Asset ID,Primary User,Device Type,Brand,Model,Hosted By,Shared To,Date Acquired,Remarks,Date Added,Actions");
                                                foreach($stud_head as $stud_val)
                                                {
                                                    echo "<th>".$stud_val."</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $disp_otherdevice = retrieve("SELECT * FROM other_device ORDER BY department ASC",array());
                                            for ($i=0; $i < count($disp_otherdevice); $i++) { 
                                            echo "<tr>
                                                    <td>".$disp_otherdevice[$i]['department']."</td>
                                                    <td>".$disp_otherdevice[$i]['asset_id']."</td>
                                                    <td>".$disp_otherdevice[$i]['primary_user']."</td>
                                                    <td>".$disp_otherdevice[$i]['device_type']."</td>
                                                    <td>".$disp_otherdevice[$i]['brand']."</td>
                                                    <td>".$disp_otherdevice[$i]['model']."</td>
                                                    <td>".$disp_otherdevice[$i]['hosted_by']."</td>
                                                    <td>".$disp_otherdevice[$i]['shared_to']."</td>
                                                    <td>".$disp_otherdevice[$i]['date_acquired']."</td>
                                                    <td>".$disp_otherdevice[$i]['remarks']."</td>
                                                    <td>".$disp_otherdevice[$i]['date_added']."</td>
                                                    <td>
                                                        <span class='m-1 edit_otherdevice' 
                                                                edit_otherdevice_id='".$disp_otherdevice[$i]['id']."' 
                                                                edit_otherdevice_department='".$disp_otherdevice[$i]['department']."'
                                                                edit_otherdevice_asset_id='".$disp_otherdevice[$i]['asset_id']."'
                                                                edit_otherdevice_primary_user='".$disp_otherdevice[$i]['primary_user']."'
                                                                edit_other_device_type='".$disp_otherdevice[$i]['device_type']."'
                                                                edit_otherdevice_brand='".$disp_otherdevice[$i]['brand']."'
                                                                edit_otherdevice_model='".$disp_otherdevice[$i]['model']."'
                                                                edit_otherdevice_hosted_by='".$disp_otherdevice[$i]['hosted_by']."'
                                                                edit_otherdevice_shared_to='".$disp_otherdevice[$i]['shared_to']."'
                                                                edit_otherdevice_remarks='".$disp_otherdevice[$i]['remarks']."'
                                                                edit_otherdevice_date_acquired='".$disp_otherdevice[$i]['date_acquired']."'
                                                                data-toggle='modal' data-target='#edit_otherdevice_modal'>
                                                            <i class='fas fa-pencil hvr-pop'></i>
                                                        </span>
                                                        <a class='m-1' href='repair_other_device_history.php?other_devices_id=".$disp_otherdevice[$i]['id']."' onclick='basicPopup(this.href);return false'>
                                                            <i class='fas fa-wrench hvr-pop'></i>
                                                        </a> 
                                                        <span class='m-1 delete_other_devices' title='Delete Other Devices'
                                                                delete_other_device_id='".$disp_otherdevice[$i]['id']."
                                                                data-toggle='modal' data-target='#delete_other_device_modal'>
                                                            <i class='fas fa-trash-alt'></i>
                                                        </span>
                                                    </td>
                                                </tr>";
                                            }
                                        ?>
                                    </tbody>
                                 </table>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="add_other_devices_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Add Other Devices</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="row">
            <?php
              $other_device_form = array("others_department"=>"Department","others_asset_id"=>"Asset ID",
                  "others_primary_user"=>"Primary User","others_device_type"=>"Device Type",
                  "brand"=>"Brand","model"=>"Model","hosted_by"=>"Hosted By",
                  "shared_to"=>"Shared To","others_date_acquired"=>"Date Acquired","remarks"=>"Remarks");
                  foreach ($other_device_form as $odkey => $odvalue) {
                      echo "<div class='col-md-4'>
                      <div class='row'>
                            <div class='col-md-12'>
                                <div class='md-form'>
                                    <input class='form-control' type='text' name='".$odkey."' id='".$odkey."'>
                                    <label for='".$odkey."'>".$odvalue."</label>
                                </div>
                            </div>
                      </div>
                  </div>";
                  }
            ?>
          </div>
          <button type="submit" class="btn btn-primary btn-md" name="add_otherdevice">Add</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>
<?php include("includes/modal.php") ?>
<?php include('includes/footer.php'); ?>
<script>
function basicPopup(url) {
    popupWindow = window.open(url,'popUpWindow','height=500,width=700,left=2300,top=100,resizable=no,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
}
$(document).ready(function(){
    $('.mdb-select').materialSelect();
    $(".datepicker").pickadate();
    $(".edit_computers").click(function(){
        $("#edit_computers_id").val($(this).attr("edit_computers_id"));
        $("#edit_computers_department").val($(this).attr("edit_computers_department"));
        $("#edit_computers_asset_id").val($(this).attr("edit_computers_asset_id"));
        $("#edit_computers_primary_user").val($(this).attr("edit_computers_primary_user"));
        $("#edit_computers_cpu_type").val($(this).attr("edit_computers_cpu_type"));
        $("#edit_computers_cpu_brand_model").val($(this).attr("edit_computers_cpu_brand_model"));
        $("#edit_computers_cpu_processor").val($(this).attr("edit_computers_cpu_processor"));
        $("#edit_computers_cpu_hdd_size").val($(this).attr("edit_computers_cpu_hdd_size"));
        $("#edit_computers_cpu_graphics").val($(this).attr("edit_computers_cpu_graphics"));
        $("#edit_computers_cpu_memory").val($(this).attr("edit_computers_cpu_memory"));
        $("#edit_computers_monitor_brand").val($(this).attr("edit_computers_monitor_brand"));
        $("#edit_computers_monitor_power_supply").val($(this).attr("edit_computers_monitor_power_supply"));
        $("#edit_computers_ups_avr_brand_model").val($(this).attr("edit_computers_ups_avr_brand_model"));
        $("#edit_computers_ups_avr_capacity").val($(this).attr("edit_computers_ups_avr_capacity"));
        $("#edit_computers_date_acquired").val($(this).attr("edit_computers_date_acquired"));
        $("#edit_computers_remarks").val($(this).attr("edit_computers_remarks"));
        $("#edit_computers_modal").modal("show");
    });

    $(".edit_otherdevice").click(function(){
        $("#edit_otherdevice_id").val($(this).attr("edit_otherdevice_id"));
        $("#edit_otherdevice_department").val($(this).attr("edit_otherdevice_department"));
        $("#edit_otherdevice_asset_id").val($(this).attr("edit_otherdevice_asset_id"));
        $("#edit_otherdevice_primary_user").val($(this).attr("edit_otherdevice_primary_user"));
        $("#edit_other_device_type").val($(this).attr("edit_other_device_type"));
        $("#edit_otherdevice_brand").val($(this).attr("edit_otherdevice_brand"));
        $("#edit_otherdevice_model").val($(this).attr("edit_otherdevice_model"));
        $("#edit_otherdevice_hosted_by").val($(this).attr("edit_otherdevice_hosted_by"));
        $("#edit_otherdevice_shared_to").val($(this).attr("edit_otherdevice_shared_to"));
        $("#edit_otherdevice_remarks").val($(this).attr("edit_otherdevice_remarks"));
        $("#edit_otherdevice_date_acquired").val($(this).attr("edit_otherdevice_date_acquired"));
        $("#edit_otherdevice_modal").modal("show");
    });
    
    $(".delete_computers").click(function(){
        $("#delete_computer_id").val($(this).attr("delete_computer_id"));
        $("#delete_computers_modal").modal("show");
    });

    $(".delete_other_devices").click(function(){
        $("#delete_other_device_id").val($(this).attr("delete_other_device_id"));
        $("#delete_other_device_modal").modal("show");
    });
    $("#tblComputers").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":10,
		"order": [],
	});

    $("#tblOthers").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":10,
		"order": [],
	});

    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
})
</script>