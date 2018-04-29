<?php

function sendmadil($data) {
	require_once(FCPATH . 'assets/phpmailer/class-phpmailer.php');
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Username = SMTP_USER;
	$mail->Password = SMTP_PASS;
	$mail->SMTPSecure = 'STARTTLS';
	$mail->SMTPAutoTLS = true;
	$mail->Host = SMTP_HOST;
	$mail->Port = SMTP_PORT;
	$from_email = isset($data['from']) ? $data['from'] : SMTP_EMAIL;
	$from_name = isset($data['from_name']) ? $data['from_name'] : SMTP_NAME;
	$mail->SetFrom($from_email, $from_name);
	$mail->isHTML(true);
	$mail->Subject = $data['subject'];
	$mail->MsgHTML($data['message']);
	$mail->AddAddress($data['to']);
	$mail->SMTPDebug = 0;

	/* Send mail and return result */
	if (!$mail->Send()) {
		$errors = $mail->ErrorInfo;
		return false;
	} else {
		$mail->ClearAddresses();
		$mail->ClearAllRecipients();
		return true;
	}
}

function get_title($title, $trailing = true) {
	if ($trailing)
		$title .= ' - ' . SITE_NAME;
	return $title;
}

function user_logged_in($redirect = '') {
	if (get_session('logged_in') == 1) {
		if (!empty($redirect))
			redirect($redirect);
		return true;
	} else {
		return false;
	}
}

function client_logged_in($redirect = '') {
	if (get_session('user_logged_in') == 1) {
		if (!empty($redirect))
			redirect($redirect);
		return true;
	} else {
		return false;
	}
}

function can_access($shipper = '', $transporter = '') {
	$CI = & get_instance();
	$users = array($shipper, $transporter);

	if (user_logged_in()) {
		if (in_array(get_session('user_type'), $users)) {
			// go ahead
		} else {
			redirect('404');
		}
	} else {
		redirect('login?redirect=' . current_url());
	}
}

function only_for($shipper = '', $transporter = '') {
	$users = array($shipper, $transporter);
	$users = array_filter($users);

	if (user_logged_in()) {
		if (in_array(get_session('user_type'), $users)) {
			return true;
		}
		return false;
	} else {
		redirect('login');
	}
}

function load_view($view, $data = NULL) {
	$CI = & get_instance();
	$CI->load->view($view, $data);
}

function compare_datetime($a, $b) {
	$ad = strtotime($a['exact_date']);
	$bd = strtotime($b['exact_date']);
	if ($ad == $bd) {
		return 0;
	}
	return $ad > $bd ? 1 : -1;
}

// converts a image path into image source
function create_image_from($image) {
	$type = pathinfo($image['name'], PATHINFO_EXTENSION);
	if ($type == "jpeg" || $type == "jpg") {
		return imagecreatefromjpeg($image['tmp_name']);
	} else if ($type == "png") {
		return imagecreatefrompng($image['tmp_name']);
	}
}

function get_extention($file) {
	return pathinfo($file['name'], PATHINFO_EXTENSION);
}

function i_encode($url) {
	$CI = & get_instance();
	$uri = $CI->encryption->encrypt($url);
	$pattern = '"/"';
	$new_uri = preg_replace($pattern, '_', $uri);
	return $new_uri;
}

function i_decode($url) {
	$CI = & get_instance();
	$pattern = '"_"';
	$uri = preg_replace($pattern, '/', $url);
	$new_uri = $CI->encryption->decrypt($uri);
	return $new_uri;
}

function custom_encode($string) {
	$key = "cYbErClINicAdItYa";
	$string = base64_encode($string);
	$string = str_replace('=', '', $string);
	$main_arr = str_split($string);
	$output = array();
	$count = 0;
	for ($i = 0; $i < strlen($string); $i++) {
		$output[] = $main_arr[$i];
		if ($i % 2 == 1) {
			$output[] = substr($key, $count, 1);
			$count++;
		}
	}
	$string = implode('', $output);
	return $string;
}

function custom_decode($string) {
	$key = "cYbErClINicAdItYa";
	$arr = str_split($string);
	$count = 0;
	for ($i = 0; $i < strlen($string); $i++) {
		if ($count < strlen($key)) {
			if ($i % 3 == 2) {
				unset($arr[$i]);
				$count++;
			}
		}
	}
	$string = implode('', $arr);
	$string = base64_decode($string);
	return $string;
}

