<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    a{
        color:unset;
        
    }
    a:hover{
        text-decoration: unset;
    }
</style>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <ul class="nav nav-tabs">
                    <!-- <li class="active"><a data-toggle="tab" href="#wins">Wins</a></li> -->
                    <!-- <li class="active"><a data-toggle="tab" href="#purchase">Purchase</a></li>
                    <li><a data-toggle="tab" href="#reffer">Reffer Earn</a></li> -->
                    <li class="<?= (!isset( $referred_user_id) ? 'active' : '') ?>"><a data-toggle="tab" href="#purchase">Purchase</a></li>
                    <li class="<?= (isset( $referred_user_id) ? 'active' : '') ?>"><a data-toggle="tab" href="#reffer">Reffer Earn</a></li>
                    <li><a data-toggle="tab" href="#purchase_reffer">Purchase Reffer</a></li>
                    <li><a data-toggle="tab" href="#welcome_reffer">Welcome Reffer</a></li>
                    <li><a data-toggle="tab" href="#wallet_log">Wallet Log</a></li>
                    <?php if (POINT_RUMMY == true) { ?>
                        <li><a data-toggle="tab" href="#rummy_log">Point Rummy Log</a></li>
                    <?php } ?>
                    <?php if (RUMMY_POOL == true) { ?>
                        <li><a data-toggle="tab" href="#pool_log">Pool Rummy Log</a></li>
                    <?php } ?>
                    <?php if (RUMMY_DEAL == true) { ?>
                        <li><a data-toggle="tab" href="#deal_log">Deal Rummy Log</a></li>
                    <?php } ?>
                    <?php if (TEENPATTI == true) { ?>
                        <li><a data-toggle="tab" href="#3patti_log">Teen Patti Log</a></li>
                    <?php } ?>
                    <?php if (DRAGON_TIGER == true) { ?>
                        <li><a data-toggle="tab" href="#dragon_log">Dragon Tiger Log</a></li>
                    <?php } ?>
                    <?php if (ANDER_BAHAR == true) { ?>
                        <li><a data-toggle="tab" href="#ander_log">Andar Bahar Log</a></li>
                    <?php } ?>
                    <?php if (SEVEN_UP_DOWN == true) { ?>
                        <li><a data-toggle="tab" href="#seven_up">Seven Up Down Log</a></li>
                    <?php } ?>
                    <?php if (COLOR_PREDICTION == true) { ?>
                        <li><a data-toggle="tab" href="#color_prediction">Color Prediction Log</a></li>
                    <?php } ?>
                    <?php if (CAR_ROULETTE == true) { ?>
                        <li><a data-toggle="tab" href="#car_roulette">Car Roulette Log</a></li>
                    <?php } ?>
                    <?php if (ANIMAL_ROULETTE == true) { ?>
                        <li><a data-toggle="tab" href="#animal_roulette">Animal Roulette Log</a></li>
                    <?php } ?>
                    <?php if (JACKPOT == true) { ?>
                        <li><a data-toggle="tab" href="#jackpot">Jackpot Log</a></li>
                    <?php } ?>
                    <?php if (LUDO == true) { ?>
                        <li><a data-toggle="tab" href="#ludoHistory">Ludo Log</a></li>
                    <?php } ?>
                    <?php if (HEAD_TAILS == true) { ?>
                        <li><a data-toggle="tab" href="#head_tails">Head & Tails Log</a></li>
                    <?php } ?>
                    <?php if (RED_VS_BLACK == true) { ?>
                        <li><a data-toggle="tab" href="#red_black">Red Vs Black Log</a></li>
                    <?php } ?>
                    <?php if (BACCARAT == true) { ?>
                        <li><a data-toggle="tab" href="#baccarat">Baccarat Log</a></li>
                    <?php } ?>
                    <?php if (JHANDI_MUNDA == true) { ?>
                        <li><a data-toggle="tab" href="#jhandimunda">Jhandi Munda Log</a></li>
                    <?php } ?>
                    <?php if (ROULETTE == true) { ?>
                        <li><a data-toggle="tab" href="#roulette">Roulette Log</a></li>
                    <?php } ?>
                    <?php if (POKER == true) { ?>
                        <li><a data-toggle="tab" href="#poker">Poker</a></li>
                    <?php } ?>
                    <?php if (AVIATOR == true) { ?>
                        <li><a data-toggle="tab" href="#aviator">Aviator Log</a></li>
                    <?php } ?>
                </ul>
                <div class="tab-content">
                    <br>
                    <!-- <div id="wins" class="tab-pane fade in active">
                        <table class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game ID</th>
                                    <th>Amount</th>
                                    <th>Added Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AllWins as $key => $Game) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $Game->id ?></td>
                                    <td><?= $Game->amount ?></td>
                                    <td><?= date("d-m-Y h:i:s A", strtotime($Game->added_date)) ?></td>
                                </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div> -->
                    <div id="purchase" class="tab-pane fade <?= (!isset( $referred_user_id) ? 'in active' : '') ?>">
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Plan ID</th>
                                    <th>Coins</th>
                                    <th>Price</th>
                                    <th>Payment Status</th>
                                    <th>Added Date and Time</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AllPurchase as $key => $Purchase) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $Purchase->plan_id ?></td>
                                        <td><?= $Purchase->coin ?></td>
                                        <td><?= $Purchase->price ?></td>
                                        <td><?= ($Purchase->payment == 0) ? 'Failed' : 'Done' ?></td>
                                        <td><?= date("d-m-Y h:i:s A", strtotime($Purchase->added_date)) ?></td>

                                    </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <div id="reffer" class="tab-pane fade <?= (isset( $referred_user_id) ? 'in active' : '') ?>">
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>User Name</th>
                                    <th>Coins</th>
                                    <th>Team Count</th>
                                    <th>Added Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AllReffer as $key => $Reffer) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $Reffer->name ?></td>
                                        <td><?= $Setting->referral_amount ?></td>
                                      
                                        <td>
                                         <?php if ($Reffer->refer_count > 0): ?>
                                         <a href="<?= base_url('backend/User/view/' . $Reffer->user_id . '/' . $Reffer->referred_user_id) ?>">
                                         <?= $Reffer->refer_count ?>
                                         </a>
                                         <?php else: ?>
                                         <?= $Reffer->refer_count ?>
                                         <?php endif; ?>
                                         </td>

                                        <td><?= date("d-m-Y h:i:s A", strtotime($Reffer->added_date)) ?></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="purchase_reffer" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>User Name</th>
                                    <th>Coins</th>
                                    <th>Level</th>
                                    <th>Added Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AllPurchase_Reffer as $key => $Reffer) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $Reffer->name ?></td>
                                        <td><?= $Reffer->coin ?></td>
                                        <td><?= $Reffer->level ?></td>
                                        <td><?= date("d-m-Y h:i:s A", strtotime($Reffer->added_date)) ?></td>
                                    </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <div id="welcome_reffer" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>User Name</th>
                                    <th>Coins</th>
                                    <th>Level</th>
                                    <th>Added Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AllWelcome_Reffer as $key => $Reffer) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $Reffer->name ?></td>
                                        <td><?= $Reffer->coin ?></td>
                                        <td><?= $Reffer->level ?></td>
                                        <td><?= date("d-m-Y h:i:s A", strtotime($Reffer->added_date)) ?></td>
                                    </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <div id="wallet_log" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Amount</th>
                                    <th>Bonus</th>
                                    <th>Added Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($AllWalletLog as $key => $WalletLog) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $WalletLog->coin ?></td>
                                        <td><?= ($WalletLog->bonus) ? 'Yes' : 'No'; ?></td>
                                        <td><?= date("d-m-Y H:i:s A", strtotime($WalletLog->added_date)) ?></td>
                                    </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php if (POINT_RUMMY == true) { ?>
                        <div id="rummy_log" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>User Id</th>
                                        <th>Winning Amount</th>
                                        <th>User Amount</th>

                                        <th>Comission Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    if (is_array($RummyLog) || is_object($RummyLog)) {
                                        foreach ($RummyLog as $key => $rummy) {
                                            $i++;
                                    ?>

                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $rummy->game_id ?></a></td>
                                                <td><?= $rummy->user_id ?></td>
                                                <td><?= ($rummy->action==10)?$rummy->amount:'Loss ('.$rummy->amount.')' ?></td>
                                                <td><?= $rummy->user_amount ?></td>

                                                <td><?= $rummy->comission_amount ?></td>
                                                <td><?= date("d-m-Y h:i:s A", strtotime($rummy->added_date)) ?></td>
                                            </tr>
                                    <?php }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (RUMMY_POOL == true) { ?>
                        <div id="pool_log" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>User Id</th>
                                        <th>Winning Amount</th>
                                        <!-- <th>User Amount</th> -->
                                        <th>Comission Amount</th>
                                        <th>Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($RummyPool as $key => $pool) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $pool->game_id ?></td>
                                            <td><?= $pool->user_id ?></td>
                                            <!-- <td><?= $pool->user_winning_amt ?></td> -->
                                            <td><?= $pool->user_amount ?></td>
                                            <td><?= $pool->comission_amount ?></td>
                                            <td><?= $pool->amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($pool->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (RUMMY_DEAL == true) { ?>
                        <div id="deal_log" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>User Id</th>
                                        <th>Winning Amount</th>
                                        <!-- <th>User Amount</th> -->
                                        <th>Comission Amount</th>
                                        <th>Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($RummyDeal as $key => $deal) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $deal->game_id ?></td>
                                            <td><?= $deal->user_id ?></td>
                                            <!-- <td><?= $deal->winning_amount ?></td> -->
                                            <td><?= $deal->user_amount ?></td>
                                            <td><?= $deal->comission_amount ?></td>
                                            <td><?= $deal->amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($deal->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (TEENPATTI == true) { ?>
                        <div id="3patti_log" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>Invest</th>
                                        <th>Winning Amount</th>
                                        <th>Game Type</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($TeenPattiLog as $key => $teen) {
                                        if ($teen->table_type == 0) {
                                            $table_type = 'Teen Patti';
                                        } else if ($teen->table_type == 1) {
                                            $table_type = 'Private Table';
                                        } else {
                                            $table_type = 'Custom Boot';
                                        }
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $teen->game_id ?></td>
                                            <td><?= $teen->invest ?></td>
                                            <td><?= $teen->winning_amount ?></td>
                                            <td><?= $table_type ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($teen->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (DRAGON_TIGER == true) { ?>
                        <div id="dragon_log" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>User Id</th>
                                        <th>Bet</th>
                                        <th>Amount</th>
                                        <th>Winning Amount</th>
                                        <th>User Amount</th>
                                        <th>Comission Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($DragonWalletAmount as $key => $dragon) {
                                        if ($dragon->bet == DRAGON) {
                                            $bet = 'Dragon';
                                        } else if ($dragon->bet == TIGER) {
                                            $bet = 'Tiger';
                                        } else {
                                            $bet = 'Tie';
                                        }
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url('backend/DragonTiger/dragon_bet/' . $dragon->dragon_tiger_id) ?>" target="_blank"><?= $dragon->dragon_tiger_id ?></a></td>
                                            <td><?= $dragon->user_id ?></td>
                                            <td><?= $bet ?></td>
                                            <td><?= $dragon->amount ?></td>
                                            <td><?= $dragon->winning_amount ?></td>
                                            <td><?= $dragon->user_amount ?></td>
                                            <td><?= $dragon->comission_amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($dragon->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (ANDER_BAHAR == true) { ?>
                        <div id="ander_log" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>User Id</th>
                                        <th>Bet</th>
                                        <th>Amount</th>
                                        <th>Winning Amount</th>
                                        <th>User Amount</th>
                                        <th>Comission Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($WalletAmount as $key => $ander_baher) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url('backend/AnderBahar/ander_baher_bet/' . $ander_baher->ander_baher_id) ?>" target="_blank"><?= $ander_baher->ander_baher_id ?></a></td>
                                            <td><?= $ander_baher->user_id ?></td>
                                            <td><?= ($ander_baher->bet == ANDER) ? 'Andar' : 'Bahar' ?></td>
                                            <td><?= $ander_baher->amount ?></td>
                                            <td><?= $ander_baher->winning_amount ?></td>
                                            <td><?= $ander_baher->user_amount ?></td>
                                            <td><?= $ander_baher->comission_amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($ander_baher->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (SEVEN_UP_DOWN == true) { ?>
                        <div id="seven_up" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game Id</th>
                                        <th>User Id</th>
                                        <th>Bet</th>
                                        <th>Amount</th>
                                        <th>Winning Amount</th>
                                        <th>User Amount</th>
                                        <th>Comission Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($SevenUpAmount as $key => $seven) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $seven->seven_up_id ?></td>
                                            <td><?= $seven->user_id ?></td>
                                            <td><?= ($seven->bet == DOWN) ? 'Down' : 'Up' ?></td>
                                            <td><?= $seven->amount ?></td>
                                            <td><?= $seven->winning_amount ?></td>
                                            <td><?= $seven->user_amount ?></td>
                                            <td><?= $seven->comission_amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($seven->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (COLOR_PREDICTION == true) { ?>
                        <div id="color_prediction" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game Id</th>
                                        <th>User Id</th>
                                        <th>Bet</th>
                                        <th>Amount</th>
                                        <th>Winning Amount</th>
                                        <th>User Amount</th>
                                        <th>Comission Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($ColorPrediction as $key => $color) {
                                        if ($color->bet == GREEN) {
                                            $bet = 'Green';
                                        } else if ($color->bet == VIOLET) {
                                            $bet = 'Violet';
                                        } else if ($color->bet == RED) {
                                            $bet = 'Red';
                                        } else {
                                            $bet = $color->bet;
                                        }
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $color->color_prediction_id ?></td>
                                            <td><?= $color->user_id ?></td>
                                            <td><?= $bet ?></td>
                                            <td><?= $color->amount ?></td>
                                            <td><?= $color->winning_amount ?></td>
                                            <td><?= $color->user_amount ?></td>
                                            <td><?= $color->comission_amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($color->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (CAR_ROULETTE == true) { ?>
                        <div id="car_roulette" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game Id</th>
                                        <th>User Id</th>
                                        <th>Bet</th>
                                        <th>Amount</th>
                                        <th>Winning Amount</th>
                                        <th>User Amount</th>
                                        <th>Commision Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $bet = [0 => '', TOYOTA => 'Tata', MAHINDRA => 'Mahindra', AUDI => 'Audi', BMW => 'Bmw', MERCEDES => 'Mercedes', PORSCHE => 'Porshe', LAMBORGHINI => 'Lamborghini', FERRARI => 'Ferrari'];
                                    foreach ($CarRoulette as $key => $car) {

                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url('backend/CarRoulette/car_roulette_bet/' . $car->car_roulette_id) ?>" target="_blank"><?= $car->car_roulette_id ?></a></td>
                                            <td><?= $car->user_id ?></td>
                                            <td><?= $bet[$car->bet] ?></td>
                                            <td><?= $car->amount ?></td>
                                            <td><?= $car->winning_amount ?></td>
                                            <td><?= $car->user_amount ?></td>
                                            <td><?= $car->comission_amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($car->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (ANIMAL_ROULETTE == true) { ?>
                        <div id="animal_roulette" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game Id</th>
                                        <th>User Id</th>
                                        <th>Bet</th>
                                        <th>Amount</th>
                                        <th>Winning Amount</th>
                                        <th>User Amount</th>
                                        <th>Commision Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $bet = [0 => '', TIGER => 'Tiger', SNAKE => 'Snake', SHARK => 'Shark', FOX => 'Fox', CHEETAH => 'Cheetah', BEAR => 'Bear', WHALE => 'Whale', LION => 'Lion'];
                                    foreach ($AnimalRoulette as $key => $animal) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url('backend/AnimalRoulette/animal_roulette_bet/' .  $animal->animal_roulette_id) ?>" target="_blank"><?=  $animal->animal_roulette_id ?></a></td>
                                            <td><?= $animal->user_id ?></td>
                                            <td><?= $bet[$animal->bet] ?></td>
                                            <td><?= $animal->amount ?></td>
                                            <td><?= $animal->winning_amount ?></td>
                                            <td><?= $animal->user_amount ?></td>
                                            <td><?= $animal->comission_amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($animal->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <div id="jackpot" class="tab-pane fade">
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Game ID</th>
                                    <th>User Id</th>
                                    <th>Bet</th>
                                    <th>Amount</th>
                                    <th>Winning Amount</th>
                                    <th>User Amount</th>
                                    <th>Comission Amount</th>
                                    <th>Added Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $bet = [0 => '', HIGH_CARD => 'High Card', PAIR => 'Pair', COLOR => 'Color', SEQUENCE => 'Sequence', PURE_SEQUENCE => 'Pure Sequence', SET => 'Set'];
                                foreach ($Jackpot as $key => $jackpot) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><a href="<?= base_url('backend/Jackpot/jackpot_bet/' .  $jackpot->jackpot_id) ?>" target="_blank"><?=  $jackpot->jackpot_id ?></a></td>

                                        <td><?= $jackpot->user_id ?></td>
                                        <td><?= $bet[$jackpot->bet] ?></td>
                                        <td><?= $jackpot->amount ?></td>
                                        <td><?= $jackpot->winning_amount ?></td>
                                        <td><?= $jackpot->user_amount ?></td>
                                        <td><?= $jackpot->comission_amount ?></td>
                                        <td><?= date("d-m-Y h:i:s A", strtotime($jackpot->added_date)) ?></td>
                                    </tr>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <?php if (LUDO == true) { ?>
                        <div id="ludoHistory" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>User Id</th>
                                        <th>Amount</th>
                                        <th>User Amount</th>
                                        <th>Comission Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($Ludos as $key => $ludo) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ludo->ludo_table_id ?></td>
                                            <td><?= $ludo->winner_id ?></td>
                                            <td><?= $ludo->amount ?></td>
                                            <td><?= $ludo->user_winning_amt ?></td>
                                            <td><?= $ludo->admin_winning_amt ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($ludo->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (HEAD_TAILS == true) { ?>
                        <div id="head_tails" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>User Id</th>
                                        <th>Bet</th>
                                        <th>Amount</th>
                                        <th>Winning Amount</th>
                                        <th>User Amount</th>
                                        <th>Comission Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $bet = [HEAD => 'Head', TAIL => 'Tail'];
                                    foreach ($HeadTails as $key => $HeadTail) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url('backend/HeadTails/HeadTailsBet/' .  $HeadTail->head_tail_id) ?>" target="_blank"><?=  $HeadTail->head_tail_id ?></a></td>
                                            <td><?= $HeadTail->user_id ?></td>
                                            <td><?= $bet[$HeadTail->bet] ?></td>
                                            <td><?= $HeadTail->amount ?></td>
                                            <td><?= $HeadTail->winning_amount ?></td>
                                            <td><?= $HeadTail->user_amount ?></td>
                                            <td><?= $HeadTail->comission_amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($HeadTail->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (RED_VS_BLACK == true) { ?>
                        <div id="red_black" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>User Id</th>
                                        <th>Bet</th>
                                        <th>Amount</th>
                                        <th>Winning Amount</th>
                                        <th>User Amount</th>
                                        <th>Comission Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $bet = [0 => '', RB_RED => 'Red', RB_BLACK => 'Black', RB_PAIR => 'Pair', RB_COLOR => 'Color', RB_SEQUENCE => 'Sequence', RB_PURE_SEQUENCE => 'Pure Sequence', RB_SET => 'Set'];
                                    foreach ($RedBlacks as $key => $RedBlack) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url('backend/RedBlack/RedBlackBet/' .  $RedBlack->red_black_id) ?>" target="_blank"><?=  $RedBlack->red_black_id ?></a></td>
                                            <td><?= $RedBlack->user_id ?></td>
                                            <td><?= $bet[$RedBlack->bet] ?></td>
                                            <td><?= $RedBlack->amount ?></td>
                                            <td><?= $RedBlack->winning_amount ?></td>
                                            <td><?= $RedBlack->user_amount ?></td>
                                            <td><?= $RedBlack->comission_amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($RedBlack->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (BACCARAT == true) { ?>
                        <div id="baccarat" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>User Id</th>
                                        <th>Bet</th>
                                        <th>Amount</th>
                                        <th>Winning Amount</th>
                                        <th>User Amount</th>
                                        <th>Comission Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $bet = [PLAYER => 'Player', BANKER => 'Banker', TIE => 'Tie', PLAYER_PAIR => 'Player Pair', BANKER_PAIR => 'Banker Payer'];
                                    foreach ($Baccarats as $key => $Baccarat) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url('backend/Baccarat/baccarat_bet/' .  $Baccarat->baccarat_id) ?>" target="_blank"><?=  $Baccarat->baccarat_id ?></a></td>
                                            <td><?= $Baccarat->user_id ?></td>
                                            <td><?= $bet[$Baccarat->bet] ?></td>
                                            <td><?= $Baccarat->amount ?></td>
                                            <td><?= $Baccarat->winning_amount ?></td>
                                            <td><?= $Baccarat->user_amount ?></td>
                                            <td><?= $Baccarat->comission_amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($Baccarat->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (JHANDI_MUNDA == true) { ?>
                        <div id="jhandimunda" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>User Id</th>
                                        <th>Bet</th>
                                        <th>Amount</th>
                                        <th>Winning Amount</th>
                                        <th>User Amount</th>
                                        <th>Comission Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $bet = [0 => '', HEART => 'Heart', SPADE => 'Spade', DIAMOND => 'Daimond', CLUB => 'Club', FACE => 'Face', FLAG => 'Flag'];
                                    foreach ($JhandiMundas as $key => $JhandiMunda) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url('backend/JhandiMunda/JhandiMundaBet/' .  $JhandiMunda->jhandi_munda_id) ?>" target="_blank"><?=  $JhandiMunda->jhandi_munda_id ?></a></td>
                                            <td><?= $JhandiMunda->user_id ?></td>
                                            <td><?= $bet[$JhandiMunda->bet] ?></td>
                                            <td><?= $JhandiMunda->amount ?></td>
                                            <td><?= $JhandiMunda->winning_amount ?></td>
                                            <td><?= $JhandiMunda->user_amount ?></td>
                                            <td><?= $JhandiMunda->comission_amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($JhandiMunda->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <br>
                    <?php if (ROULETTE == true) { ?>
                        <div id="roulette" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>User Id</th>
                                        <th>Bet</th>
                                        <th>Amount</th>
                                        <th>Winning Amount</th>
                                        <th>User Amount</th>
                                        <th>Comission Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $bet = [R_TWELFTH_1ST => '1st 12', R_TWELFTH_2ND => '2nd 12', R_TWELFTH_3RD => '3rd 12', R_EIGHTEENTH_1ST => '1st 18', R_EIGHTEENTH_2ND => '2nd 18', R_ODD => 'odd', R_EVEN => 'even', R_RED => 'red', R_BLACK => 'black', R_ROW_1 => '1st row', R_ROW_2 => '2nd row', R_ROW_3 => '3rd row'];
                                    foreach ($Roulette as $key => $roulette) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url('backend/Roulette/RouletteBet/' .  $roulette->roulette_id) ?>" target="_blank"><?=  $roulette->roulette_id ?></a></td>
                                            
                                            <td><?= $roulette->user_id ?></td>
                                            <td><?= ($roulette->bet <= 36) ? $roulette->bet : $bet[$roulette->bet] ?></td>
                                            <td><?= $roulette->amount ?></td>
                                            <td><?= $roulette->winning_amount ?></td>
                                            <td><?= $roulette->user_amount ?></td>
                                            <td><?= $roulette->comission_amount ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($roulette->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <br>
                    <?php if (POKER == true) { ?>
                        <div id="poker" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Game ID</th>
                                        <th>Invest</th>
                                        <th>Winning Amount</th>
                                        <th>Commision Amount</th>
                                        <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($AllPokers as $key => $Game) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $Game->id ?></td>
                                            <td><?= $Game->amount ?></td>
                                            <td><?= $Game->user_winning_amt ?></td>
                                            <td><?= $Game->admin_winning_amt ?></td>
                                            <td><?= date("d-m-Y h:i:s A", strtotime($Game->added_date)) ?></td>
                                        </tr>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (AVIATOR == true) { ?>
                        <div id="aviator" class="tab-pane fade">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                    <th>Game Id</th>
                                    <th>User ID</th>
                                    <th>Amount</th>
                                   <th>Winnig Amount</th>
                                   <th>Comission Amount</th>
                                   <th>Added Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                            foreach ($AllAviators as $key => $Games) {
                        ?>
                        <tr>
                            <td><?= $Games->id ?></td>
                            <td><?= $Games->user_id ?></td>
                            <td><?= $Games->amount ?></td>
                            <td><?= $Games->winning_amount ?></td>
                            <td><?= $Games->comission_amount?></td>
                            <td><?= date("d-m-Y h:i:s A", strtotime($Games->added_date)) ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>

<script>
    $(document).ready(function() {
        $('.table').dataTable({
            dom: 'Bfrtip',
            "buttons": [
                'excel'
            ]
        });
    })

    

</script>