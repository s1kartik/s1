<?php
/*******************************************************************************
** Class: Google Translate
** Purpose: Translate text using Google language tools
** Author: Kartik Shah
** Date: 05Nov2014
********************************************************************************/
class googletranslatetool
{	
	/*function translate($word, $src='en', $dest='pt') // PLEASE DO NOT DELETE THIS FUNCTION //
	{
		$word = urlencode($word);
			// dutch to english
		//$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl=nl&tl=en&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';
			// english to hindi
		//$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl=en&tl=hi&ie=UTF-8&oe=UTF-8&multires=1&otf=1&ssel=3&tsel=3&sc=1';
			// hindi to english
		// $url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl=hi&tl=en&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';
		 
		//$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl=nl&tl=en&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1

		$url = 'http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl=en&sl='.$src.'&tl='.$dest.'&ie=UTF-8&oe=UTF-8&multires=1';
		$name_en = self::curl($url);
		 
		$name_en = explode('"',$name_en);
		return  $name_en[1];
	}*/
	

	function translateLanguage($api_key,$text,$target,$source=false)
	{
		$url = 'https://www.googleapis.com/language/translate/v2?key='.$api_key.'&q='.rawurlencode($text);
		$url .= '&target='.$target;
		if($source) {
			$url .= '&source='.$source;
		}
		// echo $url;
		$response = file_get_contents($url);
		// common::pr( $response );die;
	
		/* USING CURL: $ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);                 
		curl_close($ch);
		*/
	 
		$obj = json_decode($response,true); //true converts stdClass to associative array.
		return $obj;
	}   

	function translate($text='', $from='en', $to='en')
	{
		$str_gtranslate = "";
		$arr_text = (strlen($text)>5000) ? str_split($text,5000) : array($text);
		// common::pr( $arr_text );

		foreach($arr_text AS $val_arr_text) {
			// $url = "http://translate.google.com/translate_a/t?client=t&text=".urlencode($val_arr_text)."&hl=en&sl=".$from."&tl=".$to."&ie=UTF-8&oe=UTF-8&multires=1";			

			if( $from == $to ) {
				// echo "<br>Source and Destination languages can not the same";
				$translated_text = $val_arr_text;
			}
			else {
				$response_langtext = self::translateLanguage($api_key="AIzaSyC_DfOA-aYFMC6VbKIjCFooYbwzToxXwlc",$val_arr_text,$to,$from);
				$translated_text = '';
				if($response_langtext != null) {
					if(isset($response_langtext['error'])) {
						echo "Error is : ".$response_langtext['error']['message'];
					}
					else {
						// echo "Translsated Text: ".$response_langtext['data']['translations'][0]['translatedText'];
						$translated_text = $response_langtext['data']['translations'][0]['translatedText'];
						if(isset($response_langtext['data']['translations'][0]['detectedSourceLanguage'])) { //this is set if only source is not available.
							//echo "<br>Detected Source Languge : ".$response_langtext['data']['translations'][0]['detectedSourceLanguage'];     
						}
					}
				}
				else {
					// echo "<br>UNKNOWN ERROR";
				}
			}
			$str_gtranslate .= $translated_text.' ';
		}

		$str_gtranslate = str_replace('&lt;', '<', $str_gtranslate);
		$str_gtranslate = str_replace('&gt;', '>', $str_gtranslate);
		$str_gtranslate = str_replace('</ ', '</', $str_gtranslate);
		$str_gtranslate = str_replace('&quot;', '"', $str_gtranslate);
		$str_gtranslate = str_replace('<br>', '', $str_gtranslate); 
		$str_gtranslate = str_replace('<br />', '', $str_gtranslate); 
		$str_gtranslate = str_replace('< / b>', '', $str_gtranslate);
		$str_gtranslate = str_replace('& nbsp;', ' ', $str_gtranslate);
		$str_gtranslate = str_replace('&n bsp;', ' ', $str_gtranslate);
		$str_gtranslate = str_replace('&nbs p;', ' ', $str_gtranslate);
		$str_gtranslate = str_replace('&rsquo ;', "'", $str_gtranslate);
		$str_gtranslate = str_replace(' vetica', '<span style="font-family: arial, helvetica', $str_gtranslate);
		$str_gtranslate = str_replace('helveti ca', "helvetica", $str_gtranslate);
		$str_gtranslate = str_replace('<s ', '<span', $str_gtranslate);
		$str_gtranslate = str_replace('><<', '><', $str_gtranslate);



		return $str_gtranslate;
	}
}
?>