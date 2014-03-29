<?php
/**
 * A _very_ Rudimentary MVC system to tide us over until we put a framework in place
 *
 * @author Darren Miller <darren@dmlogic.com>
 */
class Meteor {

	public static $segments = array();

	// -----------------------------------------------------------------

	private static $output = '';

	// -----------------------------------------------------------------

	/**
	 * impact()
	 *
	 * Everything starts here
	 */
	public static function impact() {

		// remaining defines
		define('EXT','.php');
		define('INCLUDES',BASE_PATH.'includes/');
		define('CONTROLLERS',BASE_PATH.'controllers/');
		define('VIEWS',BASE_PATH.'views/');

		// get config
		require_once(INCLUDES.'config'.EXT);

		// establish uri segments
		self::parse_uri();

		// go
		self::route_request();

		// send any output
		if(self::$output !== '') {
			self::render_output();
		}

	}

	// -----------------------------------------------------------------

	/**
	 * parse_uri()
	 *
	 * If we don't have a base URL set in our config,
	 * this function will figure it out
	 */
	private static function parse_uri() {

		// split the REQUEST_URI in case we've not removed the index php file
		$str = explode('.php',$_SERVER['REQUEST_URI']);

		// grab the tail end, this is the data we want
		$uri = end($str);

		// lose any surrounding slashes
		$uri = trim($uri,'/');

		// and what's left is our segments
		self::$segments = explode('/',$uri);
	}

	// -----------------------------------------------------------------

	/**
	 * route_request()
	 *
	 * Establish the required controller & method
	 * based on URL segments and then run them
	 */
	private static function route_request() {

		// load required controller
		if(!empty(self::$segments[0])) {

			if(file_exists(CONTROLLERS.self::$segments[0].EXT)) {
				$controller = self::$segments[0];
			} else {
				self::show_404();
			}

		} else {
			$controller = Config::$default_controller;
		}

		require_once(CONTROLLERS.$controller.EXT);
		$CON = new $controller;

		// check for requested method
		if(isset(self::$segments[1]) && !empty(self::$segments[1])) {

			if(method_exists($CON,self::$segments[1])) {
				$method = self::$segments[1];
			} else {
				self::show_404();
			}

		} else {
			$method = Config::$default_method;
		}

		// run the selected controller/method
		$CON->$method();
	}

	// -----------------------------------------------------------------

	/**
	 * view()
	 *
	 * Load a view file
	 *
	 * @param string $viewfile
	 * @param array $data
	 * @return string
	 */
	public static function view($viewfile, $data = array()) {

		if(!is_array($data)) {
			$data = array();
		}

		// start to buffer
		ob_start();

		// convert array to vars
		extract($data);

		// open the view file
		include(VIEWS.$viewfile.EXT);

		// get the output
		$buffer = ob_get_contents();

		// clear the buffer
		ob_end_clean();

		// and return
		return $buffer;
	}

	// -----------------------------------------------------------------

	/**
	 * set_output
	 *
	 * Setter for $output
	 *
	 * @param string $str
	 */
	public static function set_output($str = '') {

		self::$output = $str;
	}

	// -----------------------------------------------------------------

	/**
	 * add_output
	 *
	 * Append to $output
	 *
	 * @param string $str
	 */
	public static function add_output($str = '') {

		self::$output .= $str;
	}

	// -----------------------------------------------------------------

	/**
	 * render_output()
	 *
	 * Sends all output to the browser and exits
	 *
	 */
	public static function render_output() {

		echo self::$output;
		exit;
	}

	// -----------------------------------------------------------------

	/**
	 * show_404()
	 *
	 * Display a 404 page with appropriate header
	 */
	public static function show_404() {

		header("HTTP/1.0 404 Not Found");

		self::set_output( self::view('404') );
		self::render_output();
	}
}
?>