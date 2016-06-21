<?php

namespace spec\m1n0;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JSONRotatorIterativeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('m1n0\JSONRotatorIterative');
    }

    function it_rotates_json()
    {
        $input = [
            ["name" => "Jeffrey Scott", "company" => "Rhyloo", "country" => "Indonesia"],
            ["name" => "Robert Hayes", "company" => "Roodel", "country" => "Brazil"],
            ["name" => "Juan Wells", "company" => "Jabberstorm", "country" => "Cape Verde"],
        ];

        $output = [
            'name' => ['Jeffrey Scott', 'Robert Hayes', 'Juan Wells'],
            'company' => ['Rhyloo', 'Roodel', 'Jabberstorm'],
            'country' => ['Indonesia', 'Brazil', 'Cape Verde'],
        ];

        $this->rotate($input)->shouldReturn($output);
    }
}
