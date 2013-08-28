<?php
class core_XSS{
	public static function h($text){
		return htmlspecialchars($text, ENT_QUOTES);
	}
}