<?php


namespace Code\Validator;


class Validator
{
	
	public static function validateRequiredFields(array $data): bool
	{
		foreach ($data as $key => $value) {
			if (is_null($data[$key])) {
				return false;
				break;
			}
		}

		return true;
	}
}
