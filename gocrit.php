<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("green","[]          PONDOK DOGAN                \n");
echo color("red","[]       Team Getah Basah             \n");
echo color("green","[]  Time  : ".date('[d-m-Y] [H:i:s]')."   \n");
echo color("yellow","[]         waiting proses.....           \n");
echo color("yellow","[] tulis nomor yang bener jok 62xxxxxxxxxx \n");
function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo color("nevy","(•) Nomor Jando : ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("green","+] Kode otp lah dikirim")."\n";
        otp:
        echo color("nevy","?] Isi Otp: ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("green","+] Akorrr ! Akun terdaftar.");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo "\n".color("nevy","?] Galak voucher dak?: y/n ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
        echo color("red","===========(VOUCHER RECEH)===========");
        echo "\n".color("yellow","!] Ambek voc GOFOODYUK");
        echo "\n".color("yellow","!] Tunggu ! Sabar Nang.");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(1);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"GOFOODYUK"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Rejeki kau nang, Voucher Masookkk !')){
        echo "\n".color("green","+] Message: ".$message);
        goto goride;
        }else{
        echo "\n".color("red","-] Message: ".$message);
        echo "\n".color("yellow","!] Ambek voc PAKEGOFOOD");
        echo "\n".color("yellow","!] Tunggu ! Sabar Nang.");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(1);
        }
        sleep(3);
        $boba19 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PAKEGOFOOD"}');
        $messageboba19 = fetch_value($boba19,'"message":"','"');
        if(strpos($boba19, 'Rejeki kau nang, Voucher Masookkk !')){
        echo "\n".color("green","+] Message: ".$messageboba19);
        goto goride;
        }else{
        echo "\n".color("red","-] Message: ".$messageboba19);
        echo "\n".color("yellow","!] Ambek voc PESENGOFOOD");
        echo "\n".color("yellow","!] Tunggu ! Sabar Nang.");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(1);
        }
        sleep(3);
        $boba11 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESENGOFOOD"}');
        $messageboba11 = fetch_value($boba11,'"message":"','"');
        if(strpos($boba11, 'Rejeki kau nang, Voucher Masookkk !')){
        echo "\n".color("green","+] Message: ".$messageboba11);
        goto goride;
        }else{
        echo "\n".color("red","-] Message: ".$messageboba11);
        goride:
        echo "\n".color("yellow","!] Ambek voc PAKEGOJEK20");
        echo "\n".color("yellow","!] Tunggu ! Sabar Nang.");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(1);
        }
        sleep(3);
        $goride = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PAKEGOJEK20"}');
        $message1 = fetch_value($goride,'"message":"','"');
        echo "\n".color("blue","-] Message: ".$message1);
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
         setpin:
         echo "\n".color("nevy","?] Nak set pin dak?: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("red","========( PIN KAU = 123654 )========")."\n";
         $data2 = '{"pin":"787878"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "Otp set pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-] GAGAL!!!\n");
         }
         }
         }
         }
         }else{
         goto setpin;
         }
         }else{
         echo color("red","-] Salah OTP kau nang hahaha");
         echo"\n==================================\n\n";
         echo color("yellow","!] Cubo kau cek lagi !\n");
         goto otp;
         }
         }else{
         echo color("red","Nomor lah tedaftar, Payo Berijo Beli oh !!!");
         echo "\nNak Ngulang dak? (y/n): ";
         $pilih = trim(fgets(STDIN));
         if($pilih == "y" || $pilih == "Y"){
         echo "\n==============Daftar==============\n";
         goto ulang;
         }else{
         echo "\n==============Daftar==============\n";
         goto ulang;
  }
 }
}
echo change()."\n"; ?>