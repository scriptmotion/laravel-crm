<?php

/**
 * Anbu, the light weight profiler for Laravel.
 *
 * @author Dayle Rees <me@daylerees.com>
 * @copyright 2012 Dayle Rees <me@daylerees.com>
 * @license MIT License <http://www.opensource.org/licenses/mit>
 */
class Anbu {
	
	/**
	 * A list of attributes to watch.
	 *
	 * @var array
	 */
	private static $_watchlist = array();

	/**
	 * Contains the logs written by Laravel.
	 *
	 * @var array
	 */
	private static $_loglist = array();

	/**
	 * A list of SQL queries exectued.
	 *
	 * @var array
	 */
	private static $_sqllist = array();

	/**
	 * Show full resources instead of minified ones.
	 *
	 * @var bool
	 */
	private static $_debug = false;

	/**
	 * Render Anbu, assign view params and echo out the main view.
	 *
	 * @return void
	 */
	public static function render()
	{
		$run_time = (microtime(true) - LARAVEL_START);
		if(defined('LARAVEL_MEMORY'))
		{
			$memory   = (memory_get_peak_usage() - LARAVEL_MEMORY);
		}
		else
		{
			$memory   = memory_get_peak_usage();
		}
		$files    = get_included_files();

		$res = array('data' => array(), 'total' => array('size' => 0, 'lines' => 0, 'count' => 0));
		foreach ($files as $file)
		{
		    $size  = filesize($file);
		    $lines = substr_count(file_get_contents($file), "\n");
		    $res['total']['size']  += $size;
		    $res['total']['lines'] += $lines;
		    $res['total']['count']++;
		    $res['data'][] = array(
				'name'  => $file,
				'size'  => $size,
				'lines' => $lines,
				'last' 	=> filemtime($file),
		   	);
		}

		$data = array(
			'watch'      => static::$_watchlist,
			'log'        => static::$_loglist,
			'sql'        => static::$_sqllist,
			'memory'     => number_format($memory / 1024, 2).' kB',
			'runtime'    => number_format($run_time, 4).' s',
			'files'		 => $res,
			'css'        => File::get(Bundle::path('anbu').'public/css/style.min.css'),
			'js'         => File::get(Bundle::path('anbu').'public/js/script.min.js'),
			'include_jq' => Config::get('anbu::display.include_jquery')
		);

		echo View::make('anbu::main', $data)->render();
	}

	/**
	 * Watch an object to show within Anbu
	 *
	 * @param string A friendly name for the object.
	 * @param mixed The object itself.
	 * @return void
	 */
	public static function watch($name, $object)
	{
		// pass the actual object in
		static::$_watchlist[$name] = $object;
	}

	/**
	 * Watch an object to show within Anbu, but keep
	 * watching its value after changes.
	 * (pass by reference)
	 *
	 * @param string A friendly name for the object.
	 * @param mixed The object itself.
	 * @return void
	 */
	public static function spy($name, &$object)
	{
		// pass the actual object in
		static::$_watchlist[$name] =& $object;
	}

	/**
	 * Get included files and detailled information.
	 *
	 * @return void
	 */
	public static function log($type, $message)
	{
		static::$_loglist[] = array($type, $message);
	}

	/**
	 * Add a performed SQL query to Anbu.
	 *
	 * @param string the SQL query performed.
	 * @param array The bindings for the query.
	 * @param float The time taken to run the query.
	 * @return void
	 */
	public static function sql($sql, $bindings, $time)
	{
		// Use preg_replace() and limit it to replace only one matched
		// binding at a time.
		foreach ($bindings as $b)
		{
			$sql = preg_replace('/\?/', "'".$b."'", $sql, 1);
		}

		static::$_sqllist[] = array($sql, $time);
	}
}
