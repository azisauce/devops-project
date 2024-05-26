<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       $titles = [
            'Complete the Web Development Project',
            'Prepare for the Database Management Exam',
            'Develop a Mobile App',
            'Research on AI and Machine Learning',
            'Set Up a CI/CD Pipeline'
        ];

        $slugs = [
            'complete-the-web-development-project',
            'prepare-for-the-database-management-exam',
            'develop-a-mobile-app',
            'research-on-ai-and-machine-learning',
            'set-up-a-cicd-pipeline'
        ];

        $descriptions = [
            'Finish the web development project assigned for the course, ensuring all requirements are met.',
            'Study for the upcoming database management exam, focusing on SQL queries and normalization.',
            'Create a mobile application as part of the coursework, including UI/UX design and functionality.',
            'Conduct research on the latest trends in AI and machine learning, and prepare a presentation.',
            'Configure and set up a continuous integration and continuous deployment pipeline using Jenkins.'
        ];

        $index = $this->faker->numberBetween(0, count($titles) - 1);

        return [
            'title' => $titles[$index],
            'slug' => $slugs[$index],
            'description' => $descriptions[$index],
            'due' => $this->faker->dateTimeBetween('now','1 year'),
            'completed' => false
        ];
    }
}
