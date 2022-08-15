<?php
use \PHPUnit\Framework\TestCase;
include('validation.php');

class ValidationTest extends TestCase {

    public function testValidationOk() {
        $input = array("fname"=>"امین", "lname"=>"رفیعی", "password"=>"amin8712", "email"=>"amin@gmail.com", "mobile"=>"09114098712", "telephone"=>"01732356081", "nationalcode"=>"2111025356", "number"=>"12");
        $test = new Validation();
        $errors = $test->validate($input,
        [
            'fname'=>['required','isEmpty|isPersian','نام الزامی است|نام باید فارسی باشد'],
            'lname'=>['required','isEmpty|isPersian','نام خانوادگی الزامی است|نام خانوادگی باید فارسی باشد'],
            'password'=>['required','isEmpty|checkPassword&8','رمز عبور الزامی است|رمز عبور معتبر نیست'],
            'email'=>['required','isEmpty|checkEmail','ایمیل الزامی است|ایمیل معتبر نیست'],
            'mobile'=>['required','isEmpty|checkMobile','موبایل الزامی است|موبایل معتبر نیست'],
            'telephone'=>['optional','isEmpty|checkTelephone','تلفن الزامی است|تلفن معتبر نیست'],
            'nationalcode'=>['required','isEmpty|checkNationalCode','کد ملی الزامی است|کد ملی معتبر نیست'],
            'number'=>['required','isEmpty|inRange&10&15','عدد الزامی است|عدد در بازه معتبر نیست'],
        ]);
        $this->assertCount(0, $errors);
    }

    public function testValidationFailWithInvalidFirstName() {
        $input = array("fname"=>"amin", "lname"=>"رفیعی", "password"=>"amin8712", "email"=>"amin@gmail.com", "mobile"=>"09114098712", "telephone"=>"01732356081", "nationalcode"=>"2111025356", "number"=>"12");
        $test = new Validation();
        $errors = $test->validate($input,
        [
            'fname'=>['required','isEmpty|isPersian','نام الزامی است|نام باید فارسی باشد'],
            'lname'=>['required','isEmpty|isPersian','نام خانوادگی الزامی است|نام خانوادگی باید فارسی باشد'],
            'password'=>['required','isEmpty|checkPassword&8','رمز عبور الزامی است|رمز عبور معتبر نیست'],
            'email'=>['required','isEmpty|checkEmail','ایمیل الزامی است|ایمیل معتبر نیست'],
            'mobile'=>['required','isEmpty|checkMobile','موبایل الزامی است|موبایل معتبر نیست'],
            'telephone'=>['optional','isEmpty|checkTelephone','تلفن الزامی است|تلفن معتبر نیست'],
            'nationalcode'=>['required','isEmpty|checkNationalCode','کد ملی الزامی است|کد ملی معتبر نیست'],
            'number'=>['required','isEmpty|inRange&10&15','عدد الزامی است|عدد در بازه معتبر نیست'],
        ]);
        $this->assertCount(1, $errors);
    }

    public function testValidationFailWithInvalidLastName() {
        $input = array("fname"=>"امین", "lname"=>"rafiee", "password"=>"amin8712", "email"=>"amin@gmail.com", "mobile"=>"09114098712", "telephone"=>"01732356081", "nationalcode"=>"2111025356", "number"=>"12");
        $test = new Validation();
        $errors = $test->validate($input,
        [
            'fname'=>['required','isEmpty|isPersian','نام الزامی است|نام باید فارسی باشد'],
            'lname'=>['required','isEmpty|isPersian','نام خانوادگی الزامی است|نام خانوادگی باید فارسی باشد'],
            'password'=>['required','isEmpty|checkPassword&8','رمز عبور الزامی است|رمز عبور معتبر نیست'],
            'email'=>['required','isEmpty|checkEmail','ایمیل الزامی است|ایمیل معتبر نیست'],
            'mobile'=>['required','isEmpty|checkMobile','موبایل الزامی است|موبایل معتبر نیست'],
            'telephone'=>['optional','isEmpty|checkTelephone','تلفن الزامی است|تلفن معتبر نیست'],
            'nationalcode'=>['required','isEmpty|checkNationalCode','کد ملی الزامی است|کد ملی معتبر نیست'],
            'number'=>['required','isEmpty|inRange&10&15','عدد الزامی است|عدد در بازه معتبر نیست'],
        ]);
        $this->assertCount(1, $errors);
    }

