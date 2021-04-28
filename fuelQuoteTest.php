<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class Test extends TestCase
{
    public function testPush(): void
    {
        include 'submitQuote.php';
        $result = submitQuote(123, "","","","","");
        $this->assertEquals(1, $result);
        $result = submitQuote(123,"word",3,03/18/2021,3,9);
        $this->assertEquals(1, $result);
        $result = submitQuote(123,3,"word",03/18/2021,3,9);
        $this->assertEquals(1, $result);
        $result = submitQuote(123,3,3,"",3,9);
        $this->assertEquals(1, $result);
        $result = submitQuote(123,3,3,03/18/2021,"",9);
        $this->assertEquals(1, $result);
        $result = submitQuote(123,3,3,03/18/2021,9,"");
        $this->assertEquals(1, $result);
        $result = submitQuote(123,3,3,"03/18/2021",3,9);
        $this->assertEquals(0, $result);
        echo $result;
    }
}