<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = rtrim($this->faker->sentence(rand(5, 7), true), '.');
        $datetime = $this->faker->dateTimeBetween('-1 month', 'now');

        $content = '';
        for ($i=0; $i < 5; $i++) { 
            $content .= '<p class="mb-4">'. $this->faker->sentences(rand(5, 10), true) .'</p>'; //true -> return those sentences as a single string instead of an array
            //content will be saved in the DB as HTML, later on when someone creates a post they'll be using markdown which will end up generating HTML
        }

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . rand(1111, 9999),
            'company' => $this->faker->company,
            'location' => $this->faker->country,
            'logo' => basename($this->faker->image(storage_path('app/public'))),
            'is_highlighted' => (rand(1, 9) > 7),
            'is_active' => true,
            'content' => $content,
            'apply_link' => $this->faker->url,
            'created_at' => $datetime,
            'updated_at' => $datetime,
        ];
    }
}
