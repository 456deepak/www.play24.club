<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <?php
            echo form_open_multipart('backend/SubAdmin/insert', ['autocomplete' => false, 'id' => 'add_user'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_users')])
            ?>
                <div class="form-group row"><label for="first_name" class="col-sm-2 col-form-label">First Name *</label>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" name="first_name" required id="first_name">
                    </div>
                </div>

                 <div class="form-group row"><label for="last_name" class="col-sm-2 col-form-label">Last Name *</label>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" name="last_name" required id="last_name">
                    </div>
                </div>

                <div class="form-group row"><label for="email" class="col-sm-2 col-form-label">Email *</label>
                    <div class="col-sm-10">
                    <input class="form-control" type="email" min="0" name="email" required id="email">
                    </div>
                </div>

                <div class="form-group row"><label for="password" class="col-sm-2 col-form-label">Password *</label>
                    <div class="col-sm-10">
                    <input class="form-control" type="password" min="0" name="password" required id="password">
                    </div>
                </div>
 
                 <div class="form-group row"><label for="mobile" class="col-sm-2 col-form-label">Mobile *</label>
                    <div class="col-sm-10">
                    <input class="form-control" type="mobile" min="0" name="mobile" required id="mobile">
                    </div>
</div>


            <div class="form-group row">
                <label for="subadmin" class="col-sm-2 col-form-label">Sub Admin *</label>
                <div class="col-sm-10">
                    <select class="form-control" id="subadmin" name="subadmin[]" multiple>
                    <option value="USER_MANAGEMENT">USER MANAGEMENT</option>
                    <option value="AGENT">AGENT MANAGEMENT</option>
                    <option value="SUB_ADMIN_MANAGEMENT">SUB ADMIN MANAGEMENT</option>
                    <option value="USER_CATEGORY">USER CATEGORY</option>
                    <option value="WITHDRAWL_DASHBOARD">WITHDRAWAL DASHBOARD</option>
                    <option value="CHIPS_MANAGEMENT">CHIPS MANAGEMENT</option>
                    <option value="GIFT_MANAGEMENT">GIFT MANAGEMENT</option>
                    <option value="PURCHASE_HISTORY">PURCHASE HISTORY</option>
                    <option value="LEAD_BOARD">LEAD BOARD</option>
                    <option value="NOTIFICATION">NOTIFICATION</option>
                    <option value="WELCOME_BONUS">WELCOME BONUS</option>
                    <option value="SETTING">SETTING</option>
                    <option value="REEDEM_MANAGEMENT">REEDEM MANAGEMENT</option>
                    <option value="WITHDRAWAL_LOG">WITHDRAWAL LOG</option>
                    <option value="COMISSION">COMMISSION</option>
                    <option value="BANNER">BANNER</option>
                    <option value="APPBANNER">APP BANNER</option>
                    <option value="TEENPATTI">TEENPATTI</option>
                    <option value="POINT_RUMMY">POINT RUMMY</option>
                    <option value="RUMMY_POOL">RUMMY POOL</option>
                    <option value="RUMMY_DEAL">RUMMY DEAL</option>
                    <option value="ANDER_BAHAR">ANDER BAHAR</option>
                    <option value="ANDER_BAHAR_PLUS">ANDER BAHAR PLUS</option>
                    <option value="DRAGON_TIGER">DRAGON TIGER</option>
                    <option value="AVIATOR">AVIATOR</option>
                    <option value="LOTTERY">LOTTERY</option>
                    <option value="TARGET">TARGET</option>
                    <option value="SEVEN_UP_DOWN">SEVEN UP DOWN</option>
                    <option value="CAR_ROULETTE">CAR ROULETTE</option>
                    <option value="COLOR_PREDICTION">COLOR PREDICTION</option>
                    <option value="JACKPOT">JACKPOT</option>
                    <option value="ANIMAL_ROULETTE">ANIMAL ROULETTE</option>
                    <option value="LUDO">LUDO</option>
                    <option value="LUDO_LOCAL">LUDO LOCAL</option>
                    <option value="LUDO_COMPUTER">LUDO COMPUTER</option>
                    <option value="BACCARAT">BACCARAT</option>
                    <option value="POKER">POKER</option>
                    <option value="RED_VS_BLACK">RED VS BLACK</option>
                    <option value="HEAD_TAILS">HEAD TAILS</option>
                    <option value="JHANDI_MUNDA">JHANDI MUNDA</option>
                    <option value="ROULETTE">ROULETTE</option>
                    <option value="RUMMY_TOURNAMENT">RUMMY TOURNAMENT</option>

                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>


                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                        ?>
                        <a href="<?= base_url('backend/User') ?>" class="btn btn-secondary waves-effect">Cancel</a>
                    </div>
                </div>
            <?php
            echo form_close();
            ?>
            </div>
        </div><!-- end col -->
    </div>

    <!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Select2 plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#subadmin').select2();
    });
</script>


