<?php declare(strict_types=1);

namespace Local\NS\Validators;

class Email extends ValidatorBase {
	
	public static function validate($value) {
		
		if(filter_var($value, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return [
				'error' => 'введите корретный e-mail'
			];
		}
	}
}