function get_array_key($value, $array) {
	while ($single = current($array)) {
		if ($single == $value) {
			return key($array);
		}
		next($array);
	}
}

function unmask_mobile($mobile){
	$mobile = str_replace('(', '', $mobile);
	$mobile = str_replace(')', '', $mobile);
	$mobile = str_replace('-', '', $mobile);
	$mobile = str_replace('-', '', $mobile);
	$mobile = str_replace(' ', '', $mobile);
	return $mobile;
}

function superadmin_in_clientarea() {
	$CI = & get_instance();
	if ($CI->session->userdata('last_login_id') != '') {
		return true;
	}
	return false;
}

function set_session($name, $value) {
	$CI = & get_instance();
	$CI->session->set_userdata($name, $value);
}

function set_sessions($values) {
	$CI = & get_instance();
	$CI->session->set_userdata($values);
}

function get_session($name = '') {
	$CI = & get_instance();
	if (!empty($name)) {
		return $CI->session->userdata($name);
	}
	return $CI->session->userdata();
}

function unset_session($name) {
	$CI = & get_instance();
	$CI->session->unset_userdata($name);
}

function getFriendlyURL($string) {
	setlocale(LC_CTYPE, 'en_US.UTF8');
	$string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);
	$patterns = array("/\s+/", "~[^\-\pL\pN\s]+~u");
	$replacer = array("-","$1");
	$string = preg_replace( $patterns, $replacer, $string );
	$string = trim($string, "-");
	$string = strtolower($string);
	return $string;
}

function json_readable_encode($in, $indent = 0, $from_array = false)
{
	$_myself = __FUNCTION__;
	$_escape = function ($str)
	{
		return preg_replace("!([\b\t\n\r\f\"\\'])!", "\\\\\\1", $str);
	};

	$out = '';

	foreach ($in as $key=>$value)
	{
		$out .= str_repeat("\t", $indent + 1);
		$out .= "\"".$_escape((string)$key)."\": ";

		if (is_object($value) || is_array($value))
		{
			$out .= "\n";
			$out .= $_myself($value, $indent + 1);
		}
		elseif (is_bool($value))
		{
			$out .= $value ? 'true' : 'false';
		}
		elseif (is_null($value))
		{
			$out .= 'null';
		}
		elseif (is_string($value))
		{
			$out .= "\"" . $_escape($value) ."\"";
		}
		else
		{
			$out .= $value;
		}

		$out .= ",\n";
	}

	if (!empty($out))
	{
		$out = substr($out, 0, -2);
	}

	$out = str_repeat("\t", $indent) . "{\n" . $out;
	$out .= "\n" . str_repeat("\t", $indent) . "}";

	return $out;
}

