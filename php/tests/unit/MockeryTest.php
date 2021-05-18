<?php

namespace Test;
use App;
use Mockery;

class MockeryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testAppExampleObjectInstanceMock()
    {
        $childObject = Mockery::mock('App\ExampleObject')->makePartial();
        $childObject->shouldReceive('getTimeWithYmdhisFormat')->andReturn(date('Y-m-d H:i:s', \strtotime('2021-01-01')));
        $object = new App\ExampleObject('root', $childObject);

        $this->assertEquals('2021-01-01 00:00:00', $object->getChild()->getTimeWithYmdhisFormat());

        // Make a mock having static method using alias prefix
        // It can work only when original class will be loaded by composer autoloader.
        // If the class already loaded via require_once function, it will ends with fatal error:
        // require_once(__DIR__.'/../../src/App/Utils.php');
        $staticUtilsMock = \Mockery::mock("alias:App\Utils");
        $staticUtilsMock->shouldReceive('getTime')->andReturn(strtotime('2021-12-31 23:59:59'));
        $object = new App\ExampleObject('root');

        $this->assertEquals('2021-12-31 23:59:59', $object->getTimeWithYmdhisFormat());
    }
}
