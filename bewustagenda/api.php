<?php
/**
 * Bewust Agenda: API > json / xml download agenda Bewust Nederland.
 *
 * @copyright   Copyright (c) 2014, ZZPstudio <erwin@zzplab.nl>
 */
namespace bewustagenda;
class api {
	/**
	 * Configuration variables.
	 *
	 * @var array
	 */
	 
	private $config = [];
	/**
	 * Filter variables.
	 *
	 * @var array
	 */
	private $filter = [];
    /**
     * Constructor.
     *
     * @param string $config for configuration
     */
  public function __construct($config)
  {
		$this->config = $config;
  }
	  /**
   * Add filter value for filtering the output.
   *
   * @return array
   */
  public function set_filter($k, $v)
  {
		  $this->filter[$k] = $v;
  }
  /**
   * Setup $url and $params for POST curl request.
   *
   * @return curl data in xml / json
   */
  public function get_agenda()
  {
		$api_time = time();
		$api_hash = password_hash($this->config['api_key'].$this->config['api_id'].$this->config['api_key'].$this->config['domein'].$this->config['api_key'].$api_time, PASSWORD_DEFAULT);
		$url = $this->config['api_url'].'/'.$this->config['api_id'].'/'.$this->config['domein'].'/'.$this->config['data_type'];
		$params = [ 
		  'api_time' => $api_time
		, 'api_hash' => $api_hash
		, 'filter'   => json_encode($this->filter)
		];
		return $this->curl_load_data($url, $params);
	}
  /**
   * Send POST curl request and receive data.
   *
   * @return xml / json data
   */
  private function curl_load_data($url, $params)
  {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_HTTPGET, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}
}
?>
