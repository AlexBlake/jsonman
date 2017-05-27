<?php

use Illuminate\Database\Seeder;

use App\Models\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($itt = 1; $itt < 100; $itt++)
    	{
			Template::create([
				'title'	=>	'Template '.$itt,
				'description'	=>	'Template '.$itt.' Description'
			]);        
    	}
    }
}
