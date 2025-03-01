<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
            echo form_open_multipart('backend/SubAdmin/update_subadmin', ['autocomplete' => false, 'id' => 'edit_subadmin'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_admin')])
            ?>
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">First Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $subadmin->first_name ?>" name="first_name" 
                            required id="name">
                        <input type="hidden" value="<?= $subadmin->id ?>" name="subadmin_id" id="subadmin_id">
                    </div>
                </div>

                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Last Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $subadmin->last_name ?>" name="last_name" 
                            required id="name">
                    </div>
                </div>

              

                <div class="form-group row"><label for="password" class="col-sm-2 col-form-label">Password *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" value="<?= $subadmin->password ?>" name="password" 
                            required id="password">
                    </div>
                </div>
                
                <div class="form-group row"><label for="mobile" class="col-sm-2 col-form-label">Mobile *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $subadmin->mobile ?>" name="mobile" 
                            required id="mobile" readonly>
                    </div>
                </div>

                <div class="form-group row"><label for="email" class="col-sm-2 col-form-label">Email *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" value="<?= $subadmin->email_id ?>" name="email" 
                            required id="email">
                    </div>
                </div>

                <div class="form-group row">
                <label for="subadmin" class="col-sm-2 col-form-label">Subadmin</label>
                <div class="col-sm-10">
                <select class="form-control" id="subadmin" name="subadmin[]" multiple>
                <option value="USER_MANAGEMENT" <?= in_array('USER_MANAGEMENT', $subadmin->subadmin) ? 'selected' : '' ?>>USER MANAGEMENT</option><!-- <option value="USER_MANAGEMENT" <?= in_array(1, $subadmin->subadmin) == 'USER_MANAGEMENT' ? 'selected' : '' ?> >USERMANAGEMENT</option> -->
                <option value="SUB_ADMIN_MANAGEMENT" <?= in_array('SUB_ADMIN_MANAGEMENT', $subadmin->subadmin) ? 'selected' : '' ?> >SUBADMIN MANAGEMENT</option>
                <option value="AGENT" <?= in_array('AGENT', $subadmin->subadmin) ? 'selected' : '' ?> >AGENT MANAGEMENT</option>
                <option value="USER_CATEGORY" <?= in_array('USER_CATEGORY', $subadmin->subadmin) ? 'selected' : '' ?> >USER CATEGORY</option>
                <option value="WITHDRAWL_DASHBOARD" <?= in_array('WITHDRAWL_DASHBOARD', $subadmin->subadmin) ? 'selected' : '' ?> >WITHDRAWL DASHBOARD</option>
                <option value="CHIPS_MANAGEMENT" <?= in_array('CHIPS_MANAGEMENT', $subadmin->subadmin) ? 'selected' : '' ?> >CHIPS MANAGEMENT</option>
                <option value="GIFT_MANAGEMENT" <?= in_array('GIFT_MANAGEMENT', $subadmin->subadmin) ? 'selected' : '' ?> >GIFT MANAGEMENT</option>
                <option value="PURCHASE_HISTORY" <?= in_array('PURCHASE_HISTORY', $subadmin->subadmin) ? 'selected' : '' ?> >PURCHASE HISTORY</option>
                <option value="LEAD_BOARD" <?= in_array('LEAD_BOARD', $subadmin->subadmin) ? 'selected' : '' ?> >LEAD BOARD</option>
                <option value="NOTIFICATION" <?= in_array('NOTIFICATION', $subadmin->subadmin) ? 'selected' : '' ?> >NOTIFICATION</option>
                <option value="WELCOME_BONUS" <?= in_array('WELCOME_BONUS', $subadmin->subadmin) ? 'selected' : '' ?> >WELCOME_BONUS</option>
                <option value="SETTING" <?= in_array('SETTING', $subadmin->subadmin) ? 'selected' : '' ?> >SETTING</option>
                <option value="WITHDRAWAL_LOG" <?= in_array('WITHDRAWAL_LOG', $subadmin->subadmin) ? 'selected' : '' ?> >WITHDRAWAL_LOG</option>
                <option value="COMISSION" <?= in_array('COMISSION', $subadmin->subadmin) ? 'selected' : '' ?> >COMISSION</option>
                <option value="BANNER" <?= in_array('BANNER', $subadmin->subadmin) ? 'selected' : '' ?> >BANNER</option>
                <option value="APPBANNER" <?= in_array('APPBANNER', $subadmin->subadmin) ? 'selected' : '' ?> >APP BANNER</option>
                <option value="TEENPATTI" <?= in_array('TEENPATTI', $subadmin->subadmin) ? 'selected' : '' ?> >TEENPATTI</option>
                <option value="POINT_RUMMY" <?= in_array('POINT_RUMMY', $subadmin->subadmin) ? 'selected' : '' ?> >POINT RUMMY</option>
                <option value="RUMMY_POOL" <?= in_array('RUMMY_POOL', $subadmin->subadmin) ? 'selected' : '' ?> >RUMMY POOL</option>
                <option value="RUMMY_DEAL" <?= in_array('RUMMY_DEAL', $subadmin->subadmin) ? 'selected' : '' ?> >RUMMY DEAL</option>
                <option value="ANDER_BAHAR" <?= in_array('ANDER_BAHAR', $subadmin->subadmin) ? 'selected' : '' ?> >ANDER BAHAR</option>
                <option value="ANDER_BAHAR_PLUS" <?= in_array('ANDER_BAHAR_PLUS', $subadmin->subadmin) ? 'selected' : '' ?> >ANDER BAHAR PLUS</option>
                <option value="AVIATOR" <?= in_array('AVIATOR', $subadmin->subadmin) ? 'selected' : '' ?> >AVIATOR</option>
                <option value="LOTTERY" <?= in_array('LOTTERY', $subadmin->subadmin) ? 'selected' : '' ?> >LOTTERY</option>
                <option value="TARGET" <?= in_array('TARGET', $subadmin->subadmin) ? 'selected' : '' ?> >TARGET</option>
                <option value="SEVEN_UP_DOWN" <?= in_array('SEVEN_UP_DOWN', $subadmin->subadmin) ? 'selected' : '' ?> >SEVEN UP DOWN</option>
                <option value="CAR_ROULETTE" <?= in_array('CAR_ROULETTE', $subadmin->subadmin) ? 'selected' : '' ?> >CAR ROULETTE</option>
                <option value="COLOR_PREDICTION" <?= in_array('COLOR_PREDICTION', $subadmin->subadmin) ? 'selected' : '' ?> >COLOR_PREDICTION</option>
                <option value="JACKPOT" <?= in_array('JACKPOT', $subadmin->subadmin) ? 'selected' : '' ?> >JACKPOT</option>
                <option value="ANIMAL_ROULETTE" <?= in_array('ANIMAL_ROULETTE', $subadmin->subadmin) ? 'selected' : '' ?> >ANIMAL ROULETTE</option>
                <option value="LUDO" <?= in_array('LUDO', $subadmin->subadmin) ? 'selected' : '' ?> >LUDO</option>
                <option value="LUDO_LOCAL" <?= in_array('LUDO_LOCAL', $subadmin->subadmin) ? 'selected' : '' ?> >LUDO LOCAL</option>
                <option value="LUDO_COMPUTER" <?= in_array('LUDO_COMPUTER', $subadmin->subadmin) ? 'selected' : '' ?> >LUDO COMPUTER</option>
                <option value="BACCARAT" <?= in_array('BACCARAT', $subadmin->subadmin) ? 'selected' : '' ?> >ROULETTE</option>
                <option value="POKER" <?= in_array('POKER', $subadmin->subadmin) ? 'selected' : '' ?> > POKER</option>
                <option value="HEAD_TAILS" <?= in_array('HEAD_TAILS', $subadmin->subadmin) ? 'selected' : '' ?> >HEAD_TAILS</option>
                <option value="JHANDI_MUNDA" <?= in_array('JHANDI_MUNDA', $subadmin->subadmin) ? 'selected' : '' ?> >JHANDI MUNDA</option>
                <option value="ROULETTE" <?= in_array('ROULETTE', $subadmin->subadmin) ? 'selected' : '' ?> >ROULETTE</option>
                <option value="RUMMY_TOURNAMENT" <?= in_array('RUMMY_TOURNAMENT', $subadmin->subadmin) ? 'selected' : '' ?> >RUMMY TOURNAMENT</option>


             </select>
           </div>
       </div>
                <div class="form-group row"><label for="added_date" class="col-sm-2 col-form-label">Added Date *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= date("d-m-Y h:i:s A", strtotime($subadmin->created_date)) ?>" name="added_date" 
                            required id="added_date" readonly>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                        ?>
                        <a href="<?= base_url('backend/SubAdmin') ?>" class="btn btn-secondary waves-effect">Cancel</a>
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