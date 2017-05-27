<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Use the classes you want to access by name throughout the controller here
use App\Models\Template;
use App\Models\Field;

use App\Http\Requests\TemplateRequest;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get a list of all templates in the system
        // $templates = Template::all();

        // Paginate A list of all templates in the system
        $templates = Template::paginate(10);

        
        // Alternatively you can specify class pathing directly when used
        /*
            $templates = \App\Models\Template::all();
        */

        // return view('template.index', [ 'templates' => $templates ]);

        //alternate
        return view('template.index')->with('templates', $templates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemplateRequest $request)
    {
        try {
            $template = Template::findOrfail($id);
        }
        catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            abort(404, 'The resource you are looking for could not be found');
        }

        $data = [
            'title' =>   $request->get('title'),
            'description' =>   $request->get('description'),
        ];
        $template->create($data);

        //interpret JSON data and build fields
        $JSON = json_decode($request->get('json'), true);

        $this->createFields($template->id, $JSON);

        return redirect()->action('TemplateController@index')->with("flash", "Success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get a list of all templates in the system
        $template = Template::find($id);

        // Paginate A list of all templates in the system
        /*
        try {
            $template = Template::findOrFail($id);
        } 
        catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return [ 'code'=>404, 'error'=>'Template Not Found' ];
        }
        */

        return $template;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $template = Template::findOrfail($id);
        }
        catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            abort(404, 'The resource you are looking for could not be found');
        }

        return view('template.edit', [ 'template' => $template ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TemplateRequest $request, $id)
    {
        try {
            $template = Template::findOrfail($id);
        }
        catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            abort(404, 'The resource you are looking for could not be found');
        }

        $data = [
            'title' =>   $request->get('title'),
            'description' =>   $request->get('description'),
        ];
        $template->update($data);

        //interpret JSON data and build fields
        $JSON = json_decode($request->get('json'), true);

        // Hacky As balls DONT NE DO THIS YA FOCK
        // $template->fields()->update(['parent_id' => null]);
        
        $template->fields()->delete();

        $this->createFields($template->id, $JSON);

        return redirect()->action('TemplateController@index')->with("flash", "Success");
    }

    private function createFields($t_id, $object, $parent_id = null) {
        foreach($object as $key => $item)
        {
            $data = [
                'title' => $key,
                'template_id'   =>  $t_id, 
            ];
            if($parent_id != null) {
                $data['parent_id'] = $parent_id;
            }

            $field = Field::create($data);
            if($item != null)
            {
                $this->createFields($t_id, $item, $field->id);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
