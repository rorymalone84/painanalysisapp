<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PainAnalysis>
 */
class PainAnalysisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        static $id_increment = 1;

        if($id_increment === 103){
            $id_increment = 1;
        }
        
        return [
            'question_1' => $this->faker->randomElement(['Aching', 'Throbbing', 'Shooting','Stabbing','Tender','Burning','Tiring','Numb']),
            'question_2' => $this->faker->randomElement(['Fore Head', 'Left Temple', 'Right Temple', 'Throat', 'Right Shoulder, Chest, Left Shoulder', 'Stomach']),
            'question_3' => $this->faker->randomElement(['Morning','Afternoon', 'Night', 'It varies']),
            'question_4' => $this->faker->numberBetween(1, 10),
            'question_5' => $this->faker->numberBetween(1, 10),
            'question_6' => $this->faker->numberBetween(1, 10),
            'question_7' => $this->faker->numberBetween(1, 10),
            'question_8' => $this->faker->numberBetween(1, 10),
            'question_9' => $this->faker->randomElement(['Fentanyl', 'Morphine', 'Codeine', 'Hydrocone', 'Paracetomol','None', 'Hydrocone']),
            'question_10' => $this->faker->numberBetween(1, 10),
            'question_11' => $this->faker->numberBetween(1, 10),
            'question_12' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numerify($id_increment++),
            'created_at' => now(),
        ];
    }
}