<?php

namespace App\Models;

/**
 * All Form Validators Prototype Class
 */
class Validator
{
    /**
     * the $_POST array will be validate
     *
     * @var array
     */
    private $array;

    /**
     * $errors will display on screen
     *
     * @var array
     */
    private $errors;

    /**
     *
     * Construction Function, import $_POST as an array
     *
     * @param   array  $array  the $_POST user input
     *
     */
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    /**
     * validateMinLength will check if the field input is longer than the given number
     *
     * @param   int     $length  $length the given min number
     * @param   string  $field   $field the given field
     *
     * @return  void             return void
     */
    public function validateMinLength(int $length, string $field): void
    {
        if (strlen($this->array[$field]) < $length) {
            $this->errors[$field][] = 'You must input more than ' . $length . ' characters.';
        }
    }

    /**
     * validateMaxLength will check if the field input is shorter than the given number
     *
     * @param   int     $length  $length the given max number
     * @param   string  $field   $field the given field
     *
     * @return  void             return void
     */
    public function validateMaxLength(int $length, string $field): void
    {
        if (strlen($this->array[$field]) > $length) {
            $this->errors[$field][] = 'You must input less than ' . $length . ' characters.';
        }
    }

    /**
     * validateString will check if there are invalid characters
     *
     * @param   string  $field  $field the given string
     *
     * @return  void            return void
     */
    public function validateString(string $field): void
    {
        if (!preg_match('/^[A-z0-9\s\-\,\']{1,255}$/', $this->array[$field])) {
            $this->errors[$field][] = 'There are invalid characters.';
        }
    }

    /**
     * validatePhone will check the phone number
     *
     * @param   string  $field  $field the given phone field
     *
     * @return  void            return void
     */
    public function validatePhone(string $field): void
    {
        if (!preg_match('/^[\(]?[0-9]{3}[\-\)\ \.]?[0-9]{3}[\-\ \.]?[0-9]{4}$/', $this->array[$field])) {
            $this->errors[$field][] = 'Phone must be like 123-123-1234';
        }
    }

    /**
     * validatePostalCode will check the postal code
     *
     * @param   string  $field  $field the given postal code
     *
     * @return  void            return void
     */
    public function validatePostalCode(string $field): void
    {
        if (!preg_match('/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/', $this->array[$field])) {
            $this->errors[$field][] = 'Postal Code must be like A2A 2A2';
        }
    }

    /**
     * validateEmail will check email
     *
     * @param   string  $field  $field the given email
     *
     * @return  void            return void
     */
    public function validateEmail(string $field): void
    {
        if (!filter_var($this->array[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = 'Email must be a legal email';
        }
    }

    /**
     * validateRequired will check if this field is empty
     *
     * @param array $required
     *   Array contains all required fields
     *
     * @return void
     */
    public function validateRequired(array $required): void
    {
        foreach ($required as $post_key) {

            if (empty($this->array[$post_key])) {
                $label = ucwords(str_replace('_', ' ', $post_key));
                $this->errors[$post_key][] = "* " . $label . " is required";
            }
        }
    }

    /* ----------- MAGIC METHOD
      -------------------------------------------------------- */

    /**
     * getErrors will return all errors
     *
     * @return  array   return all errors
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * array will return the value in original $_POST
     *
     * @return  array   return all original $_POST values
     */
    public function array(): array
    {
        return $this->array;
    }
}