<?php

namespace Test;
use App;

class PHPUnitTest extends \PHPUnit\Framework\TestCase
{
    public function testAppExampleObjectInstanceMock()
    {
        $childObjectMock = $this->getMockBuilder(App\ExampleObject::class)
            // ->disableOriginalConstructor()
            ->setConstructorArgs(['childMock'])
            ->setMethods(['getTimeWithYmdhisFormat'])
            ->getMock();
        $childObjectMock
            ->method('getTimeWithYmdhisFormat')
            ->willReturn(date('Y-m-d H:i:s', \strtotime('2021-01-01')));

        $object = new App\ExampleObject('root', $childObjectMock);

        $this->assertEquals('2021-01-01 00:00:00', $object->getChild()->getTimeWithYmdhisFormat());
    }
}