// include scripts and css
function inclusions($values = array()) {
	$options = array(
		'wow' => array(
			array(
				'type' => 'css',
				'value' => 'assets/backend/css/wow.min'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/js/wow.min'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/js/wow_init'
			)
		),
		'validate' => array(
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/js/validator',
			),
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/js/validator-methods',
			),
		),
		'ajax_form' => array(
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/js/jquery.form'
			),
		),
		'notification' => array(
			array(
				'type' => 'js',
				'value' => 'assets/backend/js/jquery.notification'
			),
			array(
				'type' => 'css',
				'value' => 'assets/backend/css/notification'
			),
		),
		'check_email_url' => array(
			array(
				'type' => 'php_scripts',
				'value' => 'assets/backend/php_scripts/check_email_url.php'
			)
		),
		'clipboard' => array(
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/clipboard/ZeroClipboard'
			),
			array(
				'type' => 'php_scripts',
				'value' => 'assets/backend/clipboard/ZeroClipboard.php'
			)
		),
		'dropdown' => array(
			array(
				'type' => 'css',
				'value' => 'assets/backend/select2/select2.min'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/select2/select2.full.min'
			)
		),
		'twilio' => array(
            array(
                'type' => 'header_js',
                'value' => 'assets/backend/twilio-video.js/src/twilio-video'
            )
        ),
		'input_mask' => array(
			array(
				'type' => 'js',
				'value' => 'assets/backend/input-mask/jquery.inputmask'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/input-mask/jquery.inputmask.date.extensions'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/input-mask/jquery.inputmask.extensions'
			)
		),
		'daterangepicker' => array(
			array(
				'type' => 'css',
				'value' => 'assets/backend/daterangepicker/daterangepicker'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/datepicker/moment.min'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/daterangepicker/daterangepicker'
			)
		),
		'ga_jsapi' => array(
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/js/ga_jsapi'
			)
		),
		'jquery-ui' => array(
			array(
				'type' => 'js',
				'value' => 'assets/backend/jQueryUI/jquery-ui.min'
			),
			array(
				'type' => 'css',
				'value' => 'assets/backend/jQueryUI/jquery-ui.min'
			),
		),
		'fileupload' => array(
			array(
				'type' => 'js',
				'value' => 'assets/backend/js/jquery.fileupload'
			),
		),
		'imagecrop' => array(
			array(
				'type' => 'css',
				'value' => 'assets/backend/crop/imgareaselect-animated'
			),
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/crop/jquery.imgareaselect.pack'
			)
		),
		'jquery-browser' => array(
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/js/jquery-browser'
			)
		),
		
		'jscolor' => array(
			array(
				'type' => 'js',
				'value' => 'assets/backend/js/jscolor'
			)
		),
		'tabs' => array(
			array(
				'type' => 'js',
				'value' => 'assets/backend/js/responsive-tabs'
			)
		),
		'last_tab' => array(
			array(
				'type' => 'js',
				'value' => 'assets/backend/js/jquery-cookie.min'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/js/last_tab'
			)
		),
		'fancybox' => array(
			array(
				'type' => 'js',
				'value' => 'assets/backend/fancybox/jquery.fancybox'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/js/jquery-browser'
			),
			array(
				'type' => 'css',
				'value' => 'assets/backend/fancybox/jquery.fancybox'
			),
		),
		'media' => array(
			array(
				'type' => 'js',
				'value' => 'assets/backend/media/media'
			),
			array(
				'type' => 'css',
				'value' => 'assets/backend/media/media'
			),
		),
		'iCheck' => array(
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/iCheck/icheck.min'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/iCheck/icheck'
			),
			array(
				'type' => 'css',
				'value' => 'assets/backend/iCheck/all'
			),
		),
		'googlemap' => array(
			array(
				'type' => 'header_js',
				'value' => '//maps.googleapis.com/maps/api/js?signed_in=false&v=3.exp&libraries=geometry&libraries=places&key=AIzaSyByQPehTQPMAy3osZK0EwS6DBbv2CXAR98'
			),
		),
		'datatable' => array(
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/datatables/jquery.dataTables.min'
			),
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/datatables/dataTables.bootstrap.min'
			),
			array(
				'type' => 'css',
				'value' => 'assets/backend/datatables/dataTables.bootstrap'
			),
		),
		'datepicker' => array(
			array(
				'type' => 'css',
				'value' => 'assets/backend/datepicker/datetimepicker.min'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/datepicker/moment.min'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/datepicker/datetimepicker.min'
			)
		),
		'calendar' => array(
			array(
				'type' => 'css',
				'value' => 'assets/backend/fullcalendar/fullcalendar.min'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/fullcalendar/moments'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/fullcalendar/fullcalendar.min'
			),
		),
		'videojs' => array(
			array(
				'type' => 'css',
				'value' => 'assets/backend/video/bigvideo'
			), array(
				'type' => 'js',
				'value' => 'assets/backend/video/video'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/video/bigvideo'
			),
		),
		'bgvideo' => array(
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/video/jquery.bgvideo.min'
			),
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/video/modernizr-video'
			)
		),
		'slider' => array(
			array(
				'type' => 'js',
				'value' => 'assets/backend/js/frontend/slider'
			),
			array(
				'type' => 'css',
				'value' => 'assets/backend/css/frontend/slider'
			)
		),
		'chosen' => array(
			array(
				'type' => 'css',
				'value' => 'assets/backend/chosen/chosen'
			),
			array(
				'type' => 'js',
				'value' => 'assets/backend/chosen/chosen'
			),
		),
		'bootbox' => array(
			array(
				'type' => 'header_js',
				'value' => 'assets/backend/js/bootbox.min'
			)
		)
	);

	$output['header_js'] = array(
		'assets/backend/js/jquery-3.1.1.min'
	);

	foreach ($values as $value) {
		$inputs = $options[$value];
		foreach ($inputs as $input) {
			$output[$input['type']][] = $input['value'];
		}
	}

	return $output;
}

