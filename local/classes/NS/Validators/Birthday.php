<?php declare(strict_types=1);

namespace Local\NS\Validators;

class Birthday extends ValidatorBase {
	
	const MAX_AGE = 120;
	const MIN_AGE = 1;

    const ERROR = [
        'error' => 'введите корректную дату рождения'
    ];

	/**
	 * @param $value
	 * @return array|bool
	 */
	public static function validate($value) {

		$today = new \DateTime();
		$birthday = \DateTime::createFromFormat('d.m.Y', $value);

		if (!$birthday) return self::ERROR;

		$age = $today->diff($birthday)->y;
		
		if($age > self::MIN_AGE && $age < self::MAX_AGE) {
			return true;
		} else {
			return self::ERROR;
		}
	}
}