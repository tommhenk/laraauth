<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $inc = 0;
    
    public function definition()
    {   
        $roles = ['admin', 'moderator', 'guest'];
        // dump($roles[$this->count++]);
        $counter = $this->inc++;
        return [
            'name'=>$roles[$counter],
        ];
    }
}
