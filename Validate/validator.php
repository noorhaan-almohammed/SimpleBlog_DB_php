<?php
namespace Validate;
class validate{
    private $errors = [];

    // طريقة للتحقق من أن المدخل ليس فارغًا
    public function required($field, $value, $message = null) {
        if (empty(trim($value))) {
            $this->errors[$field] = $message ?? "$field is required.";
        }
    }

    // طريقة للتحقق من الحد الأدنى لطول النص
    public function minLength($field, $value, $minLength, $message = null) {
        if (strlen($value) < $minLength) {
            $this->errors[$field] = $message ?? "$field must be at least $minLength characters long.";
        }
    }

    // طريقة للتحقق من الحد الأقصى لطول النص
    public function maxLength($field, $value, $maxLength, $message = null) {
        if (strlen($value) > $maxLength) {
            $this->errors[$field] = $message ?? "$field must not exceed $maxLength characters.";
        }
    }
    public function allowed_image($field,$allowed_types, $imageFileType,  $message = null)
    {
        if (!in_array($imageFileType, $allowed_types)) {
            $allow ="";
            foreach($allowed_types as $allowed_type)
           {$allow .= $allowed_type . " "; }
            $this->errors[$field] = $message ?? "$field only $allow files are allowed.";
        }
    }
    // طريقة للتحقق مما إذا كانت هناك أخطاء
    public function hasErrors() {
        return !empty($this->errors);
    }
    public function getError($field) {
        return $this->errors[$field] ?? '';
    }
    // طريقة لإرجاع جميع الأخطاء
    public function getErrors() {
        return $this->errors;
    }
}