// load content with header, left, footer
function load_frontend_page($views, $data = array()) {
	$CI = & get_instance();
	$data['inclusions'][] = 'bootbox';
	$inclusions = $data['inclusions'];
	$inclusions['css'][] = 'assets/css/bootstrap.min';
	$inclusions['css'][] = 'assets/css/font-awesome.min';
	$inclusions['css'][] = 'assets/css/media';
	$inclusions['css'][] = 'assets/css/style';
	$inclusions['css'][] = 'assets/css/dashboard';
	$inclusions['css'][] = 'assets/css/constants';
	$inclusions['header_js'][] = 'assets/js/bootstrap.min';
	$inclusions['js'][] =        'assets/js/main';
	//$inclusions['header_js'][] = 'assets/js/jquery-ui.min';
	$data['inclusions'] = array_merge($data['inclusions'], $inclusions);
	$CI->parser->parse('layouts/header', $data);

	if (!is_array($views))
		$views = array($views);
	foreach ($views as $view) {
		load_view($view);
	}

	load_view('layouts/footer');
}

function load_backend_page($views, $data = array()) {
	$CI = & get_instance();

	if (sizeof($data['inclusions']) == 0) {
		$inclusions = inclusions(array('iCheck'));
	} else {
		//$data['inclusions'] = array_merge($data['inclusions'], inclusions(array('iCheck')));
		$inclusions = $data['inclusions'];
	}

	$inclusions['css'][] = 'assets/backend/css/bootstrap.min';
	$inclusions['css'][] = 'assets/backend/css/font-awesome.min';
	$inclusions['css'][] = 'assets/backend/css/backend/skin-blue';
	$inclusions['css'][] = 'assets/backend/css/constants';
	$inclusions['css'][] = 'assets/backend/css/backend/style';
	$inclusions['css'][] = 'assets/backend/css/backend/responsive';
	$inclusions['css'][] = 'assets/backend/css/backend/responsive';


	$inclusions['header_js'][] = 'assets/backend/js/bootstrap.min';
	$inclusions['header_js'][] = 'assets/backend/js/backend/app.min';
	$inclusions['js'][] = 'assets/backend/js/bootbox.min';
	$inclusions['js'][] = 'assets/backend/js/backend/main';


	$data['inclusions'] = array_merge($data['inclusions'], $inclusions);
	$CI->parser->parse('backend/layout/header', $data);

	load_view('backend/layout/menu', $data);

	if (!is_array($views))
		$views = array($views);
	foreach ($views as $view) {
		load_view($view);
	}

	load_view('backend/layout/footer');
}


function load_htlbackend_page($views, $data = array()) {
	$CI = & get_instance();

	if (sizeof($data['inclusions']) == 0) {
		$inclusions = inclusions(array('iCheck'));
	} else {
		//$data['inclusions'] = array_merge($data['inclusions'], inclusions(array('iCheck')));
		$inclusions = $data['inclusions'];
	}

	$inclusions['css'][] = 'assets/backend/css/bootstrap.min';
	$inclusions['css'][] = 'assets/backend/css/font-awesome.min';
	$inclusions['css'][] = 'assets/backend/css/backend/skin-blue';
	$inclusions['css'][] = 'assets/backend/css/constants';
	$inclusions['css'][] = 'assets/backend/css/backend/style';
	$inclusions['css'][] = 'assets/backend/css/backend/responsive';
	$inclusions['css'][] = 'assets/backend/css/backend/responsive';


	$inclusions['header_js'][] = 'assets/backend/js/bootstrap.min';
	$inclusions['header_js'][] = 'assets/backend/js/backend/app.min';
	$inclusions['js'][] = 'assets/backend/js/bootbox.min';
	$inclusions['js'][] = 'assets/backend/js/backend/main';


	$data['inclusions'] = array_merge($data['inclusions'], $inclusions);
	$CI->parser->parse('htl/layout/header', $data);

	load_view('htl/layout/menu', $data);

	if (!is_array($views))
		$views = array($views);
	foreach ($views as $view) {
		load_view($view);
	}

	load_view('htl/layout/footer');
}


