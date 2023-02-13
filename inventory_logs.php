<?php include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="APICTO Inventory"; ?>
<div class="row mx-auto mt-3">
	<div class="col-md-12 mb-2">
		<div class="row">
            <div class="col-md-12 mb-2">
				<div class="card">
					<div class="card-header p-2 bg-primary text-white">
						Inventory Logs
					</div>
                    <div class="card-body">
						<div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-sm text-center" width="100%" cellspacing="0" cellpadding="0" id="tblInventoryLogs">
                                    <thead>
                                        <tr>
                                            <?php
                                                $stud_head=explode(",","Computer Name,Page,Action,Details,Date");
                                                foreach($stud_head as $stud_val)
                                                {
                                                    echo "<th>".$stud_val."</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $disp_computers = retrieve("SELECT * FROM inventory_logs",array());
                                            for ($i=0; $i < count($disp_computers); $i++) { 
                                            echo "<tr>
                                                    <td>".$disp_computers[$i]['computer_name']."</td>
                                                    <td>".$disp_computers[$i]['page']."</td>
                                                    <td>".$disp_computers[$i]['action']."</td>
                                                    <td>".$disp_computers[$i]['details']."</td>
                                                    <td>".$disp_computers[$i]['date']."</td>
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
<?php include("includes/modal.php") ?>
<?php include('includes/footer.php'); ?>
<script>
$(document).ready(function(){
    $("#tblInventoryLogs").DataTable({
		"scrollX": true,
		"info": true,
		"lengthChange": true,
		"paging": true,
		"searching": true,
        "pageLength":10,
		"order": [[4, "desc"]],
	});
})
</script>