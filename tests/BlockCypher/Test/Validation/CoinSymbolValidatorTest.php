<?php
namespace BlockCypher\Test\Validation;

use BlockCypher\Core\BlockCypherCoinSymbolConstants;
use BlockCypher\Validation\CoinSymbolValidator;

class CoinSymbolValidatorTest extends \PHPUnit\Framework\TestCase
{

    public static function positiveProvider()
    {
        BlockCypherCoinSymbolConstants::COIN_SYMBOL_LIST();

        $positiveValues = array();
        foreach (BlockCypherCoinSymbolConstants::COIN_SYMBOL_LIST() as $coinSymbol) {
            $positiveValues[] = array($coinSymbol);
        }

        return $positiveValues;
    }

    public static function invalidProvider()
    {
        return array(
            array(null),
            array(''),
            array('     '),
            array('INVALID COIN SYMBOL'),
            array(1),
            array(1.0),
            array(true)
        );
    }

    /**
     *
     * @dataProvider positiveProvider
     */
    public function testValidate($input)
    {
        $this->assertTrue(CoinSymbolValidator::validate($input, "Name"));
    }

    /**
     *
     * @dataProvider invalidProvider
     */
    public function testInvalidDataValidate($input)
    {
        $this->expectException('\InvalidArgumentException');
        $this->assertTrue(CoinSymbolValidator::validate($input, "Name"));
    }

}
