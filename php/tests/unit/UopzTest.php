<?php
namespace Test;

class UopzTest extends \PHPUnit\Framework\TestCase
{
    public function setUp(): void {
        // Disable functions declared in previous testing class
        \uopz_set_return('App\time', function() {
            return time();
        }, true);
    }

    public function testGlobal()
    {
        // Override global function
        \uopz_set_return('getTrue', false);
        $this->assertFalse(\getTrue());

        \uopz_unset_return('getTrue');
        $this->assertTrue(\getTrue());


        // Override specific static method of global class
        \uopz_set_return('StaticExample', 'intval', function($value) {
            return $value;
        }, true);
        $this->assertSame('1234test', \StaticExample::intval('1234test'));

        \uopz_unset_return('StaticExample', 'intval');
        $this->assertSame(1234, \StaticExample::intval('1234test'));


        // Override constant
        $originalGlobalConst = GLOBAL_CONSTANT;
        \uopz_redefine('GLOBAL_CONSTANT', 'override');
        $this->assertSame('override', GLOBAL_CONSTANT);
        $this->assertSame('override', \getGlobalConstant());

        \uopz_redefine('GLOBAL_CONSTANT', $originalGlobalConst);
        $this->assertSame($originalGlobalConst, GLOBAL_CONSTANT);
        $this->assertSame($originalGlobalConst, \getGlobalConstant());

        // Override class constant
        $originalGlobalConst = \StaticExample::TEXT;
        \uopz_redefine('StaticExample', 'TEXT', 'override');
        $this->assertSame('override', \StaticExample::TEXT);

        \uopz_redefine('StaticExample', 'TEXT', $originalGlobalConst);
        $this->assertSame($originalGlobalConst, \StaticExample::TEXT);


        // Override class instance by mock object
        uopz_set_mock('InstanceExample', new class() extends \InstanceExample {
            protected $text = 'hello';
            public function getString() {
                return "{$this->text} world";
            }
        });
        $this->assertSame('hello world', (new \InstanceExample())->getString());

        uopz_unset_mock('InstanceExample');
        $this->assertSame('test', (new \InstanceExample())->getString());
    }

    public function testAppUtils()
    {
        // Override specific static method
        \uopz_set_return('App\Utils', 'getTrue', false);
        $this->assertFalse(\App\Utils::getTrue());

        \uopz_unset_return('App\Utils', 'getTrue');
        $this->assertTrue(\App\Utils::getTrue());


        // Override built-in function which is called from static method
        $staticTime = 1234567890;
        \uopz_set_return('time', function() use($staticTime) {
            return $staticTime;
        }, true);
        $this->assertSame($staticTime, \App\Utils::getTime());

        \uopz_unset_return('time');
        $this->assertNotSame($staticTime, \App\Utils::getTime());
    }
}
