<?php

  class basecamp
  {
    /** @type string Base url for bcx-api requests. */
    protected $baseurl;
    /** @type string Basecamp company/account ID. */
    protected $id;
    /** @type string Basecamp login username. */
    protected $username;
    /** @type string Basecamp login password. */
    protected $password;
    /** @type string User-Agent to identify Application to Basecamp. */
    protected $useragent;
    /** @type string String to store method errors. */
    public $error;

    /**
     * This method creates a new Basecamp instance.
     *
     * @param int $id An unsigned integer.
     * @param string $username A string that represents the login username;
     * @param string $password A string that represets the login password;
     *
     */
    public function __construct($id, $username, $password, $appName, $email)
    {
      $this->id = $id;
      $this->username = $username;
      $this->password = $password;
      $this->baseurl = "https://basecamp.com/$id/api/v1/";
      $this->useragent = "User-Agent: $appName ($email)";

      $this->error = "";
    }
    
    /* public methods */
		public function getTodos($me, $filter=null)
		{

			if($filter==null){
			  $request = $this->baseurl . "people/".$me."/assigned_todos.json";
			} else {
			  $request = $this->baseurl . "people/".$me."/assigned_todos.json";
			}
			
      $result = $this->processRequest("GET", $request, array());
      return $result; 
    }
    
    public function getProjectTodos($me, $basecampProject)
		{
			$request = $this->baseurl . "projects/".$basecampProject."/todolists/".$me.".json";
      $result = $this->processRequest("GET", $request, array());
      return $result; 
    }
    
    public function getTodoTotals($me)
    {
			$request = $this->baseurl . "people/".$me."/assigned_todos.json";    
      $result = $this->processRequest("GET", $request, array());
      return $result; 
    }
		
    /* private methods */
    private function processRequest($method, $request, $payload)
    {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "$request");
      curl_setopt($ch, CURLOPT_HEADER, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($ch, CURLOPT_USERPWD, "$this->username:$this->password");
      curl_setopt($ch, CURLOPT_USERAGENT, "$this->useragent");

      switch($method)
      {
        case "GET":
          curl_setopt($ch, CURLOPT_HTTPGET, true);
        break;
        default:
          $request_headers = array("Content-Type: application/json; charset=utf-8", "Accept: application/json");
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
          if (is_array($payload)) $payload = http_build_query($payload);

          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        break;
      }

      $response = curl_exec($ch);
      $errno = curl_errno($ch);
      $error = curl_error($ch);
      curl_close($ch);  
      if ($errno) throw new Exception("cUrl error: $error", $errno);

      list($message_headers, $message_body) = preg_split("/\r\n\r\n|\n\n|\r\r/", $response, 2);
      //print_r($message_body);
      $response_headers = $this->curl_parse_headers($message_headers);
      $statusCode = $response_headers['http_status_code'];
      if ($statusCode >= 400)
      {
        throw new Exception("HTTP Error $statusCode:\n" . print_r(compact('method', 'request', 'request_headers', 'response'), 1));
      }

      return json_decode($message_body);
    }

    private function curl_parse_headers($message_headers)
    {
      $header_lines = preg_split("/\r\n|\n|\r/", $message_headers);
      $headers = array();
      list(, $headers['http_status_code'], $headers['http_status_message']) = explode(' ', trim(array_shift($header_lines)), 3);
      foreach ($header_lines as $header_line)
      {
        list($name, $value) = explode(':', $header_line, 2);
        $name = strtolower($name);
        $headers[$name] = trim($value);
      }

      return $headers;
    }
    
  }
?>
