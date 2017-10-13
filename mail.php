<?php header("Content-Type:text/html;charset=utf-8"); ?>
<?php
if (version_compare(PHP_VERSION, '5.1.0', '>=')) {
	date_default_timezone_set('Asia/Tokyo');
}
mb_language("japanese"); // メール送信の際のおまじない
    mb_internal_encoding("UTF-8"); // メール送信の際のおまじない
		$mail_body = "";

		if (isset($_REQUEST["subject"])) {
        $mail_body .= "[評判]\n";
        $mail_body .= "{$_REQUEST["subject"]}\n";
    }
		if (isset($_REQUEST["number"])) {
        $mail_body .= "[電話番号]\n";
        $mail_body .= "{$_REQUEST["number"]}\n";
    }
    if (isset($_REQUEST["name"])) {
        $mail_body .= "[お名前]\n";
        $mail_body .= "{$_REQUEST["name"]}\n";
    }
    if (isset($_REQUEST["email"])) {
        $mail_body .= "[メールアドレス]\n";
        $mail_body .= "{$_REQUEST["email"]}\n";
    }
    if (isset($_REQUEST["message"])) {
        $mail_body .= "[ご意見・ご感想]\n";
        $mail_body .= "{$_REQUEST["message"]}\n";
    }
$site_top = "htttp://web.sfc.keio.ac.jp/~t17868yl/info1/index.html";
$to="yuting0624@keio.jp, linyuting.jerry@hotmail.com";
$Email="Email";
$Referer_check=0;

$userMail=1;
$subject="サイトについてのご意見";
$admin_email="yuting0624@keio.jp";
$add_header="From:" . $admin_email;
$result=mb_send_mail($admin_email, $subject, $mail_body, $add_header);
$page_message="メールが送信されました。ご意見ありがとうございました。3秒後にホームページに戻ります。";


$confirmDsp=1;
$jumpPage=1;
echo $page_message;
?>
<script>
mnt=3;
url="index.html";
function jumpPage(){
	location.href=url;
}
setTimeout("jumpPage()",mnt*1000)
</script>
