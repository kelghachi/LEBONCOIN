<?php

require_once __DIR__ . '/Helper.php';
require_once __DIR__ . '/../../../src/service/Logger.php';

/**
 * Class Validator
 */
class Validator
{
    private $logger;

    /**
     * Validator constructor.
     */
    public function __construct()
    {
        $this->logger = new Logger();
    }


    public function validateEmail(string $method, string $email): array
    {
        try {
            if (Helper::GET === $method) {
                if ($email) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $statusCode = 200;
                        $resultContent = "Cette (" . $email . ") adresse email est considérée comme valide.";
                    } else {
                        $statusCode = 202;
                        $resultContent = "Cette adresse email (" . $email . ") n'est pas valide.";
                    }
                } else {
                    $statusCode = 204;
                    $resultContent = 'No email address to validate';
                }
            } else {
                $statusCode = 405;
                $resultContent = 'Method Not Allowed (Only GET)';
            }
        } catch (Exception $exception) {
            $statusCode = 500;
            $resultContent = 'Error occurred while processing you request';
            $this->logger->log($exception->getMessage() . '--' . $resultContent, Logger::$ERROR);
        }

        return [
            'status' => $statusCode,
            'body' => $resultContent
        ];
    }
}