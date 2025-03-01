<?php

function getToken()
{
    $data = "sadda89d893jkh**($&#*isdfhkjsdhf89334324";
    $token_number = hash('sha512', $data);
    return $token_number;
}

function min_redeem()
{
    $CI =& get_instance();

    $CI->db->select('min_redeem');
    $CI->db->from('tbl_admin');
    return $CI->db->get()->row()->min_redeem;
}

function push_notification_android($device_id, $message)
{
    //API URL of FCM
    $url = 'https://fcm.googleapis.com/fcm/send';

    /*api_key available in:
    Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/    $api_key = SERVER_KEY;

    $fields = array(
        'registration_ids' => (is_array($device_id))?$device_id:[$device_id],
        'data' => array(
                "message" => $message
        )
    );

    //header includes Content type and api key
    $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$api_key
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === false) {
        die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
    // echo $result;
    // exit;
    return $result;
}

function Send_SMS($MobileNo, $MSZ)
{
    // <editor-fold defaultstate="collapsed" desc="Send SMS">
    $msz = urlencode($MSZ);
    // $url = "http://www.makemysms.in/api/sendsms.php?username=AndroOTP&password=Sms@123&sender=ANDROP&mobile=$MobileNo&message=$msz&type=1&product=1";
    // $url = "http://sms53.hakimisolution.com/api/sendhttp.php?authkey=8707A7FvZhWH0QH5ee4bcf4P11&mobiles=$MobileNo&message=$msz&sender=TITANI&route=4&country=0";
    $url = "https://securesmpp.com/api/sendmessage.php?usr=tiktokrummy&apikey=CCBB75C3EFECEB0C17CB&sndr=TIKTOK&ph=".$MobileNo."&Template_ID=template_id&message=".$msz;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, true);
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
    // curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0');
    $strc = curl_exec($curl);
    SMS_Log($MobileNo, $url, $strc);
    return $strc;
    // </editor-fold>
}

function Send_OTP($MobileNo, $OTP)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://mdssend.in/api.php?username=AndroApp&apikey=gFZOzkTHsXoI&senderid=MOBSFT&route=TRANS&mobile='.$MobileNo.'&text=Dear%20Customer%2C%20'.$OTP.'%20is%20your%20OTP%20for%20Login%20and%20registration.%20OTPs%20are%20SECRET%2C%20Do%20not%20disclose%20it%20to%20anyone.%20-%20MOBSFT',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);
// print_r($response);die;
    curl_close($curl);
    return $response;
}    



function SMS_Log($mobile, $url, $response)
{
    // <editor-fold defaultstate="collapsed" desc="Upload to EMR">
    $ci = & get_instance();
    $data = [
        'mobile' => $mobile,
        'url' => $url,
        'response' => $response,
        'added_date' => date('Y-m-d H:i:s')
    ];
    $ci->db->insert('tbl_sms_log', $data);
    return $ci->db->last_query();
    // </editor-fold>
}

function upload_image($file, $path, $i = '')
{
    $ci = &get_instance();
    if ($i !== '') {
        $_FILES['file']['name'] = $file['name'][$i];
        $_FILES['file']['type'] = $file['type'][$i];
        $_FILES['file']['tmp_name'] = $file['tmp_name'][$i];
        $_FILES['file']['error'] = $file['error'][$i];
        $_FILES['file']['size'] = $file['size'][$i];
        $ext = pathinfo($file['name'][$i], PATHINFO_EXTENSION);
    } else {
        $_FILES['file']['name'] = $file['name'];
        $_FILES['file']['type'] = $file['type'];
        $_FILES['file']['tmp_name'] = $file['tmp_name'];
        $_FILES['file']['error'] = $file['error'];
        $_FILES['file']['size'] = $file['size'];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    }
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'jpg|jpeg|png';
    $file_name =  date("Ymd_Hi") . "_" . uniqid() . "." . $ext;
    $config['file_name'] = $file_name;
    $ci->load->library('upload', $config);
    $ci->upload->initialize($config);
    if ($ci->upload->do_upload('file')) {
        $ci->upload->data();
        return $file_name;
    }
}

// function upload_apk($file, $path, $i = '')
// {
//     $ci = &get_instance();

//     $_FILES['file']['name'] = $file['name'];
//     $_FILES['file']['type'] = $file['type'];
//     $_FILES['file']['tmp_name'] = $file['tmp_name'];
//     $_FILES['file']['error'] = $file['error'];
//     $_FILES['file']['size'] = $file['size'];
//     $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

//     $config['upload_path'] = $path;
//     $config['allowed_types'] = 'apk';
//     $file_name =  "game.apk";
//     unlink($file_name);
//     $config['file_name'] = $file_name;
//     $ci->load->library('upload', $config);
//     $ci->upload->initialize($config);
//     if ($ci->upload->do_upload('file')) {
//         $ci->upload->data();
//         return $file_name;
//     } else {
//         $error = $ci->upload->display_errors();
//         print_r($error);
//         exit;
//     }
// }

function upload_apk($file, $path, $i = '')
{
    $ci = &get_instance();

    // Debugging: Log file type
    echo 'File type: ' . $file['type'] . "\n";

    // Set up the $_FILES array for the file to be uploaded
    $_FILES['file']['name'] = $file['name'];
    $_FILES['file']['type'] = $file['type'];
    $_FILES['file']['tmp_name'] = $file['tmp_name'];
    $_FILES['file']['error'] = $file['error'];
    $_FILES['file']['size'] = $file['size'];

    $file_name = "game.apk";
    $full_path = $path . $file_name;

    // Check if the file exists before attempting to delete it
    if (file_exists($full_path)) {
        if (!unlink($full_path)) {
            echo "Error: unable to delete existing file.";
            exit;
        }
    }

    // Configure upload settings
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'apk';
    $config['file_name'] = $file_name;

    // Load and initialize the upload library
    $ci->load->library('upload', $config);
    $ci->upload->initialize($config);

    // Attempt to upload the file
    if ($ci->upload->do_upload('file')) {
        $ci->upload->data();
        return $file_name;
    } else {
        // Display and log the error if upload fails
        $error = $ci->upload->display_errors();
        log_message('error', 'Upload error: ' . $error);
        print_r($error);
        exit;
    }
}

function word_to_digit($word)
{
    $warr = explode(';', $word);
    $result = '';
    foreach ($warr as $value) {
        switch(trim(strtolower($value))) {
            case 'zero':
                $result .= '0';
                break;
            case 'one':
                $result .= '1';
                break;
            case 'two':
                $result .= '2';
                break;
            case 'three':
                $result .= '3';
                break;
            case 'four':
                $result .= '4';
                break;
            case 'five':
                $result .= '5';
                break;
            case 'six':
                $result .= '6';
                break;
            case 'seven':
                $result .= '7';
                break;
            case 'eight':
                $result .= '8';
                break;
            case 'nine':
                $result .= '9';
                break;
        }
    }
    return $result;
}

function shuffle_assoc($my_array)
{
    $keys = array_keys($my_array);

    shuffle($keys);

    foreach ($keys as $key) {
        $new[$key] = $my_array[$key];
    }

    $my_array = $new;

    return $my_array;
}

function minus_from_wallets($user_id, $amount, $minus_wallet=0)
{
    $CI =& get_instance();

    $CI->db->select('winning_wallet,unutilized_wallet,bonus_wallet');
    $CI->db->from('tbl_users');
    $CI->db->where('id', $user_id);
    $Query = $CI->db->get();

    $wallet_row = $Query->row();

    $unutilized_wallet = $wallet_row->unutilized_wallet??0;
    $unutilized_wallet_minus = ($unutilized_wallet>$amount) ? $amount : $unutilized_wallet;
    $amount -=$unutilized_wallet_minus;
    if ($unutilized_wallet_minus>0) {
        $CI->db->set('unutilized_wallet', 'unutilized_wallet-' . $unutilized_wallet_minus, false);
        if($minus_wallet==1) {
            $CI->db->set('wallet', 'wallet-' . $unutilized_wallet_minus, false);
        }
        $CI->db->where('id', $user_id);
        $CI->db->update('tbl_users');
    }
    if($amount>0) {
        $winning_wallet = $wallet_row->winning_wallet??0;
        $winning_wallet_minus = ($winning_wallet>$amount) ? $amount : $winning_wallet;
        $amount -=$winning_wallet_minus;
        if ($winning_wallet_minus>0) {
            $CI->db->set('winning_wallet', 'winning_wallet-' . $winning_wallet_minus, false);
            if($minus_wallet==1) {
                $CI->db->set('wallet', 'wallet-' . $winning_wallet_minus, false);
            }
            $CI->db->where('id', $user_id);
            $CI->db->update('tbl_users');
        }
    }

    if($amount>0) {
        $bonus_wallet = $wallet_row->bonus_wallet??0;
        $bonus_wallet_minus = ($bonus_wallet>$amount) ? $amount : $bonus_wallet;
        $amount -=$bonus_wallet_minus;
        if ($bonus_wallet_minus>0) {
            $CI->db->set('bonus_wallet', 'bonus_wallet-' . $bonus_wallet_minus, false);
            if($minus_wallet==1) {
                $CI->db->set('wallet', 'wallet-' . $bonus_wallet_minus, false);
            }
            $CI->db->where('id', $user_id);
            $CI->db->update('tbl_users');
        }
    }
    return true;
}

function upload_base64_image($base64, $path)
{
    if (!empty($base64)) {
        $img = $base64;
        $img = str_replace(' ', '+', $img);
        $img_data = base64_decode($img);
        $image = uniqid() . '.png';
        $file = $path . $image;
        file_put_contents($file, $img_data);
        return $image;
    }
    exit;

    return false;
}

function log_statement($user_id, $source,$amount,$source_id=0,$admin_commission=0) 
{
    $ci =& get_instance(); 
    $ci->load->model(['Setting_model']);
    $user = $ci->Users_model->UserProfile($user_id);
    if(!empty($user)){

    $setting = $ci->Setting_model->Setting();
    $ci->Setting_model->updateAdminCoin($admin_commission);
    $admin_current_wallet=$setting->admin_coin+$admin_commission;

    $current_wallet=$user[0]->wallet;
    $data = [
        'user_id' => $user_id,
        'source' => $source,
        'source_id' => $source_id,
        'amount' => $amount,
        'current_wallet' => $current_wallet,
        'admin_commission' => $admin_commission,
        'admin_coin' => $admin_current_wallet,
        'added_date' => date('Y-m-d H:i:s') 
    ];
    $ci->db->insert('tbl_statement', $data); 
    return $ci->db->last_query();
    }
    
}

function direct_admin_profit_statement($source,$admin_commission,$source_id=0) 
{
    $ci =& get_instance(); 
    $ci->load->model(['Setting_model']);

    $setting = $ci->Setting_model->Setting();
    $ci->Setting_model->updateAdminCoin($admin_commission);
    $admin_current_wallet=$setting->admin_coin+$admin_commission;
    $data = [
        'source' => $source,
        'source_id' => $source_id,
        'admin_coin' => $admin_current_wallet,
        'admin_commission' => $admin_commission,
        'added_date' => date('Y-m-d H:i:s') 
    ];
    $ci->db->insert('tbl_direct_admin_profit_statement', $data);
    return $ci->db->last_query();
    
}

function depositBonus($coins,$order_id,$user_id,$referral_id,$source,$count){

    $ci =& get_instance(); 
    $bonus_data=$ci->DepositBonus_model->getBonusCoin($coins,$count);
    if(!empty($bonus_data)){
        $upline_bonus=$bonus_data->upline_bonus;
        $self_bonus=$bonus_data->self_bonus;
        $admin_coin_deduction=$upline_bonus+$self_bonus;
        $ci->Users_model->UpdateWalletOrder($upline_bonus, $referral_id,1);
        $ci->Users_model->UpdateWalletOrder($self_bonus, $user_id,1);
        log_statement ($user_id,$source,$self_bonus,0,0);
        if(!empty($referral_id)){
            log_statement ($referral_id,$source,$upline_bonus,0,0);
        }
        direct_admin_profit_statement($source,-$admin_coin_deduction,0);
    
        $upline_log_data = [
            'user_id' => $referral_id,
            'purchase_id' => $order_id,
            'purchase_user_id' => $user_id,
            'coin' => $upline_bonus,
            'purchase_amount' => $coins,
            'level' =>1,
        ];
        $ci->Users_model->AddPurchaseReferLog($upline_log_data);
        $self_log_data = [
            'user_id' => $user_id,
            'purchase_id' => $order_id,
            'purchase_user_id' => $user_id,
            'coin' => $self_bonus,
            'purchase_amount' => $coins,
            'level' =>0,
        ];
        $ci->Users_model->AddPurchaseReferLog($self_log_data);
    }
   
   }
