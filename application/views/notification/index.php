<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Message</th>
                            <th>Added Date and Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($AllNotification as $key => $Noti) {
                            $i++;
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $Noti->msg ?></td>
                                <td><?= date("d-m-Y h:i:s A", strtotime($Noti->added_date)) ?></td>
                                <td>| <a href="<?= base_url('backend/Notification/delete/' . $Noti->id) ?>" onclick="return confirm('Are You Sure Want To Remove This Image?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><span class="fa fa-trash"></span></a></td>
                            </tr>
                        <?php }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>