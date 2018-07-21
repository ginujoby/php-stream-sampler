<?php

namespace Util;

final class RandomGenerator
{
	/**
	 * @param  int $length
	 * 
	 * @return string
	 */
	public static function getRandomString($length = 1000)
	{
		return bin2hex(openssl_random_pseudo_bytes($length));
	}
}