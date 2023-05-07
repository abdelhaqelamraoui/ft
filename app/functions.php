
<?php

	require_once('app.php');

	const LOGIN_STATUS = 'logged_in';
	
	/**
	 * Loads a view to the layout
	 */
	function load_view(string $view_name, $model = []) {
		include('views/layout.view.php');
	}

	
	/**
	 * echo a value in preformatted style (for debugging)
	 */
	function output($value) : void {
		echo '<pre>';
		print_r($value);
		echo '</pre>';
	}
	
	/**
	 * shows a message in a javascrip alert
	 */
	function alert($msg, $arr=false) : void {
		if(!$arr)
			echo "<script>alert('$msg')</script>";
		else {
			$str = '';
			foreach($msg as $k=>$v)
				$str .= "$k:$v\n";
			echo "<script>alert('$str')</script>";
		}
	}
	
	/**
	 * returns a array of all files' names in the uploads folder
	 */
	function get_uploaded_filenames() : array {
		return array_diff(scandir(CONFIG['uploads_path']), ['.', '..']);
	}
	
	/**
	 * creating the uploads and archive directories if they do not exist
	 */
	function init() {
		if(!file_exists(CONFIG['uploads_path']))
			mkdir(CONFIG['uploads_path']);
		if(!file_exists(CONFIG['archive_path']))
			mkdir(CONFIG['archive_path']);
	}
	
	
	/**
	 * sends a raw HTTP header to change location
	 * @param  mixed $url
	 */
	function redirect(string $url) : void {
		header("Location: $url");
		die();
	}

	function is_post() {
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}

	function is_get() {
		return $_SERVER['REQUEST_METHOD'] === 'GET';
	}

	function is_admin_authenticated() : bool {
		start_admin_session();
		return isset($_SESSION['status']);
	}
	
	/**
	 * ensure the admin in logged in, else back to login page
	 */
	function ensure_admin_authenticated() {
		if(!is_admin_authenticated()) {
			redirect('login.php');
		}
	}

	function protect_script() {
		start_admin_session();
		if(is_admin_authenticated()) {
			redirect('admin.php');
		} else {
			redirect('login.php');
		}
	}

	
	/**
	 * returns true for the right username, else, returns false
	 */
	function login_admin(string $username) : bool {
    if($username !== CONFIG['username'])
			return false;
    $_SESSION['status'] = LOGIN_STATUS;
		$_SESSION['last_login'] = get_admin_last_login();
		set_admin_last_login();
		return true; 
	}
	
	/**
	 * destroys the current session if exists and switches to login page
	 */
	function logout_admin() {
		// if(session_status() === PHP_SESSION_ACTIVE) {
			session_unset();
			session_destroy();
			redirect('login.php');
		// }
	}

	
	/**
	 * trims a value and sanitizes special chars
	 */
	function sanitize(string $value) : string | bool {
		return  filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
	}

	
	/**
	 * returns the last login date and time if exist (cookie),
	 * else return 'now'
	 */
	function get_admin_last_login() : string {
		return $_COOKIE['last_login'] ?? 'now';
	}
	
	/**
	 * sets a cookie with the last login date and time
	 * @return bool  succeeded or not
	 */
	function set_admin_last_login() : bool {
		$name = 'last_login';
    $value = date("d/m/Y h:i:s a");
    $expire = strtotime('next year');
    $path = '/';
    $domain = $_SERVER['SERVER_NAME'];
    return setcookie($name, $value, $expire, $path, $domain);
	}

	function start_admin_session() : bool {
		if(session_status() === PHP_SESSION_NONE)
			return session_start();
		return false;
	}
	
	/**
	 * upload_file
	 *
	 * @param  mixed $file file element of $_FILES
	 * @return bool succeded or not
	 */
	function upload_file(array $file) : bool {
		$filename = sanitize($file['name']); 
		if(empty($filename)) return false;
		$file_tmp_name = $file['tmp_name'];
		$filename_target = CONFIG['uploads_path'].'/'.$filename;
		if(move_uploaded_file($file_tmp_name, $filename_target)) {
			return write_filename_to_log($filename);
		}
		return false;
	}
	
	/**
	 * upload_multiple_files
	 * @param  array $files array of files (elemnt of $_FILES in case of
	 * uploading multiple files)
	 * @return bool all succeded or one at least has failed
	 */
	function upload_multiple_files(array $files) : bool {
		$b = true;
		$total = count($files['name']) ?? 0;
		for ($i = 0; $i < $total; $i++) { 
			$file = [];
			foreach($files as $property => $arr) {
				$file[$property] = $arr[$i];
			}
			if(!upload_file($file))
				$b = false;
			
		}
		return $b;
	}
	
	/**
	 * uploads all files (sigles or multiple) selected through input fields
	 *
	 * @param  mixed $_files the $_FILES array
	 * @return bool
	 */
	function upload_all_multiple_file(array $_files) : bool {
		$b = true;
		foreach($_files as $name => $files) {
			if(!upload_multiple_files($files))
				$b = false;
		}
		return $b;
	}
	
	/**
	 * write_filename_to_log
	 *
	 * @param  mixed $filename
	 * @return bool
	 */
	function write_filename_to_log($filename) : bool{
		$log = date('Y-m-i').",".date('H:i:s').",".$filename."\n";
		return file_put_contents(CONFIG['log_file'], $log) !== false;
	}
	
	/**
	 * archive_all_uploads
	 *
	 * @return bool
	 */
	function archive_all_uploads() : bool {
		$cmd = 'mv -f ' . CONFIG['uploads_path'] .'/* ' . CONFIG['archive_path'];
		return system($cmd) !== false;
	}


?>		