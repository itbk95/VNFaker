<?php

namespace Buihuycuong\Vnfaker;

class VNFaker 
{

	const FILE_PATH_FOLDER     = '/files';
	const FILE_FIRST_NAME_1    = 'firstname_1.txt';
	const FILE_FIRST_NAME_2    = 'firstname_2.txt';
	const FILE_LAST_NAME       = 'lastname.txt';
	const FILE_MID_NAME        = 'midname.txt';
	const FILE_CITY            = 'city.txt';
	const FILE_COMPANY         = 'company.txt';

	const FOLDER_PHONE         = 'phone';
	const FILE_MOBILE_PHONE    = 'mobile.txt';
	const FILE_PHONE_CODE_CITY = 'code_cities.txt';
	const FILE_PHONE_FIX       = 'tele.txt';

	const FILE_COLOR_NAME      = 'color_name.txt';

	const FOLDER_STRING        = 'string';
	const FILE_WORD            = 'word.txt';
	const FILE_SENTENCE        = 'sentence.txt';
	const FILE_PARAGRAPH       = 'paragraph.txt';
	const FOLDER_JSON          = 'json';

	public function __construct() {
		// Do something here
	}

	/*
	* read file
	*/
	public static function readfile($file_path, $permission = 'r') {
		$content_arrs = [];
		$file = fopen( __DIR__.self::FILE_PATH_FOLDER.'/'.$file_path, $permission);

		while ($line = fgets($file)) {
		  $content_arrs[] = $line;
		}

		fclose($file);

		return  $content_arrs;
	}

	/**
     * @return string
     */
	public static function array_rand(array $items, $num = 1, $array = false, $glue = ',') {
		$return_value = false;
		if($num > 1) {
			for($i = 0; $i < $num; $i++) {
				$return_value[] = $items[array_rand($items)];
			}

			if($array) {
				return $return_value;
			}
			return implode($glue, $return_value);
		}
		return mb_convert_encoding(trim($items[array_rand($items)]), "UTF-8");
	}

	/**
     * @param int $word
     * @return string
     */
	public static function firstame($word = 1) {
		$file_name = self::FILE_FIRST_NAME_1;
		if($word == 2) {
			$file_name = self::FILE_FIRST_NAME_2;
		}

		$items = self::readfile($file_name);

		return self::array_rand($items);
	}

	/**
     * @return string
     */
	public static function midname() {
		$items = self::readfile(self::FILE_MID_NAME);
		return self::array_rand($items);
	}

	/**
     * @return string
     */
	public static function lastname() {
		$items = self::readfile(self::FILE_LAST_NAME);
		return self::array_rand($items);
	}

	/**
     * @param int $word
     * @return string
     */
	public static function fullname($word = 3) {
		$word_number = 3;
		if($word == 4) {
			$word_number = 4;
		}

		return self::lastname().' '.self::midname().' '.self::firstame($word_number - 2);
	}

	/**
	 * rand() or mt_rand()
     * @return string
     */
	public static function int() {
		return mt_rand();
	}

	public static function maxInt() {
		return mt_getrandmax();
	}

	public static function numberBetween(int $min = 0, int $max = 100000) {
		if($max >= $min)
			return mt_rand($min, $max);

		return $max;
	} 

	public static function float($min = 0, $max = 100, $decimals = 2) {
		$scale = pow(10, $decimals);
		
		return mt_rand($min * $scale, $max * $scale) / $scale;
	} 

	public static function boolean($string = false) {
		$value = (bool)mt_rand(0,1);
		if($string)
			return $value ? 'true':'false';
		return $value;
	} 

	/*
	* datetime
	*/
	public static function date($symbol = '/') {
		// $timestamp = mt_rand(1, time());
		// $randomDate = date("d/m/Y", $timestamp);
		return self::day() . $symbol . self::month() . $symbol . self::year();
	}



	public static function year($min = 1950) {
		$max = date("Y");
		if($min <= $max) 
			return  mt_rand($min, $max);
		return $max;
	}

	public static function month() {
		$month = mt_rand(1, 12);
		if($month < 10)
			$month = '0'.$month;
		return $month;
	}

	public static function day() {
		$day = mt_rand(1, 28);
		if($day < 10)
			$day = '0'.$day;
		return $day;
	}

