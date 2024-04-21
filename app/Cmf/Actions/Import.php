<?php

namespace App\Cmf\Actions;

use App\Cmf\Meta\ImportMeta;
use App\Models\Project;
use App\Models\Row;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use ReinVanOyen\Cmf\Action\Edit;
use ReinVanOyen\Cmf\Components\EnumField;
use ReinVanOyen\Cmf\Components\TextField;

class Import extends Edit
{
    public function __construct()
    {
        $projectModels = Project::all();
        $projects = [];
        foreach ($projectModels as $project) {
            $projects[$project->id] = $project->title;
        }

        parent::__construct(ImportMeta::class, [
            EnumField::make('project', $projects),
            TextField::make('rows')->label('Brijtjes')->multiline(),
        ]);
    }

    /**
     * @param Request $request
     * @return array|JsonResource|mixed|\ReinVanOyen\Cmf\Http\Resources\ModelResource
     */
    public function apiLoad(Request $request)
    {
        return JsonResource::make([]);
    }

    /**
     * @param Request $request
     * @return array|JsonResource|mixed|\ReinVanOyen\Cmf\Http\Resources\ModelResource
     */
    public function apiSave(Request $request)
    {
        $data = $request->all([
            'project',
            'rows'
        ]);

        $project = Project::findOrFail($data['project']);

        foreach ($project->rows as $row) {
            $row->delete();
        }

        $rows = explode("\n", $data['rows']);

        foreach ($rows as $index => $row) {
            $newRow = new Row();
            $newRow->order = $index;
            $newRow->text = $row;
            $newRow->type = 'row';
            $newRow->project_id = $project->id;
            $newRow->save();
        }


        return JsonResource::make([
            'id' => null,
        ]);
    }
}