function format_datetime($datetime) {
	return date('j M, Y - h:i A', $datetime/1000);
}

function format_date($date) {
	return date('j M, Y', strtotime($date));
}

function format_time($time) {
	return date('h:i A', strtotime($time));
}

function timezone_datetime($datetime = '') {
	$timezone_datetime = new DateTime($datetime, new DateTimeZone('Asia/Kolkata'));
	return $timezone_datetime;
}

function updated_at() {
	$datetime = timezone_datetime();
	return $datetime->format('Y-m-d H:i:s');
}

function posted_ago($datetime, $full = false) {
	$now = timezone_datetime();
	
	$ago = timezone_datetime($datetime);

	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'year',
		'm' => 'month',
		'w' => 'week',
		'd' => 'day',
		'h' => 'hour',
		'i' => 'minute',
		's' => 'second',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full)
		$string = array_slice($string, 0, 1);
   return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function getTimeInBetween($longtime) {
	date_default_timezone_set('Asia/Kolkata');
	$future_date = date('Y-m-d H:i:s', $longtime / 1000);
	$next = posted_ago($future_date);
	return $next;
}

function debug($item = array(), $die = true, $display = true) {
	if (is_array($item) || is_object($item)) {
		echo "<pre " . ($display ? '' : 'style="display:none"') . ">";
		print_r($item);
		echo "</pre>";
	} else {
		echo $item;
	}

	if ($die) {
		die();
	}
}

function ci_debug() {
	$CI = & get_instance();
	$CI->output->enable_profiler(TRUE);
}

function fieldset($field = array()) {
	echo '
	<div class="fieldset">
		<input type="' . (isset($field['type']) ? $field['type'] : 'text') . '" id="' . (isset($field['id']) ? $field['id'] : $field['name']) . '" name="' . $field['name'] . '" class="field" required />
		<label for="' . (isset($field['id']) ? $field['id'] : $field['name']) . '">' . $field['label'] . '</label>
	</div>
	';
}

function sendSMS($mobile, $text) {
	$data = array(
		"APIKey" => "pLOoQ3BVuEyhv9shaVKUKA",
		"senderid" => "WEBSMS",
		"channel" => "2",
		"DCS" => "0",
		"flashsms" => "0",
		"number" => $mobile,
		"text" => urlencode($text),
		"route" => "11",
	);

	$fields = '';
	foreach ($data as $key => $value) {
		$fields .= $key . '=' . $value . '&';
	}

	$fields = rtrim($fields, '&');
	$url = 'http://login.smsgatewayhub.com/api/mt/SendSMS?' . $fields;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 2);
	curl_setopt($ch, CURLOPT_URL, $url);
	$result = curl_exec($ch);
	curl_close($ch);
}

function sendOTP($mobile) {
	$digits = "012345678901234567890123456789012345678901234567890123456789";
	$otp = substr(str_shuffle($digits), 0, 6);
	$text = "Your Activation Code for Vcanship is " . $otp . ". Please use this code to complete your signup process.";
	set_session('register_otp', $otp);
	sendSMS($mobile, $text);
}

function random_code($length = 16) {
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$code = substr(str_shuffle($chars), 0, $length);
	return $code;
}

function set_flashdata($name, $message, $class = '') {
	$CI = & get_instance();
	$data = array(
		'message' => '<div class="' . TOGGLE_CLOSE_CLASS . ' alert alert-' . $class . '"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . $message . '</div>',
		'type' => $class
	);
	$CI->session->set_flashdata($name, $data);
}

function get_flashdata($name) {
	$CI = & get_instance();
	$data = $CI->session->flashdata($name);
	return $data['message'];
}

function set_flash_session($name, $value){
	$CI = & get_instance();
	$CI->session->set_flashdata($name, $value);
}

function get_flash_session($name) {
	$CI = & get_instance();
	return $CI->session->flashdata($name);
}

function set_notification($message, $class) {
	set_flashdata('notification', $message, $class);
}

function get_notification() {
	$data = get_flashdata('notification');
	return $data;
}

