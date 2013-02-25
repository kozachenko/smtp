<?php
namespace Lime;

class SMTP {
	
	/**
	 * Connection resource
	 * 
	 * @access private
	 * @var resource
	 */
	private $connection;
	
	/**
	 * Connection timeout
	 * 
	 * @access public
	 * @var int
	 */
	public $timeout = 30;
	
	/**
	 * Set if debug mode or not
	 * 
	 * @access public
	 * @var bool 
	 */
	public $debug = false;
	
	/**
	 * SMTP Host
	 * 
	 * @access public
	 * @var string
	 */
	public $host;
	
	/**
	 * Port number
	 * 
	 * @access public
	 * @var int
	 */
	public $port; 
	
	/**
	 * Username
	 * 
	 * @access public
	 * @var string
	 */
	public $username;
	
	/**
	 * Password
	 * 
	 * @access public
	 * @var string
	 */
	public $password;
	
	/**
	 * Security type
	 * none | tls | ssl
	 * 
	 * @access public
	 * @var string 
	 */
	public $secure;
	
	/**
	 * Requires authentication or not
	 *
	 * @access public
	 * @var bool
	 */
	public $auth = true;
	
	/**
	 * Charset
	 *
	 * @access public
	 * @var string
	 */
	public $charset = 'UTF-8';
	
	/**
	 * Encoding
	 *
	 * @access public
	 * @var string
	 */
	public $charset = '7bit';
	
	const CRLF = "\r\n";
	
	function __construct($host, $auth=FALSE, $username=NULL, $password=NULL, $port=25, $secure='none') {

	}
}