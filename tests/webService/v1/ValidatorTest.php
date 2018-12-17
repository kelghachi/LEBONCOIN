<?php

require_once __DIR__ . '/../../../src/webService/v1/Validator.php';
require_once __DIR__ . '/../../../vendor/phpunit/phpunit/src/Framework/TestCase.php';

/**
 * Class ValidatorTest
 *
 * @testdox The WS Validator
 *
 */
class ValidatorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Validator
     */
    private $validator;

    protected function setUp()
    {
        $this->validator = new Validator();
    }

    /**
     * Tests the correct email address case
     * @return void
     *
     * @test
     */
    public function validateEmailCorrect()
    {
        $result = $this->validator->validateEmail('GET', 'kamal.elghachi@leboncoin.fr');
        $expected = [
            'status' => 200,
            'body' => "Cette (kamal.elghachi@leboncoin.fr) adresse email est considérée comme valide."
        ];
        $this->assertTrue($result === $expected);
        $this->assertEquals($result, $expected);
    }

    /**
     * Tests if the email address is not correct case
     *
     * @return void
     *
     * @test
     */
    public function validateEmailWrong()
    {
        $result = $this->validator->validateEmail('GET', 'kamal.elghachi@leboncoin');
        $expected = [
            'status' => 202,
            'body' => "Cette adresse email (kamal.elghachi@leboncoin) n'est pas valide."
        ];
        $this->assertTrue($result === $expected);
        $this->assertEquals($result, $expected);
    }

    /**
     * Tests if the email address is not sent to the WS case
     *
     * @return void
     *
     * @test
     */
    public function validateEmailNotSent()
    {
        $result = $this->validator->validateEmail('GET', '');
        $expected = [
            'status' => 204,
            'body' => "No email address to validate"
        ];
        $this->assertTrue($result === $expected);
        $this->assertEquals($result, $expected);
    }

    /**
     * Tests the method not allowed case
     *
     * @return void
     *
     * @test
     */
    public function validateEmailNotAllowedMethod()
    {
        $result = $this->validator->validateEmail('POST', 'kamal.elghachi@leboncoin.fr');
        $expected = [
            'status' => 405,
            'body' => "Method Not Allowed (Only GET)"
        ];
        $this->assertTrue($result === $expected);
        $this->assertEquals($result, $expected);
    }

    protected function tearDown()
    {
        unset($this->validator);
    }
}