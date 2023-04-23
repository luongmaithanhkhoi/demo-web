
<?php 
session_start();
$type = '{
    "jpg": "image/jpeg", 
    "jpeg": "image/jpeg", 
    "png": "image/png", 
    "docx": "application/vnd.openxmlformats-officedocument.wordprocessingml.document", 
    "apk": "application/vnd.android.package-archive", 
    "csv": "text/csv", 
    "doc": "application/msword", 
    "gif": "image/gif", 
    "mp3": "audio/mpeg", 
    "mp4": "video/mp4", 
    "pdf": "application/pdf", 
    "zip": "application/x-zip-compressed", 
    "xlsx": "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
}';
if (isset($_POST['submit']) && isset($_FILES['file'])) {
	include "../db.php";
	$uer_id = '';
	// code up nhieu file
	foreach($_FILES['file']['error'] as $key =>$error) {
		if ($error === 0) {
			$file_name = $_FILES['file']['name'][$key];
			$file_size = $_FILES['file']['size'][$key];
			$file_type =  $_FILES['file']['type'][$key];
			$obj = json_decode($type);
			foreach($obj as $key1 => $value) {
				if($file_type == $value) {
					$file_type =  $key1;
				}
			}
			$tmp_name = $_FILES['file']['tmp_name'][$key];
			if ($file_size > 12500000) {
				$em = "Sorry, your file is too large.";
				header("Location: index-user.php?error=$em");
			}else {
				$img_ex = pathinfo($file_name, PATHINFO_EXTENSION);
				$img_ex_lc = strtolower($img_ex);
				$allowed_exs = array("jpg", "jpeg", "png", "docx", "apk", "csv", "doc", "gif", "mp3", "mp4", "pdf", "rar",  "zip",  "txt",  "xlsx", "xlx"); 
				if (in_array($img_ex_lc, $allowed_exs)) {
					$img_upload_path = 'uploads/'.$file_name;
					move_uploaded_file($tmp_name, $img_upload_path);
					
					$uer_id = $_SESSION['userid'];
					$sql = "INSERT INTO uploads (user_id, main_filename, file_type, file_size, created_at,  updated_at) 
							VALUES('$uer_id','$file_name',' $file_type', '$file_size', NOW(),NOW())";
					mysqli_query($conn, $sql);
					header("Location: index-user.php");
				}else {
					$em = "You can't upload files of this type";
					header("Location: index-user.php?error=$em");
				}
			}
		}else {
			$em = "Unknown error occurred!";
			header("Location: index-user.php?error=$em");
		}
	}
	// code up one file 
	// $file_name = $_FILES['file']['name'];
	// // echo $file_name;
	// $file_size = $_FILES['file']['size'];
    // $file_type =  $_FILES['file']['type'];
    // $obj = json_decode($type);
    // foreach($obj as $key => $value) {
    //     if($file_type == $value) {
    //         $file_type =  $key;
    //     }
    // }
	// $tmp_name = $_FILES['file']['tmp_name'];
	// $error = $_FILES['file']['error'];
	// if ($error === 0) {
	// 	if ($file_size > 12500000) {
	// 		$em = "Sorry, your file is too large.";
	// 	    header("Location: index-user.php?error=$em");
	// 	}else {
	// 		$img_ex = pathinfo($file_name, PATHINFO_EXTENSION);
	// 		$img_ex_lc = strtolower($img_ex);
	// 		$allowed_exs = array("jpg", "jpeg", "png", "docx", "apk", "csv", "doc", "gif", "mp3", "mp4", "pdf", "rar",  "zip",  "txt",  "xlsx", "xlx"); 
	// 		if (in_array($img_ex_lc, $allowed_exs)) {
	// 			$img_upload_path = 'uploads/'.$file_name;
	// 			move_uploaded_file($tmp_name, $img_upload_path);
    //             $uer_id = $_SESSION['userid'];
	// 			$sql = "INSERT INTO uploads (user_id, main_filename, file_type, file_size, created_at,  updated_at) 
	// 			        VALUES('$uer_id','$file_name',' $file_type', '$file_size', NOW(),NOW())";
	// 			mysqli_query($conn, $sql);
	// 			header("Location: index-user.php");
	// 		}else {
	// 			$em = "You can't upload files of this type";
	// 	        header("Location: index-user.php?error=$em");
	// 		}
	// 	}
	// }else {
	// 	$em = "Unknown error occurred!";
	// 	header("Location: index-user.php?error=$em");
	// }
}else {
	header("Location: index-user.php");
}
?>