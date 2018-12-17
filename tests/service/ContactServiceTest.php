<?php

require_once __DIR__ . '/../../src/service/ContactService.php';
require_once __DIR__ . '/../../vendor/phpunit/phpunit/src/Framework/TestCase.php';

/**
 * Class ContactServiceTest
 * @testdox Contact Service
 */
class ContactServiceTest extends \PHPUnit\Framework\TestCase
{
    /** @var ContactService */
    private $contactService;


    protected function setUp()
    {
        $this->contactService = new ContactService();
    }

    /**
     * @test
     */
    public function isPalindromeTrue(){
        $result = $this->contactService->isPalindrome('TOTOT');
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function isPalindromeFalse(){
        $result = $this->contactService->isPalindrome('LEBONCOIN');
        $this->assertFalse($result);
    }

    protected function tearDown()
    {
        unset($this->contactService);
    }

}