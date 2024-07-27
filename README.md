## Fitness Application

A fitness application that allows users to create an account, log in, and track their fitness progress. Users can log their workouts, track their progress, and set goals for themselves. The application allows users to create meals and input their macro nutrients along with the calories for each meal that they can then track and monitor their intake. 

## Features 
- User Authentication - [ x ]
- User Profile - [ x ]
- Workout Plans - [ x ]
- Create individual exercises to add to workout plans - [ x ]
- Meal tracking - [ x ]
- Progress Tracking - [ x ]
- Goal Setting
- Macro Nutrient Tracking - [ x ]
- Calorie Tracking - [ x ]
- Automated Calculations for Caloric Intake through BMR and TDEE  - [  ] (Partially integrated)

## Technologies
- Laravel 11
- Vue.js 3
- MySQL
- Bootstrap
- PHP 8+

## Installation
1. Clone the repository
2. Run `composer install`
3. Run `npm install`
4. Run `npm run dev`
5. Create a `.env` file and copy the contents of `.env.example` into it
6. Run `php artisan key:generate`
7. Set up your database in the `.env` file
8. Run `php artisan migrate`
9. Run `php artisan db:seed`
10. Run `php artisan serve`
11. Visit `localhost:8000` in your browser

## Future Features
- Improvements to individual workout page, including a timer and button that allows you to start and stop the workout
- Tracking Water and caffeine intake
- Integrate an exercises API to allow users to search for exercises and add them to their workout plans that will also have video demonstrations.
- Integrate a food API to allow users to search for foods and add them to their meals that will also have the macro nutrients and calories for each food item.
- UI/UX improvements to the application and phase out the use of bootstrap for a more custom design.
