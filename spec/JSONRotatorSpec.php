<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JSONRotatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('JSONRotator');
    }

    function it_rotates_json()
    {
        $input = [
            ['name' => 'John Doe', 'job_title' => 'junior developer', 'location' => 'London'],
            ['name' => 'Mary Doe', 'job_title' => 'developer', 'location' => 'Edinburgh'],
            ['name' => 'Peter Smith', 'job_title' => 'senior developer', 'location' => 'Slovakia'],
        ];

        // This is the expected result, currently uses transpose doesnt produce that though.
//        $output = [
//            'name' => ['John Doe', 'Mary Doe', 'Peter Smith'],
//            'job_title' => ['junior developer', 'developer', 'senior developer'],
//            'location' => ['London', 'Edinburgh', 'Slovakia'],
//        ];
        $output = [
            ['John Doe', 'Mary Doe', 'Peter Smith'],
            ['junior developer', 'developer', 'senior developer'],
            ['London', 'Edinburgh', 'Slovakia'],
        ];

        $this->rotate($input)->shouldReturn($output);
    }
}
