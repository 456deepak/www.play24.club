<section class="section">
    <div class="card">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <input type="hidden" id="sn_date" value="" name="start_date">
                            <input type="hidden" id="en_date" value="" name="end_date">
                            <label for="crm_attendence_date">Date filter</label>
                            <div id="report" class="form-control" style=" cursor: pointer; ">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span>
                                <i class="fa fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-1">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-4">Search</button>
                        </div>
                    </div>
        

                </div>
            </form>
        </div>
    </div>

</section>
<div class="row">
    <div class="col-12">
        <div class="card">
        <!-- <div  style="display: flex;margin-left: auto;margin-right: 26px;margin-top: 15px;"> -->
   
   <!-- <lable class="font-14 text-uppercase" style="padding: 0px 10px;font-weight:bold">Random</lable><input class="form-check form-switch" type="checkbox" name="teen_patti" id="teen_patti" <?= ($RandomFlag)?'checked':'' ?> value="<?= $RandomFlag?0:1 ?>" switch="none">
               <label class="form-label" for="teen_patti" data-on-label="On" data-off-label="Off"></label>
</div> -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <label>Select Winner</label>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="random" id="random">
                            <option value="0" <?= ($RandomFlag==0)?'selected':'' ?>>0</option>
                            <option value="1" <?= ($RandomFlag==1)?'selected':'' ?>>1</option>
                            <option value="2" <?= ($RandomFlag==2)?'selected':'' ?>>2</option>
                            <option value="3" <?= ($RandomFlag==3)?'selected':'' ?>>3</option>
                            <option value="4" <?= ($RandomFlag==4)?'selected':'' ?>>4</option>
                            <option value="5" <?= ($RandomFlag==5)?'selected':'' ?>>5</option>
                            <option value="6" <?= ($RandomFlag==6)?'selected':'' ?>>6</option>
                            <option value="7" <?= ($RandomFlag==7)?'selected':'' ?>>7</option>
                            <option value="8" <?= ($RandomFlag==8)?'selected':'' ?>>8</option>
                            <option value="9" <?= ($RandomFlag==9)?'selected':'' ?>>9</option>
                            <option value="<?= LEAST ?>" <?= ($RandomFlag==LEAST)?'selected':'' ?>>Least</option>
                            <option value="<?= RANDOM ?>" <?= ($RandomFlag==RANDOM)?'selected':'' ?>>Random</option>
                            <option value="<?= BIG ?>" <?= ($RandomFlag==BIG)?'selected':'' ?>>Big</option>
                            <option value="<?= SMALL ?>" <?= ($RandomFlag==SMALL)?'selected':'' ?>>Small</option>
                        </select>
                    </div>
                </div>
                <br>
                <table class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Game Id</th>
                            <th>Date and Time</th>
                            <th>Users</th>
                            <th>Total Bet</th>
                            <th>Admin Profit</th>
                            <th>Winnig Amount</th>
                            <th>User Amount</th>
                            <th>Commission Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($AllGames as $key => $Games) {
                                ?>
                        <tr>
                            <td><?= $Games->id ?></td>
                            <td><?= date("d-m-y H:i:s A", strtotime($Games->added_date)) ?></td>
                            <td><u><a href="<?= base_url('backend/ColorPrediction3Min/color_prediction_bet/'.$Games->id)?>">
                            <?= $Games->total_users ?> </a></u></td>
                            <td><?= $Games->total_amount ?></td>
                            <td><?= $Games->admin_profit ?></td>
                            <td><?= $Games->winning_amount ?></td>
                            <td><?= $Games->user_amount ?></td>
                            <td><?= $Games->comission_amount ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<script>

$(document).on('change', '#random', function(e) {
		e.preventDefault();
        var type=$(this).val()
    //     if(type==1){
    //     $(this).val(0)
    //    }else{
    //    $(this).val(1)
    //     }
        jQuery.ajax({
			type: 'POST',
			url: '<?= base_url('backend/ColorPrediction3Min/ChangeStatus') ?>',
			data: {
			type:type
			},
			beforeSend: function() {},
			success: function(response) {
			},
			error: function(e) {}
		})
	});

    

    $(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'throw';
    $(".table").DataTable({
        dom: 'Bfrtip',
        buttons: [{
                        "extend": 'excel',
                            "titleAttr": 'USerExcel',
                            "action": newexportaction
                        },{
                        "extend": 'pdf',
                            "titleAttr": 'userpdf',
                            "action": newexportaction
                        }] 

    });

    function newexportaction(e, dt, button, config) {
         var self = this;
         var oldStart = dt.settings()[0]._iDisplayStart;
         dt.one('preXhr', function (e, s, data) {
             // Just this once, load all data from the server...
             data.start = 0;
             data.length = 2147483647;
             dt.one('preDraw', function (e, settings) {
                 // Call the original action function
                 if (button[0].className.indexOf('buttons-copy') >= 0) {
                     $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                 } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                     $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                         $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                         $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                 } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                     $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                         $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                         $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                 } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                     $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                         $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                         $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                 } else if (button[0].className.indexOf('buttons-print') >= 0) {
                     $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                 }
                 dt.one('preXhr', function (e, s, data) {
                     // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                     // Set the property to what it was before exporting.
                     settings._iDisplayStart = oldStart;
                     data.start = oldStart;
                 });
                 // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                 setTimeout(dt.ajax.reload, 0);
                 // Prevent rendering of the full data to the DOM
                 return false;
             });
         });
         // Requery the server with the new one-time export settings
         dt.ajax.reload();
     }
});

</script>