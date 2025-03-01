<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="card-body table-responsive">

                    <table class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <?php if ($_ENV['ENVIRONMENT'] == 'demo' || $_ENV['ENVIRONMENT'] == 'fame') { ?>
                                    <th>Name</th>
                                    <th>User ID</th>
                                    <th>Image</th>
                                    <th>Mobile</th>
                                <?php } else { ?>

                                    <th>Name</th>
                                    <th>User ID</th>
                                    <th>Image</th>
                                    <th><?= $Setting->bank_detail_field ?></th>
                                    <th><?= $Setting->adhar_card_field ?></th>
                                    <th><?= $Setting->upi_field ?></th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>User Type</th>
                                    <?php if (USER_CATEGORY) { ?>
                                        <th>User Category</th>
                                    <?php } ?>
                                    <th>Total Wallet</th>
                                    <th>Winning Wallet</th>
                                    <th>Unutilized Wallet</th>
                                    <th>Bonus Wallet</th>
                                    <th>On Table</th>
                                    <th>Status</th>
                                    <th>Added Date and Time</th>
                                    <th>Action</th>
                                <?php } ?>
                            </tr>

                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<script>
    function ChangeStatus(id, status) {
        jQuery.ajax({
            url: "<?= base_url('backend/user/ChangeStatus') ?>",
            type: "POST",
            data: {
                'id': id,
                'status': status
            },
            success: function(data) {
                if (data) {
                    alert('Successfully Change status');
                }
                location.reload();
            }
        });
    }

    $(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'throw';

        var columns;

        <?php if ($_ENV['ENVIRONMENT'] == 'demo' || $_ENV['ENVIRONMENT'] == 'fame') { ?>
            // Include all columns
            columns = [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'ID'
                },
                {
                    data: 'profile_pic'
                },
                {
                    data: 'mobile'
                }
            ];



        <?php } else { ?>
            // Include only Name and Mobile columns

            columns = [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'ID'
                },
                {
                    data: 'profile_pic'
                },
                {
                    data: 'bank_detail'
                },
                {
                    data: 'adhar_card'
                },
                {
                    data: 'upi'
                },
                {
                    data: 'email'
                },
                {
                    data: 'mobile'
                },
                {
                    data: 'user_type'
                },
                <?php if (USER_CATEGORY) { ?> {
                        data: 'user_category'
                    },
                <?php } ?> {
                    data: 'wallet'
                },
                {
                    data: 'winning_wallet'
                },
                {
                    data: 'unutilized_wallet'
                },
                {
                    data: 'bonus_wallet'
                },
                {
                    data: 'on_table'
                },
                {
                    data: 'status'
                },
                {
                    data: 'added_date'
                },
                {
                    data: 'action'
                }
            ];
        <?php } ?>

        $(".table").DataTable({
            searchDelay: 1000,
            processing: true,
            serverSide: true,
            scrollX: true,
            serverMethod: 'post',
            ajax: {
                url: "<?= base_url('backend/user/GetUsers') ?>"
            },
            columns: columns,

            lengthMenu: [
                [10, 50, 100, 200, -1],
                [10, 50, 100, 200, "All"]
            ],
            pageLength: 10,
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
        }).fnAdjustColumnSizing(false);


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