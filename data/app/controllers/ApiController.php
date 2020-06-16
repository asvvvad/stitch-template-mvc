<?php

/**
 * Controller for API routes
 */
class ApiController
{
    /**
     * version returns the service version
     *
     * @return array
     **/
    static public function version() : array
    {
        return ['body' => ['success' => true, 'version' => 'v0.1']];
    }
}