	/*
	* Make order id or suk, uuid
	*/
	public static function generateOrderNo($length = 6, $prefix = null, $postfix = null, $numbers = false, $letters = false, $uppercase = false, $lowercase = false)
	{
	    $token          = "";
	    $codeAlphabet   = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $codeAlphabet  .= "abcdefghijklmnopqrstuvwxyz";
	    $codeAlphabet  .= "0123456789";
	    $max            = strlen($codeAlphabet);

	    $length = ($length - (strlen($prefix) + strlen($postfix)));

	    if($length > 0) {
	    	for ($i = 0; $i < $length; $i++) {
	    	    $token .= $codeAlphabet[random_int(0, $max - 1)];
	    	}
	    }

	    return $prefix.$token.$postfix;
	}

	/*
	* phone number
	*/
	public static function mobilephone($numbers = 10) {
		return self::prefixPhone(self::FILE_MOBILE_PHONE).self::postfixPhone();
	}

	public static function fixedLineNumber($numbers = 12) {
		return self::prefixPhone(self::FILE_PHONE_FIX).self::postfixPhone($numbers - 4);
	}

	public static function cityphone($numbers = 12) {
		return self::prefixPhone(self::FILE_PHONE_CODE_CITY).self::postfixPhone($numbers - 4);
	}

	private static function prefixPhone($file_name) {
		$items = self::readfile(self::FOLDER_PHONE.'/'.$file_name);
		return self::array_rand($items);
	}

	private static function postfixPhone($count = 7) {
		$postfix = '';
		$numbers = '0123456789';
		for ($i = 0; $i < $count; $i++) {
	        $postfix .= $numbers[mt_rand(0, $count - 1)];
	    }

	    return $postfix;
	}

	/*---END PHONE*/

	/*
	* COMPANY
	*/
	public static function company() {
		$items = self::readfile(self::FILE_COMPANY);
		return self::array_rand($items);
	}

	public static function gender() {
		return self::array_rand(['nam', 'nữ']);
	}

	public static function username() {
		return strtolower(self::str_clean(self::vnToString(self::fullname()), true));
	}

	public static function email(array $domain = []) {
		$email  = '@';
		if(!$domain) {
			$domain = ['gmail.com', 'outlook.com', 'example.com'];
		}
		$email .= self::array_rand($domain);

		return strtolower(self::username().$email);
	}

	public static function vnToString($str){
		$unicode = [
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
			'd'=>'đ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'i'=>'í|ì|ỉ|ĩ|ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'D'=>'Đ',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		];
		 
		foreach($unicode as $nonUnicode=>$uni){
			$str = preg_replace("/($uni)/i", $nonUnicode, $str);
		}
		 
		return $str;
	}

	public static function str_clean($string, $remove_space = false) {
	   if($remove_space) {
	   		$string = str_replace(' ', '', $string); // Replaces all spaces.
	   }

	   return preg_replace('/[^A-Za-z0-9\- ]/', '', $string); // Removes special chars.
	}


	/**
     * ADDRESS
     */
	public static function city($array = false) {
		$items = self::readfile(self::FILE_CITY);
		if($array) {
			return $items;
		}

		return self::array_rand($items);
	}
	/**
     * @return string
     */
	public static function address() {

	}

	/*
	* TEXT - STRING
	*/
	public static function paragraphs(int $paragraph = 1, bool $array = false, $glue = '<br>') {
		return self::typeString(self::FILE_PARAGRAPH, $paragraph, $array, $glue);
	}

	public static function words(int $word = 1, bool $array = false, $glue = ', ') {
		return self::typeString(self::FILE_WORD, $word, $array, $glue);
	}

	public static function sentences(int $sentence = 1, bool $array = false, $glue = '. ') {
		return self::typeString(self::FILE_SENTENCE, $sentence, $array, $glue);
	}

	private static function typeString($file_name, int $number, bool $array, $glue) {
		$items = self::readfile(self::FOLDER_STRING.'/'.$file_name);
		return self::array_rand($items, $number, $array, $glue);
	}

	/*
	* Color
	*/
	public static function hexcolor() {
		return '#'. dechex(mt_rand(0x000000, 0xFFFFFF));
	}

	public static function colorName() {
		$colors = self::readfile(self::FILE_COLOR_NAME);

		return self::array_rand($colors);
	} 

	/*
	* file
	*/
	public static function file($name = null, array $extentions = ['png', 'jpg'], $width = 100, $height = 100, $mimeType = 'image') {
		return self::generateOrderNo().'.'.self::array_rand($extentions);
	} 



}