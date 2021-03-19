<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class profilePushTest extends TestCase
{
    public function testPush(): void
    {
        include 'updateProfile.php';
        
        //Testing name validation
        $result1 = updateProfile("tester", "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "123 Testing st", "APT 101", "Houston", "TX", "77777");
        $this->assertEquals($result1, 2);

        //Testing address 1 validation
        $result2 = updateProfile("tester", "Testing Man",
         "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "APT 101", "Houston", "TX", "77777");
        $this->assertEquals($result2, 2);

        //Testing address 2 validation
        $result3 = updateProfile("tester", "Testing Man", "123 Testing st",
         "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "Houston", "TX", "77777");
         $this->assertEquals($result3, 2);

        //Testing city validation
        $result4 = updateProfile("tester", "Testing Man", "123 Testing st",
        "APT 101", "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "TX", "77777");
        $this->assertEquals($result4, 2);

        //Testing state validation
        $result5 = updateProfile("tester", "Testing Man", "123 Testing st", "APT 101", "Houston", "aaa", "77777");
        $this->assertEquals($result5, 2);

        //Testing zip lower limit validation
        $result6 = updateProfile("tester", "Testing Man", "123 Testing st", "APT 101", "Houston", "TX", "aaaa");
        $this->assertEquals($result6, 2);
        
        //Testing zip upper limit validation
        $result7 = updateProfile("tester", "Testing Man", "123 Testing st", "APT 101", "Houston", "TX", "aaaaaaaaaa");
        $this->assertEquals($result7, 2);

        //Testing successfull update
        $result8 = updateProfile("tester", "Testing Man", "123 Testing st", "APT 101", "Houston", "TX", "77777");
        $this->assertEquals($result8, 1);
    }
} 