    public function testValidationFailWithInvalidPassword() {
        $input = array("fname"=>"امین", "lname"=>"رفیعی", "password"=>"amin871", "email"=>"amin@gmail.com", "mobile"=>"09114098712", "telephone"=>"01732356081", "nationalcode"=>"2111025356", "number"=>"12");
        $test = new Validation();
        $errors = $test->validate($input,
        [
            'fname'=>['required','isEmpty|isPersian','نام الزامی است|نام باید فارسی باشد'],
            'lname'=>['required','isEmpty|isPersian','نام خانوادگی الزامی است|نام خانوادگی باید فارسی باشد'],
            'password'=>['required','isEmpty|checkPassword&8','رمز عبور الزامی است|رمز عبور معتبر نیست'],
            'email'=>['required','isEmpty|checkEmail','ایمیل الزامی است|ایمیل معتبر نیست'],
            'mobile'=>['required','isEmpty|checkMobile','موبایل الزامی است|موبایل معتبر نیست'],
            'telephone'=>['optional','isEmpty|checkTelephone','تلفن الزامی است|تلفن معتبر نیست'],
            'nationalcode'=>['required','isEmpty|checkNationalCode','کد ملی الزامی است|کد ملی معتبر نیست'],
            'number'=>['required','isEmpty|inRange&10&15','عدد الزامی است|عدد در بازه معتبر نیست'],
        ]);
        $this->assertCount(1, $errors);
    }

    public function testValidationFailWithInvalidEmail() {
        $input = array("fname"=>"امین", "lname"=>"رفیعی", "password"=>"amin8712", "email"=>"amingmail.com", "mobile"=>"09114098712", "telephone"=>"01732356081", "nationalcode"=>"2111025356", "number"=>"12");
        $test = new Validation();
        $errors = $test->validate($input,
        [
            'fname'=>['required','isEmpty|isPersian','نام الزامی است|نام باید فارسی باشد'],
            'lname'=>['required','isEmpty|isPersian','نام خانوادگی الزامی است|نام خانوادگی باید فارسی باشد'],
            'password'=>['required','isEmpty|checkPassword&8','رمز عبور الزامی است|رمز عبور معتبر نیست'],
            'email'=>['required','isEmpty|checkEmail','ایمیل الزامی است|ایمیل معتبر نیست'],
            'mobile'=>['required','isEmpty|checkMobile','موبایل الزامی است|موبایل معتبر نیست'],
            'telephone'=>['optional','isEmpty|checkTelephone','تلفن الزامی است|تلفن معتبر نیست'],
            'nationalcode'=>['required','isEmpty|checkNationalCode','کد ملی الزامی است|کد ملی معتبر نیست'],
            'number'=>['required','isEmpty|inRange&10&15','عدد الزامی است|عدد در بازه معتبر نیست'],
        ]);
        $this->assertCount(1, $errors);
    }

    public function testValidationFailWithInvalidMobile() {
        $input = array("fname"=>"امین", "lname"=>"رفیعی", "password"=>"amin8712", "email"=>"amin@gmail.com", "mobile"=>"0911409871", "telephone"=>"01732356081", "nationalcode"=>"2111025356", "number"=>"12");
        $test = new Validation();
        $errors = $test->validate($input,
        [
            'fname'=>['required','isEmpty|isPersian','نام الزامی است|نام باید فارسی باشد'],
            'lname'=>['required','isEmpty|isPersian','نام خانوادگی الزامی است|نام خانوادگی باید فارسی باشد'],
            'password'=>['required','isEmpty|checkPassword&8','رمز عبور الزامی است|رمز عبور معتبر نیست'],
            'email'=>['required','isEmpty|checkEmail','ایمیل الزامی است|ایمیل معتبر نیست'],
            'mobile'=>['required','isEmpty|checkMobile','موبایل الزامی است|موبایل معتبر نیست'],
            'telephone'=>['optional','isEmpty|checkTelephone','تلفن الزامی است|تلفن معتبر نیست'],
            'nationalcode'=>['required','isEmpty|checkNationalCode','کد ملی الزامی است|کد ملی معتبر نیست'],
            'number'=>['required','isEmpty|inRange&10&15','عدد الزامی است|عدد در بازه معتبر نیست'],
        ]);
        $this->assertCount(1, $errors);
    }

