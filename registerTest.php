<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;



final class registerTest extends TestCase
{
    public function testPush(): void
    {
        include 'registerUser.php';
		//testing username length
        $result = registerUser("1234567891012134", "123");
        $this->assertEquals(1, $result);
		//testing password length 
        $result = registerUser("123", "12345678910111274");
        $this->assertEquals(1, $result);
		//testing username invalid
        $result = registerUser("123", "Hello");
        $this->assertEquals(2, $result);
        //successful registration
        $result = registerUser("4321", "Hello");
        $this->assertEquals(3, $result);
        	
        
        echo $result;
    }
}