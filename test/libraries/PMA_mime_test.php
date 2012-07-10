<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * tests for mime.lib.php
 *
 * @package PhpMyAdmin-test
 */

/*
 * Include to test.
 */

require_once 'libraries/mime.lib.php';

class PMA_mime_test extends PHPUnit_Framework_TestCase
{
    /**
     * Test for PMA_detectMIME
     * @param string $test
     * @param $output
     *
     * @dataProvider providerForTestPMA_detectMIME
     */
    public function testPMA_detectMIME($test, $output){

        $this->assertEquals(
            PMA_detectMIME($test),
            $output
        );
    }

    /**
     * Provider for testPMA_detectMIME
     */
    public function providerForTestPMA_detectMIME(){
        return array(
            array(
                'pma',
                'application/octet-stream'
            ),
            array(
                'GIF',
                'image/gif'
            ),
            array(
                "\x89PNG",
                'image/png'
            ),
            array(
                chr(0xff).chr(0xd8),
                'image/jpeg'
            ),
        );
    }
}
