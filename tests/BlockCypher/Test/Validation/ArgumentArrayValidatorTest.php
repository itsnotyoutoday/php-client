<?php
namespace BlockCypher\Test\Validation;

use BlockCypher\Validation\ArgumentArrayValidator;

class ArgumentArrayValidatorTest extends \PHPUnit\Framework\TestCase
{

    public static function positiveProvider()
    {
        return array(
            array(array()),
            array(array('text')),
            array(array(1)),
            array(array(1.0)),
            array(array(true))
        );
    }

    public static function invalidProvider()
    {
        return array(
            array(null),
            array(''),
            array('     '),
            array(1),
            array(1.0),
            array(true),
            array(array(null)),
            array(array('')),
            array(array('     '))
        );
    }

    /**
     *
     * @dataProvider positiveProvider
     */
    public function testValidate($input)
    {
        $this->assertTrue(ArgumentArrayValidator::validate($input, "Name"));
    }

    /**
     *
     * @dataProvider invalidProvider
     */
    public function testInvalidDataValidate($input)
    {
        $this->expectException('\InvalidArgumentException');
        $this->assertTrue(ArgumentArrayValidator::validate($input, "Name"));
    }

}
