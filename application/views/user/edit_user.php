<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
            echo form_open_multipart('backend/user/update_user', ['autocomplete' => false, 'id' => 'edit_user'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_users')])
            ?>
                <div class="form-group row"><label for="name" class="col-sm-2 col-form-label">Name *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $User[0]->name ?>" name="name" 
                            required id="name">
                        <input type="hidden" value="<?= $User[0]->id ?>" name="user_id" id="user_id">
                    </div>
                </div>

                <div class="form-group row"><label for="bank_detail" class="col-sm-2 col-form-label">Bank Detail *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $User[0]->bank_detail ?>" name="bank_detail" 
                            required id="bank_detail">
                    </div>
                </div>

                <div class="form-group row"><label for="adhar_card" class="col-sm-2 col-form-label">Adhar Card *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $User[0]->adhar_card ?>" name="adhar_card" 
                            required id="adhar_card">
                    </div>
                </div>

                <div class="form-group row"><label for="upi" class="col-sm-2 col-form-label">UPI *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $User[0]->upi ?>" name="upi" 
                            required id="upi">
                    </div>
                </div>

                <div class="form-group row"><label for="password" class="col-sm-2 col-form-label">Password *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $User[0]->password ?>" name="password" 
                            required id="password">
                    </div>
                </div>
                
                <div class="form-group row"><label for="mobile" class="col-sm-2 col-form-label">Mobile *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $User[0]->mobile ?>" name="mobile" 
                            required id="mobile" readonly>
                    </div>
                </div>

                <div class="form-group row"><label for="email" class="col-sm-2 col-form-label">Email *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" value="<?= $User[0]->email ?>" name="email" 
                            required id="email">
                    </div>
                </div>

                <div class="form-group row"><label for="gender" class="col-sm-2 col-form-label">Gender *</label>
                    <div class="col-sm-10 form-inline">
                        <!-- <input class="form-control" type="text" value="<?= $User[0]->gender ?>" name="gender" 
                            required id="gender"> -->
                    
                        <div class="form-check mr-5">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="m" <?= ($User[0]->gender=='m')?'checked':'' ?> >
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="f" <?= ($User[0]->gender=='f')?'checked':'' ?>>
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row"><label for="profile_pic" class="col-sm-2 col-form-label">Profile Pic *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file"  name="profile_pic" id="profile_pic">
                    </div>
                </div>

                <div class="form-group row"><label for="referral_code" class="col-sm-2 col-form-label">Referral Code *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $User[0]->referral_code ?>" name="referral_code" 
                            required id="referral_code" readonly>
                    </div>
                </div>
                
                <div class="form-group row"><label for="referred_by" class="col-sm-2 col-form-label">Referred By *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $User[0]->referred_by ?>" name="referred_by" 
                            required id="referred_by" readonly>
                    </div>
                </div>

                <div class="form-group row"><label for="app_version" class="col-sm-2 col-form-label">App Version *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= $User[0]->app_version ?>" name="app_version" 
                            required id="app_version" readonly>
                    </div>
                </div>

                <div class="form-group row"><label for="added_date" class="col-sm-2 col-form-label">Added Date *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="<?= date("d-m-Y h:i:s A", strtotime($User[0]->added_date)) ?>" name="added_date" 
                            required id="added_date" readonly>
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