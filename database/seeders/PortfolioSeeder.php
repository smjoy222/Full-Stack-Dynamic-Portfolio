<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PersonalDetail;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Achievement;
use App\Models\Info;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a sample user
        $user = User::create([
            'name' => 'SM Joy',
            'email' => 'smjoy222@gmail.com',
            'phone' => '+8801234567890',
            'student_id' => 'CSE2021001',
            'password' => bcrypt('password'),
        ]);

        // Create personal details
        PersonalDetail::create([
            'user_id' => $user->id,
            'description' => 'I am a passionate web developer with expertise in modern web technologies.',
            'blood_group' => 'A+',
            'department' => 'Computer Science & Engineering',
            'age' => 22,
            'dob' => '2002-01-15',
            'address' => 'Dhaka, Bangladesh',
            'gender' => 'male',
        ]);

        // Create projects
        Project::create([
            'user_id' => $user->id,
            'name' => 'E-commerce Website',
            'description' => 'A full-stack e-commerce platform built with Laravel and Vue.js',
            'github_url' => 'https://github.com/smjoy222/ecommerce',
            'demo_url' => 'https://demo.example.com',
            'images' => ['project1.jpg', 'project1-2.jpg'],
            'type' => 'academic',
            'tools' => ['Laravel', 'Vue.js', 'MySQL', 'Bootstrap'],
            'keywords' => ['ecommerce', 'web', 'laravel'],
            'status' => 'active',
        ]);

        Project::create([
            'user_id' => $user->id,
            'name' => 'Portfolio Website',
            'description' => 'Personal portfolio website showcasing projects and skills',
            'github_url' => 'https://github.com/smjoy222/portfolio',
            'type' => 'personal',
            'tools' => ['HTML', 'CSS', 'JavaScript', 'Laravel'],
            'status' => 'active',
        ]);

        // Create skills
        $skills = [
            ['name' => 'Laravel', 'type' => 'technical', 'level' => 'expert'],
            ['name' => 'PHP', 'type' => 'technical', 'level' => 'expert'],
            ['name' => 'JavaScript', 'type' => 'technical', 'level' => 'intermediate'],
            ['name' => 'Vue.js', 'type' => 'technical', 'level' => 'intermediate'],
            ['name' => 'MySQL', 'type' => 'technical', 'level' => 'expert'],
            ['name' => 'HTML/CSS', 'type' => 'technical', 'level' => 'expert'],
            ['name' => 'Communication', 'type' => 'soft', 'level' => 'expert'],
            ['name' => 'Team Work', 'type' => 'soft', 'level' => 'expert'],
        ];

        foreach ($skills as $skill) {
            Skill::create(array_merge($skill, ['user_id' => $user->id]));
        }

        // Create education
        Education::create([
            'user_id' => $user->id,
            'type' => 'BSc',
            'name' => 'Computer Science & Engineering',
            'institute' => 'University of Dhaka',
            'enrolled_year' => 2021,
            'passing_year' => 2025,
            'grade' => '3.85',
        ]);

        Education::create([
            'user_id' => $user->id,
            'type' => 'HSC',
            'name' => 'Science',
            'institute' => 'Dhaka College',
            'enrolled_year' => 2018,
            'passing_year' => 2020,
            'grade' => 'A+',
        ]);

        // Create experiences
        Experience::create([
            'user_id' => $user->id,
            'type' => 'internship',
            'designation' => 'Web Developer Intern',
            'organization' => 'Tech Solutions Ltd.',
            'from_date' => '2024-01-01',
            'to_date' => '2024-06-30',
        ]);

        // Create achievements
        Achievement::create([
            'user_id' => $user->id,
            'name' => 'Best Project Award',
            'type' => 'award',
            'organization' => 'University of Dhaka',
            'date' => '2024-05-15',
            'category' => 'academic',
        ]);

        // Create info
        Info::create([
            'user_id' => $user->id,
            'portfolio' => 'https://smjoy.dev',
            'address' => 'Dhaka, Bangladesh',
            'description' => 'Full-stack web developer passionate about creating amazing digital experiences.',
            'designation' => 'Web Developer',
        ]);
    }
}
