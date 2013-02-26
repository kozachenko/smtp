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
	
	/**
	 * Debugging logs
	 * 
	 * @access private
	 * @var array
	 */
	private $logs = array();
	
	/**
	 * Error no
	 * 
	 * @access private
	 * @var int
	 */
	private $errorNo = 0;
	
	/**
	 * Error Message
	 * 
	 * @access private
	 * @var string
	 */
	private $errorMessage = '';
	
	const CRLF = "\r\n";
	
	/**
	 * Constructor function
	 * 
	 * @access	public
	 * 
	 * @param	string	$host
	 * @param	bool	$auth
	 * @param	string	$username
	 * @param	string	$password
	 * @param	int		$port
	 * @param	string	$secure		none | tls | ssl
	 */
	public function __construct($host, $auth=FALSE, $username=NULL, $password=NULL, $port=25, $secure='none')
	{
		$this->log('SMTP class initialized');
		
		$this->host 	= $host;
		$this->auth 	= $auth;
		$this->username	= $username;
		$this->password	= $password;
		$this->port		= $port;
		$this->secure	= $secure; 
	}
	
	/**
	 * Connects to smtp host
	 * 
	 * @return SMTP
	 */
	public function connect()
	{
		$this->log('Trying to connect host');
		
		if( $this->secure != 'none' ) {
			$this->host = $this->secure . '://' . $this->host;
		}
		
		$this->connection = fsockopen($this->host, $this->port, $this->errorNo, $this->errorMessage, $this->timeout);
		
		if(!$this->connection) {
			$this->log('Unable to connect host : '. $this->host);
		} else {
			$this->log('Connection successful');
		}
		
		return $this;
	}
	
	/**
	 * Puts data to socket
	 * 
	 * @param	string $data
	 * @return	SMTP
	 */
	public function put($data)
	{
		
	}
	
	/**
	 * Reads data from socket
	 * 
	 * @param	int	 $length
	 * @return	SMTP
	 */
	public function get($length = 4096)
	{
		
	}
	
	/**
	 * Closes connection
	 * 
	 * @access public
	 * @return SMTP
	 */
	public function close()
	{
		$this->log('Closing connection');
		
		fclose($this->connection);
		
		return $this;
	}
	
	/**
	 * Gets logs
	 * 
	 * @access public
	 * 
	 * @return array
	 */
	public function getLogs()
	{
		return $this->logs;
	}
	
	/**
	 * Sets debug mode
	 *
	 * @access	public
	 * @param	bool	$mode
	 */
	public function debug($mode)
	{
		$this->debug = $mode;
	}
	
	/**
	 * Logs message for debugging
	 * 
	 * @access private
	 * @param string $message
	 */
	private function log($message)
	{
		if( $this->debug == true ) {
			echo "<code>$message</code><br />";
		}
			
		$this->logs[] = array(
			'time' => time(),
			'message' => $message
		);
	}
	
	
	public function __destruct()
	{
		$this->close();
	}
}