<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;



final class loginTest extends TestCase
{
    public function testPush(): void
    {
        include 'loginUser.php';
        //testing username length
        $result = loginUser("1234567891012134", "123");
        $this->assertEquals(1, $result);
        //testing password length 
        $result = loginUser("testtt", "12345678910111274");
        $this->assertEquals(2, $result);
        //testing username invalid
        $result = loginUser("123", "testPass");
        $this->assertEquals(3, $result);
         //testing password invalid
        $result = loginUser("testU", "test");
        $this->assertEquals(3, $result);
        //perfect login
        $result = loginUser("testU", "testpass");
        $this->assertEquals(4, $result);
		echo $result;
    }
}