<?php
class ModHelloWorldHelper
{
    /**
     * Retrieves the hello message
     *
     * @param   array  $params An object containing the module parameters
     *
     * @access public
     * @return String
     */
    public static function getHello($params)
    {
        return 'Hello, World!';
    }
}