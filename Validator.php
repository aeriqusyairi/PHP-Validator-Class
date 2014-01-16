<?php
class Validator{
  
	private $_passed = false,
			$_errors = array();
			//$_db = null;

	public function __construct(){
		//$this->_db = DB::getInstance();
	}

	public function check($source, $items = array()){
		foreach($items as $item => $rules) {
			foreach($rules as $rule => $rule_value){

				$value = trim($source[$item]);
				$item = escape($item);


				if($rule === 'required' && empty($value)){
					$this->addError("{$item} is required");
				}else if(!empty($value)){
					switch($rule){
						case 'min':
							if(strlen($value) < $rule_value){
								$this->addError("{$item} must be a minimum of {$rule_value} characters.");
							}
						break;
						case 'max':
							if(strlen($value) > $rule_value){
								$this->addError("{$item} must be a maximum of {$rule_value} characters.");
							}
						break;
						case 'matches':
							if($value != $source[$rule_value]){

								$this->addError("{$rule_value} must match {$item}.");
							}
						break;
						/*
						case 'unique':
							$check = $this->_db->get($rule_value, array($item, '=', $value));
							if($check->count()){
								$this->addError("{$item} already exists.");
							}
						break;
						*/
						case 'accepted':
							if($value != 1 && $value != 'on' && $value != 'yes'){
								$this->addError("{$item} must be accepted.");
							}
						break;
						case 'before':
							if(strtotime($value) > strtotime($rule_value)){
								$this->addError("{$item} must be before {$rule_value}");
							}
						break;
						case 'after':
							if(strtotime($value) < strtotime($rule_value)){
								$this->addError("{$item} must be after {$rule_value}");
							}
						break;
						case 'alpha':
							if(preg_match('/[^a-z]/i', $value)){
								$this->addError("{$item} must contains alphabet only.");
							}
						break;
						case 'alpha_num':
							if(preg_match('/[^a-z0-9]/i', $value)){
								$this->addError("{$item} must contains alphanumeric only.");
							}
						break;
						case 'alpha_dash':
							if(preg_match('/[^a-z_\-0-9]/i', $value)){
								$this->addError("{$item} must contains alphanumeric, underscore, and dash only.");
							}
						break;
						case 'date':
							if(strtotime($value) === false){
								$this->addError("{$item} is not a valid date.");
							}
						break;
						case 'date_format':
							$parsed = date_parse_from_format($rule_value, $value);
							if($parsed['error_count'] !== 0){
								$this->addError("The date format of {$item} is not valid.");
							}
						break;
						case 'digits':
							if(filter_var($value, FILTER_VALIDATE_INT) === false){
								$this->addError("{$item} must be a numeric value.");
							}
							if(strlen((string) $value) !== $rule_value){
								$this->addError("The length of {$item} must be exactly {$rule_value}.");
							}
						break;
						case 'email':
							if(filter_var($value, FILTER_VALIDATE_EMAIL) === false){
								$this->addError("{$item} is not a valid email.");
							}
						break;
						case 'ip':
							if(filter_var($value, FILTER_VALIDATE_IP) === false){
								$this->addError("{$item} is not a valid ip.");
							}
						break;
						case 'url':
							if(filter_var($value, FILTER_VALIDATE_URL) === false){
								$this->addError("{$item} is not a valid url.");
							}
						break;
					}
				}

			}
		}

		if(empty($this->_errors)){
			$this->_passed = true;
		}

		return $this;
	}

	private function addError($error){
		$this->_errors[] = $error;
	}

	public function errors(){
		return $this->_errors;
	}

	public function passed(){
		return $this->_passed;
	}
}
