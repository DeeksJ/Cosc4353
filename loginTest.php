<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;



final class loginTest extends TestCase
{
    public function testPush(): void
    {
        include 'loginUser.php';
        //testing username length
        $result = loginUser("1234567891012134", "123");
        $this->assertEquals($result,1);
        //testing password length 
        $result = loginUser("testtt", "12345678910111274");
        $this->assertEquals($result,2);
        //testing username invalid
        $result = loginUser("123", "testPass");
        $this->assertEquals($result,3);
         //testing password invalid
        $result = loginUser("testU", "test");
        $this->assertEquals($result,3);
        //perfect login
        $result = loginUser("testU", "testpass");
        $this->assertEquals($result,4);
		echo $result;
    }
}