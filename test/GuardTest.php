<?php
require_once '../vendor/autoload.php';
use Uzulla\Guard as Guard;

class GuardTest extends PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
    }

    public static function tearDownAfterClass()
    {
    }

    public function testCwd()
    {
        chdir('/usr');
        $olddir = getcwd();

        $newdir = call_user_func(function(){
            $g = new Guard(function(){
                chdir('/usr');
            });
            chdir('/');
            $newdir = getcwd();
            return $newdir;
        });

        $this->assertEquals('/usr', $olddir);
        $this->assertEquals('/', $newdir);
        $this->assertEquals('/usr', getcwd());
    }

}
