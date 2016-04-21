<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function common_check_upload_input($CI) {
	$fn = NULL;
	$headers = $CI->input->request_headers(TRUE);
	if (isset($headers)) {
		$keys = array('X_FILENAME', 'X-FILENAME'); // IIS 会将头部改成第二个
		foreach ($headers as $key => $value) {
			if (array_search(strtoupper($key), $keys) !== FALSE) {
				$fn = $value;
				break;
			}
		}
	}
	// $fn = $CI->input->get_request_header('X_FILENAME', TRUE);
	if (!$fn) {
		return common_result(404, '请选择上传的文件');
	}

	$validFormats = array('jpg', 'gif', 'png', 'jpeg');
	$ext = pathinfo($fn, PATHINFO_EXTENSION);
	if (!isset($ext)) {
		return common_result(500, '文件格式不支持: '.$ext);
	}
	$ext = strtolower($ext);
	if (!in_array($ext, $validFormats)) {
		return common_result(500, '文件格式不支持: '.$ext);
	}
	unset($validFormats);
	return common_result_ok($ext);
}

// =======================================
// 上传头像
function generate_content_path($CI) {
    $CI->load->helper('string');
	$salt = random_string('alnum', 5);
	return 'uploads/caseimg/' . date('YmdHis', time()).'-'.$salt .'/';
}

function case_mkdir($tempFileAbsPath) {
    if (!file_exists($tempFileAbsPath)) {
		mkdir($tempFileAbsPath, 0755, true);
	}
}

function save_subs($CI, $content_path, $index) {
	$check_result = common_check_upload_input($CI); // 获取扩展名
	if (!is_ok_result($check_result)) { return $check_result; }

	$ext = $check_result['data'];
    
	$tempFileName = $index.'.'.$ext;
	$tempFilePath = $content_path . 'subs/';
	$tempFileAbsPath = FCPATH . $tempFilePath;
	case_mkdir($tempFileAbsPath);
	if (!file_exists($tempFileAbsPath)) {
	    return common_result(500, '无法创建文件');
	}
    file_put_contents(
        $tempFileAbsPath . $tempFileName,
        file_get_contents('php://input')
    );
    return common_result_ok($tempFileName);
}

function save_preview($CI, $content_path, $name = 'preview') {
    $check_result = common_check_upload_input($CI); // 获取扩展名
	if (!is_ok_result($check_result)) { return $check_result; }

	$ext = $check_result['data'];
    
	$tempFileName = $name.'.'.$ext;
	$tempFilePath = $content_path;
	$tempFileAbsPath = FCPATH . $tempFilePath;
	case_mkdir($tempFileAbsPath);
	if (!file_exists($tempFileAbsPath)) {
	    return common_result(500, '无法创建文件');
	}
    file_put_contents(
        $tempFileAbsPath . $tempFileName,
        file_get_contents('php://input')
    );
    return common_result_ok($tempFileName);
}

function save_content($CI, $content_path, $case_subs_list) {
    $tempFileName = 'content.html';
    $tempFilePath = $content_path;
    $tempFileAbsPath = FCPATH . $tempFilePath;
    case_mkdir($tempFileAbsPath);
	if (!file_exists($tempFileAbsPath)) {
	    return common_result(500, '无法创建文件');
	}
	$content = '';
	foreach($case_subs_list as $case_subs) {
	    $content .= '<img class="content-img" src="' . $content_path . 'subs/' . $case_subs . '" />';
	    $content .= "\n";
	    $content .= '<br/>';
	    $content .= "\n";
	}
	file_put_contents(
        $tempFileAbsPath . $tempFileName,
        $content
    );
    return common_result_ok($tempFileName);
}

function save_success_flag($CI, $content_path) {
    $tempFileName = 'data.json';
    $tempFilePath = $content_path;
    $tempFileAbsPath = FCPATH . $tempFilePath;
    case_mkdir($tempFileAbsPath);
    if (!file_exists($tempFileAbsPath)) {
	    return common_result(500, '无法创建文件');
	}
	file_put_contents(
        $tempFileAbsPath . $tempFileName,
        ''
    );
    return common_result_ok($tempFileName);
}

function del_case_content_path($CI, $content_path) {
    if (empty($content_path) || strpos($content_path, 'uploads') === FALSE) {
        return FALSE;
    }
    return del_dir(FCPATH . $content_path);
}

// function delete_house_image($CI, $file) {
// 	if (isset($file) && !empty($file)) {
// 		$fileAbsPath = FCPATH . $file;
// 		if (file_exists($fileAbsPath)) {
// 			@unlink($fileAbsPath);
// 		}
// 	}
// }

// function delete_old_house_image($CI, $old_house_image, $new_house_image) {
// 	if (isset($old_house_image) && !empty($old_house_image)
// 		&& isset($new_house_image) && !empty($new_house_image)) {
// 		if ($old_house_image != $new_house_image) {
// 			delete_avatar($CI, $old_house_image);
// 		}
// 	}
// }
