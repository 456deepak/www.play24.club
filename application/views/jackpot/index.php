<div class="row">
    <div class="col-12">
        <div class="card">
        <div  style="display: flex;margin-left: auto;margin-right: 26px;margin-top: 15px;">
   
   <lable class="font-14 text-uppercase" style="padding: 0px 10px;font-weight:bold">Random</lable><input class="form-check form-switch" type="checkbox" name="teen_patti" id="teen_patti" <?= ($RandomFlag)?'checked':'' ?> value="<?= $RandomFlag?0:1 ?>" switch="none">
               <label class="form-label" for="teen_patti" data-on-label="On" data-off-label="Off"></label>
</div>
            <div class="card-body">
                <table class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Game Id</th>
                            <th>Date and Time</th> 
                            <th>Users</th>
                            <th>Total Bet</th>
                            <th>Winnig Amount</th>
                            <th>User Amount</th>
                            <th>Commission Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($AllGames as $key => $Games) {
                                $bet=0;
                                $users=0;
                                $amt=0;
                                if (!empty($Games->details)) {
                                    foreach ($Games->details as $key1 => $game) {
                                        $bet+= $game->amount;
                                        $users++;
                                        $amt+= $game->winning_amount;
                                    }
                                } ?>
                        <tr>
                            <td><?= $Games->id ?></td>
                            <td><?= date("d-m-Y H:i:s A", strtotime($Games->added_date)) ?></td>
                            <td><u><a href="<?= base_url('backend/Jackpot/jackpot_bet/'.$Games->id)?>"> <?= $users ?>
                                    </a></u></td>
                            <td><?= $bet ?></td>
                            <td><?= $amt ?></td>
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

$(document).on('change', '.form-switch', function(e) {
		e.preventDefault();
        var type=$(this).val()
        if(type==1){
        $(this).val(0)
       }else{
       $(this).val(1)
        }
        jQuery.ajax({
			type: 'POST',
			url: '<?= base_url('backend/Jackpot/ChangeStatus') ?>',
			data: {
			type:type
			},
			beforeSend: function() {},
			success: function(response) {
			},
			error: function(e) {}
		})
	});
</script>