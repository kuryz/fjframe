<?php
class Token
{
	public static function generate()
	{
		return Session::put(Config::get('session/token_name'), md5(uniqid()));
	}

	public static function check($token='',$api = false)
	{
		$tokenName = Config::get('session/token_name');
		if (Session::exists($tokenName) && $token === Session::get($tokenName)) {
			if($api != true) Session::delete($tokenName);
			return true;
		}
		return false;
	}
}
?>