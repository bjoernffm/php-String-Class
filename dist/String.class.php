<?

	/**
	 * The string class is very useful for people who need more sophisticated
	 * functionality that helps working with strings.
	 * 
	 * @author Björn Ebbrecht <b.ebbrecht@rl-3.de>
	 * @copyright Copyright (c) 2014 Björn Ebbrecht
	 * @license GNU
	 */
	class String {
	
		private $string = '';
		
		/**
		 * Constructor that sets the string.
		 * @param string The string to set initially.
		 */
		public function __construct($string = '') {
			$this->string = $string;
		}
		
		/**
		 * Magic method that returns the string on echoing or so.
		 * @return string
		 */
		public function __toString() {
			return $this->string;
		}
		
		/**
		 * Returns a String with lowered chars.
		 * @return String
		 */
		public function toLower() {
			$string = strtolower($this->string);
			return new String($string);
		}
		
		/**
		 * Returns a String with uppered chars.
		 * @return String
		 */
		public function toUpper() {
			$string = strtoupper($this->string);
			return new String($string);
		}
		
		/**
		 * Returns a String that contains only alphanumeric chars.
		 * @return String
		 */
		public function removeNonAlphanumericChars() {
			$string = preg_replace('#[^a-zA-Z0-9]#', '', $this->string);
			return new String($string);
		}
		
		/**
		 * This function transforms the given string to a camel case formatted
		 * one.
		 * @return String
		 */
		public function toCamelCase() {
			$string = strtolower($this->string);
			
			// remove all non alphanumeric chars and non-whitespaces.
			$string = preg_replace('#[^a-z0-9\s]#', '', $string);
			
			$buffer = array();
			$j = 0;
			for($i = 0; $i < strlen($string); $i++) {
				if (preg_match('#^[a-z0-9]$#', $string[$i]) == 1) {
					if ($j == 0) {
						$j = 1;
						$buffer[] = strtoupper($string[$i]);
					} else {
						$buffer[] = strtolower($string[$i]);
					}
				} else {
					$j = 0;
				}
			}

			$string = implode('', $buffer);
			return new String($string);
		}

		/**
		 * This function appends a string.
		 * @param string The string to append.
		 */
		public function append($string = '') {
			$this->string .= $string;
		}

		/**
		 * This function pushes the last char and returns it.
		 * @return string The last char.
		 */
		public function pop() {
			$return = substr($this->string, strlen($this->string)-1, 1);
			$this->string = substr($this->string, 0, -1);
			return $return;
		}
		
	}

?>