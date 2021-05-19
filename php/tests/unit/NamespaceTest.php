<?php
/**
 * Overriding declared global function using namespace.
 * It can only be used when:
 *     - the target class belongs to some namespace
 *     - the target class does not call the function without global namespace. (example: not `\time()` but `time()`) 
 */

namespace App {
    function time() {
        return 1234567890;
    }
}
namespace Test {
    use App;
    class NamespaceTest extends \PHPUnit\Framework\TestCase
    {
        public function testNamespace()
        {
            $time = App\Utils::getTime();
            $this->assertEquals(1234567890, $time);
        }
    }
};
