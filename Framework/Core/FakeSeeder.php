<?php

namespace Jarvis\Core;

use Faker\Factory;

class FakeSeeder extends Factory
{
    private $faker;
    public function __construct(string $locale)
    {
        $this->faker = parent::create($locale);
    }
}