function set_login_sessions($userData) {
	$data = array(
		'logged_in' => 1,
		'user_id' => $userData['id'],
		'name' => $userData['firstname'].' '.$userData['lastname'],
		'email' => $userData['email'],
		'profile_pic' => $userData['profile_pic'],
	);
	set_sessions($data);
}

function unset_login_sessions() {
	$data = array(
		'logged_in',
		'user_id',
		'name',
		'email',
		'profile_pic',
	);
	foreach ($data as $value) {
		unset_session($value);
	}
}

function set_userLogin_sessions($userData) {
	$data = array(
		'user_logged_in' => 1,
		'user_id' => $userData['id'],
		'name' => $userData['name'],
		'email' => $userData['email'],
		'profile_pic' => $userData['profile_pic'],
	);
	set_sessions($data);
}
function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function unset_userLogin_sessions() {
	$data = array(
		'user_logged_in',
		'user_id',
		'name',
		'email',
		'profile_pic',
	);
	foreach ($data as $value) {
		unset_session($value);
	}
}


function page_title($page_title) {
	echo '
		<div class="page_title">
			<h1>' . $page_title . '</h1>
		</div>
	';
}

function truncate($string, $word_count = 10) {
	$string = htmlspecialchars_decode(strip_tags($string));
	$words = explode(' ', $string);

	$output = '';
	foreach ($words as $key => $word) {
		if ($key < $word_count) {
			$output .= $word . ' ';
		}
	}

	if (sizeof($words) > $word_count) {
		return $output . '...';
	}
	return $output;
}

// =============================================
// =============================================
// ================= ADMIN PANEL ===============
// =============================================
// =============================================

function set_admin_sessions($admin) {
	$data = array(
		'admin_logged_in' => '1',
		'admin_fullname' => $admin['name'],
		'admin_id' => $admin['id'],
		'image' => $admin['pic']
	);
	set_sessions($data);
}

function unset_admin_sessions() {
	$data = array(
		'admin_logged_in',
		'admin_fullname',
		'admin_role',
		'image',
	);
	foreach ($data as $value) {
		unset_session($value);
	}
}

function admin_access() {
	if (get_session('admin_frontend_login') == 1) {
		unset_login_session();
		$data['admin_logged_in'] = '1';
		set_sessions($data);
	}
}

function check_admin_logged_in() {
	if (!admin_logged_in()) {
		redirect('admin');
	}
}

function admin_logged_in() {
	if (get_session('admin_logged_in') == "1") {
		return true;
	}
	return false;
}

function htl_logged_in() {
	if (get_session('htl_logged_in') == "1") {
		return true;
	}
	return false;
}

function get_admin($name = "") {
	$data = array(
		'fullname' => get_session('admin_fullname'),
		'role' => get_session('admin_role')
	);

	if (empty($name)) {
		return $data;
	}

	if (isset($data[$name])) {
		return $data[$name];
	}
	return false;
}

function get_youtube_link($video_id, $controls = 0) {
	return '//youtube.com/embed/' . $video_id . '?VQ=HD720&autoplay=1&controls=' . $controls . '&showinfo=0&rel=0&iv_load_policy=3';
}

function year_filter($year_from = '', $year_to = '') {
	if ($year_from == '') {
		return ' ( ' . $year_to . ' ) ';
	} else if ($year_to == '') {
		return ' ( ' . $year_from . ' ) ';
	} else if ($year_from == '' && $year_to == '') {
		return '';
	} else {
		return ' ( ' . $year_from . ' - ' . $year_to . ' ) ';
	}
}

function google_url($file) {
	return "https://docs.google.com/gview?url=" . $file . "&embedded=true";
}

function check_image_type($file, $ext = array()) {

	$type = pathinfo($file, PATHINFO_EXTENSION);

	if (empty($ext)) {
		$ext = ['jpg', 'png', 'jpeg'];
	}

	if (in_array($type, $ext)) {
		return true;
	} else {
		return false;
	}
}

function get_price_html($price) {
	return get_currency() . ' ' . number_format($price, 2);
}

function get_currency() {
	return ' <i class="fa fa-inr"></i> ';
}