    public function testValidationFailWithInvalidTelephone() {
        $input = array("fname"=>"امین", "lname"=>"رفیعی", "password"=>"amin8712", "email"=>"amin@gmail.com", "mobile"=>"09114098712", "telephone"=>"0173235608", "nationalcode"=>"2111025356", "number"=>"12");
        $test = new Validation();
        $errors = $test->validate($input,
        [
            'fname'=>['required','isEmpty|isPersian','نام الزامی است|نام باید فارسی باشد'],
            'lname'=>['required','isEmpty|isPersian','نام خانوادگی الزامی است|نام خانوادگی باید فارسی باشد'],
            'password'=>['required','isEmpty|checkPassword&8','رمز عبور الزامی است|رمز عبور معتبر نیست'],
            'email'=>['required','isEmpty|checkEmail','ایمیل الزامی است|ایمیل معتبر نیست'],
            'mobile'=>['required','isEmpty|checkMobile','موبایل الزامی است|موبایل معتبر نیست'],
            'telephone'=>['optional','isEmpty|checkTelephone','تلفن الزامی است|تلفن معتبر نیست'],
            'nationalcode'=>['required','isEmpty|checkNationalCode','کد ملی الزامی است|کد ملی معتبر نیست'],
            'number'=>['required','isEmpty|inRange&10&15','عدد الزامی است|عدد در بازه معتبر نیست'],
        ]);
        $this->assertCount(1, $errors);
    }

    public function testValidationFailWithInvalidNationalCode() {
        $input = array("fname"=>"امین", "lname"=>"رفیعی", "password"=>"amin8712", "email"=>"amin@gmail.com", "mobile"=>"09114098712", "telephone"=>"01732356081", "nationalcode"=>"2111025355", "number"=>"12");
        $test = new Validation();
        $errors = $test->validate($input,
        [
            'fname'=>['required','isEmpty|isPersian','نام الزامی است|نام باید فارسی باشد'],
            'lname'=>['required','isEmpty|isPersian','نام خانوادگی الزامی است|نام خانوادگی باید فارسی باشد'],
            'password'=>['required','isEmpty|checkPassword&8','رمز عبور الزامی است|رمز عبور معتبر نیست'],
            'email'=>['required','isEmpty|checkEmail','ایمیل الزامی است|ایمیل معتبر نیست'],
            'mobile'=>['required','isEmpty|checkMobile','موبایل الزامی است|موبایل معتبر نیست'],
            'telephone'=>['optional','isEmpty|checkTelephone','تلفن الزامی است|تلفن معتبر نیست'],
            'nationalcode'=>['required','isEmpty|checkNationalCode','کد ملی الزامی است|کد ملی معتبر نیست'],
            'number'=>['required','isEmpty|inRange&10&15','عدد الزامی است|عدد در بازه معتبر نیست'],
        ]);
        $this->assertCount(1, $errors);
    }

    public function testValidationFailWithInvalidNumber() {
        $input = array("fname"=>"امین", "lname"=>"رفیعی", "password"=>"amin8712", "email"=>"amin@gmail.com", "mobile"=>"09114098712", "telephone"=>"01732356081", "nationalcode"=>"2111025356", "number"=>"5");
        $test = new Validation();
        $errors = $test->validate($input,
        [
            'fname'=>['required','isEmpty|isPersian','نام الزامی است|نام باید فارسی باشد'],
            'lname'=>['required','isEmpty|isPersian','نام خانوادگی الزامی است|نام خانوادگی باید فارسی باشد'],
            'password'=>['required','isEmpty|checkPassword&8','رمز عبور الزامی است|رمز عبور معتبر نیست'],
            'email'=>['required','isEmpty|checkEmail','ایمیل الزامی است|ایمیل معتبر نیست'],
            'mobile'=>['required','isEmpty|checkMobile','موبایل الزامی است|موبایل معتبر نیست'],
            'telephone'=>['optional','isEmpty|checkTelephone','تلفن الزامی است|تلفن معتبر نیست'],
            'nationalcode'=>['required','isEmpty|checkNationalCode','کد ملی الزامی است|کد ملی معتبر نیست'],
            'number'=>['required','isEmpty|inRange&10&15','عدد الزامی است|عدد در بازه معتبر نیست'],
        ]);
        $this->assertCount(1, $errors);
    }

}