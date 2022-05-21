<?php

namespace SpiderKata\Test;

use PHPUnit\Framework\TestCase;
use SpiderKata\Coordinate;
use SpiderKata\Spider;
use SpiderKata\SpiderWeb;

class SpiderTest extends TestCase
{
    public function moveProvider(): iterable
    {
        yield "should_move_up_given_W" => [
            'W',
            new Coordinate(0,0),
            new Coordinate(0,1)
        ];
        yield "should_move_right_given_D" => [
            'D',
            new Coordinate(0,0),
            new Coordinate(1,0)
        ];
        yield "should_move_down_given_S" => [
            'S',
            new Coordinate(1,1),
            new Coordinate(1,0)
        ];
        yield "should_move_left_given_A" => [
            'a',
            new Coordinate(1,1),
            new Coordinate(0,1)
        ];
    }

    /**
     * @test
     * @dataProvider moveProvider
     */
    public function should_move_to_right_place_given_command(string $moveCommand, Coordinate $startCoordinate, Coordinate $expectedCoordinate)
    {
        $spiderWeb = new SpiderWeb();
        $spider = new Spider($startCoordinate);
        $spider->move($moveCommand, $spiderWeb);
        self::assertTrue($spider->coordinate()->equals($expectedCoordinate));
    }

    /** @test */
    public function should_can_not_move_out_of_spider_web_limits()
    {
        self::expectException(\InvalidArgumentException::class);
        $spiderWeb = new SpiderWeb();
        $coordinate = new Coordinate(4,1);
        $spider = new Spider($coordinate);
        $spider->move('d', $spiderWeb);
    }

    /** @test */
    public function should_can_not_move_out_of_spider_web_up_limits()
    {
        self::expectException(\InvalidArgumentException::class);
        $spiderWeb = new SpiderWeb();
        $coordinate = new Coordinate(4,4);
        $spider = new Spider($coordinate);
        $spider->move('w', $spiderWeb);
    }
}
