<div class="modal fade" id="edit_otherdevice_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Edit Other Device</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
          <form method="POST">
            <div class="row mt-3">
              <input type="text" name="edit_otherdevice_id" id="edit_otherdevice_id" hidden>
              <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Department</small>
                      <input class="form-control" type="text" name="edit_otherdevice_department" id="edit_otherdevice_department">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Asset ID</small>
                      <input class="form-control" type="text" name="edit_otherdevice_asset_id" id="edit_otherdevice_asset_id">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Primary User</small>
                      <input class="form-control" type="text" name="edit_otherdevice_primary_user" id="edit_otherdevice_primary_user">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Device Type</small>
                      <input class="form-control" type="text" name="edit_other_device_type" id="edit_other_device_type">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Brand</small>
                      <input class="form-control" type="text" name="edit_otherdevice_brand" id="edit_otherdevice_brand">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Model</small>
                      <input class="form-control" type="text" name="edit_otherdevice_model" id="edit_otherdevice_model">
                    </div>    
                    <div class="col-md-6">
                        <small class="grey-text mt-2">Hosted By</small>
                        <input class="form-control" type="text" name="edit_otherdevice_hosted_by" id="edit_otherdevice_hosted_by">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Shared To</small>
                      <input class="form-control" type="text" name="edit_otherdevice_shared_to" id="edit_otherdevice_shared_to">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Date Acquired</small>
                      <input class="form-control" type="text" name="edit_otherdevice_date_acquired" id="edit_otherdevice_date_acquired">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Remarks</small>
                      <textarea class="form-control" name="edit_otherdevice_remarks" id="edit_otherdevice_remarks" style="resize:none;"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="save_otherdevice">Save</button>
          </form>
          </div>   
        <div class="modal-footer">
          <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_computers_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Edit Computers</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="row">
            <form method="POST">
              <div class="row mt-3">
                <input type="text" name="edit_computers_id" id="edit_computers_id" hidden>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Department</small>
                      <input class="form-control" type="text" name="edit_computers_department" id="edit_computers_department">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Asset ID</small>
                      <input class="form-control" type="text" name="edit_computers_asset_id" id="edit_computers_asset_id">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Primary User</small>
                      <input class="form-control" type="text" name="edit_computers_primary_user" id="edit_computers_primary_user">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">CPU Type</small>
                      <select class="form-control" name="edit_computers_cpu_type" id="edit_computers_cpu_type">
                        <option value="">Select CPU Type</option>
                        <option value='STANDARD'>STANDARD</option>
                        <option value='SFF'>SFF</option>
                        <option value='AIO'>AIO</option>
                        <option value='LAPTOP'>LAPTOP</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">CPU Brand & Model</small>
                      <input class="form-control" type="text" name="edit_computers_cpu_brand_model" id="edit_computers_cpu_brand_model">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">CPU Processor</small>
                      <input class="form-control" type="text" name="edit_computers_cpu_processor" id="edit_computers_cpu_processor">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">CPU HDD(size)</small>
                      <input class="form-control" type="text" name="edit_computers_cpu_hdd_size" id="edit_computers_cpu_hdd_size">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">CPU Memory</small>
                      <input class="form-control" type="text" name="edit_computers_cpu_memory" id="edit_computers_cpu_memory">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">CPU Graphics</small>
                      <input class="form-control" type="text" name="edit_computers_cpu_graphics" id="edit_computers_cpu_graphics">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Monitor Brand</small>
                      <input class="form-control" type="text" name="edit_computers_monitor_brand" id="edit_computers_monitor_brand">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Monitor Power Supply</small>
                      <select class="form-control" name="edit_computers_monitor_power_supply" id="edit_computers_monitor_power_supply">
                        <option value="">Select Monitor Power Supply</option>
                        <option value="BUILT-IN">BUILT-IN</option>
                        <option value="POWER BRICK">POWER BRICK</option>
                      </select>
                      <!-- <input class="form-control" type="text" name="edit_computers_monitor_power_supply" id="edit_computers_monitor_power_supply"> -->
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">UPS/AVR Brand Model</small>
                      <input class="form-control" type="text" name="edit_computers_ups_avr_brand_model" id="edit_computers_ups_avr_brand_model">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">UPS/AVR Capacity</small>
                      <input class="form-control" type="text" name="edit_computers_ups_avr_capacity" id="edit_computers_ups_avr_capacity">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Date Acquired</small>
                      <input class="form-control" type="text" name="edit_computers_date_acquired" id="edit_computers_date_acquired">
                    </div>
                    <div class="col-md-6">
                      <small class="grey-text mt-2">Remarks</small>
                      <textarea class="form-control" name="edit_computers_remarks" id="edit_computers_remarks" style="resize:none;"></textarea>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-sm" name="save_computers">Save</button>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delete_computers_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Delete Computers</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
            <div class="row mt-3">
              <input type="text" name="delete_computer_id" id="delete_computer_id" hidden>
              <div class="col-md-12">
                <h6>Are you sure you want to delete this computer?</h6>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="delete_computer">YES</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delete_other_device_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Delete Computers</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
            <div class="row mt-3">
              <input type="text" name="delete_other_device_id" id="delete_other_device_id" hidden>
              <div class="col-md-12">
                <h6>Are you sure you want to delete this device?</h6>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="delete_other_device">YES</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="add_computers_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Add Computers</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="row">
            <?php
                $computer_form = array("department"=>"Department","asset_id"=>"Asset ID",
                    "primary_user"=>"Primary User");
                    foreach ($computer_form as $cfkey => $cfvalue) {
                        echo "<div class='col-md-4'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class='md-form'>
                                    <input class='form-control' type='text' name='".$cfkey."' id='".$cfkey."'>
                                    <label for='".$cfkey."'>".$cfvalue."</label>
                                </div>
                            </div>
                        </div>
                    </div>";
                    }
                    ?>
                    <div class='col-md-4'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class='md-form'>
                                    <select class="mdb-select md-form" name="cpu_type" id="cpu_type" required>
                                        <option value="">Select CPU Type</option>
                                        <?php
                                            $cpu_type=array("STANDARD","SFF","AIO","LAPTOP");
                                            for ($i=0; $i < COUNT($cpu_type); $i++) { 
                                                echo "<option value='".$cpu_type[$i]."'>".$cpu_type[$i]."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $cpu_form = array("cpu_brand_model"=>"CPU Brand & Model","cpu_processor"=>"CPU Processor","cpu_hdd_size"=>"CPU HDD(size)",
                                    "cpu_memory"=>"CPU Memory","cpu_graphics"=>"CPU Graphics");
                    foreach ($cpu_form as $cpukey => $cpuvalue) {
                        echo "<div class='col-md-4'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='md-form'>
                                            <input class='form-control' type='text' name='".$cpukey."' id='".$cpukey."'>
                                            <label for='".$cpukey."'>".$cpuvalue."</label>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    }
                ?>
                <div class='col-md-4'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='md-form'>
                                <select class="mdb-select md-form" name="monitor_power_supply" id="monitor_power_supply">
                                    <option value="">Select Monitor Power Supply Type</option>
                                    <option value="BUILT-IN">BUILT-IN</option>
                                    <option value="POWER BRICK">POWER BRICK</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $monitor_ups_form = array("monitor_brand"=>"Monitor Brand","ups_avr_brand_model"=>"UPS/AVR Brand Model",
                "ups_avr_capacity"=>"UPS/AVR Capacity",'date_acquired'=>"Date Acquired","remarks"=>"Remarks");
                    foreach ($monitor_ups_form as $monitor_key => $monitor_value) {
                        echo "<div class='col-md-4'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='md-form'>
                                        <input class='form-control' type='text' name='".$monitor_key."' id='".$monitor_key."'>
                                        <label for='".$monitor_key."'>".$monitor_value."</label>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
            ?>
            </div>
            <button type="submit" class="btn btn-primary btn-md" name="add_computers">Add</button>
          </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>