function get_payment_status($type){
	if(strtoupper($type) == 'CREDIT'){
		$output = '<span class="label label-success">'.$type.'</span>';
	}else{
		$output = '<span class="label label-warning">'.$type.'</span>';
	}
	return $output;
}

function appointment_date($time) {
	$date = date('d M, Y', $time/1000);
	return $date;
}

function appointment_slot($start, $end, $date = false) {
	$start_time = date('h:i A', $start/1000);
	$end_time = date('h:i A', $end/1000);
	if($date != false){
		$response = date('d M Y', $date/1000).', '.$start_time;
	}else{
		$response = $start_time.' to '.$end_time;
	}
	return $response;
}

function json_output($json) {
	$CI = & get_instance();
	$CI->output->set_content_type('application/xml');
	$CI->output->set_output($json);
}

function profile_image($url = '') {
	if ($url == '' || empty($url)) {
		return base_url('assets/img/default_profile_picture.png');
	} else {
		return $url;
	}
}

function data_output_datatable($columns, $data) {
	$out = array();
	for ($i = 0, $ien = count($data); $i < $ien; $i++) {
		$row = array();
		for ($j = 0, $jen = count($columns); $j < $jen; $j++) {
			$column = $columns[$j];
			// Is there a formatter?
			if (isset($column['formatter'])) {
				$row[$column['dt']] = $column['formatter']($data[$i][$column['db']], $data[$i]);
			} else {
				$row[$column['dt']] = $data[$i][$columns[$j]['db']];
			}
		}
		$out[] = $row;
	}
	return $out;
}

function rating($rate = 0) {
	$output = '<span class="rating">';
	for($i=0; $i < 5; $i++) {
		$rates = ($rate > $i)?'rate':'';
		$output .= "<i class='fa fa-star pull-left ".$rates."'></i>";
	}
	$output .= '</span>';
	return $output;
}

function ajax_alert($message, $class){
	$msg = '<div class="alert alert-'.$class.' alert-dismissable">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong> Message:  </strong> '.$message.'
			</div>';
	return $msg;
}

function readNotification($id) {
	$response = getParamRecord(READ_NOTIFICATIONS, array(
		'id' => custom_decode($id)
	));

	if($response['status'] == 'success') {
		$output = array(
			'error' => false,
			'data' => '',
		);
	} else {
		$output = array(
			'error' => true,
			'data' => '',
		);
	}
	return $output;
}

function booking_status($status) {
	if($status == 'BOOKED') {
		$output = '<span class="label label-primary">Pending</span>';
	} elseif( $status == 'ACCEPTED') {
		$output = '<span class="label label-success">Accepted</span>';
	} elseif( $status == 'REJECTED') {
		$output = '<span class="label label-danger">Rejected</span>';
	} elseif( $status == 'CANCELLED' || $status == 'CANCELLED') {
		$output = '<span class="label label-warning">Cancelled</span>';
	} elseif( $status == 'COMPLETE' || $status == 'COMPLETED') {
		$output = '<span class="label label-success">Completed</span>';
	}elseif( $status == 'GENERAL' || $status == 'general') {
		$output = '<span class="label label-info">General</span>';
	}elseif( $status == 'BOOKING' || $status == 'booking') {
		$output = '<span class="label label-success">Booking</span>';
	}else {
		$output = '<span class="label label-default">'.$status.'</span>';
	}
	return $output;
}

function transaction_status($status) {
	if($status == 'COMPLETE') {
		$output = '<span class="label label-success">Completed</span>';
	} elseif( $status == 'FAILED') {
		$output = '<span class="label label-warning">Failed</span>';
	}elseif( $status == 'REFUND') {
		$output = '<span class="label label-danger">Refund</span>';
	} else {
		$output = '<span class="label label-info">'.$status.'</span>';
	}
	return $output;
}

function remove_zero($time) {
    return str_replace(':00 ', ' ', $time);
}
function split_on($string, $num) {
    $length = strlen($string);
    $output[0] = substr($string, 0, $num);
    $output[1] = substr($string, $num, $length );
    return $output;
}

function question_status($message) {
    if($message == 'ANSWERED') {
        return '<span class="text text-success">Answered</span>';
    } elseif ($message == 'PAYED') {
        return '<span class="text text-warning">In Queue</span>';
    } else {
        return '<span class="text text-info">Draft</span>';
    }
}


