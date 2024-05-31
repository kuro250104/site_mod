<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreValidatedHourRequest;
use App\Http\Requests\UpdateValidatedHourRequest;
use App\Models\Hour;
use App\Models\Projects;
use App\Models\Stages;
use App\Models\Subtask;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use App\Models\ValidatedHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ValidatedHourController extends Controller
{

    public function home()
    {

        $teams = Team::all();
        $stages = Stages::all();
        $projects = Projects::all();
        $tasks = Task::all();
        $hours = Hour::all();
        $subtasks = Subtask::all();
        $user = Auth::user();
        if($user->can('user_manage',)){

            $valid_hours = ValidatedHour::paginate(50);
        }
        else if($user->can('finance_manage',)){

        $valid_hours = ValidatedHour::paginate(50);
        }
        else{
            $valid_hours = ValidatedHour::where('user_id', $user->id)->get();
        }
        return view('validated_hour.index', compact('valid_hours', 'projects','user', 'teams', 'stages', 'tasks', 'hours', 'subtasks'));
    }


    public function index()
    {
        $user = Auth::user();
        $valid_hours = ValidatedHour::where('user_id', $user->id)->get();

        return view('validated_hour.index', ['valid_hours'=> $valid_hours]);
    }
    public function store(StoreValidatedHourRequest $request)
    {

        ValidatedHour::create($request->validated());
//        dd($request->all());
        return redirect()->route('validated_hour.index');
    }
    public function edit( int $validHoursId)
    {
        $valid_hours = ValidatedHour::find($validHoursId);

        $teams = Team::all();
        $users = User::all();
        $stages = Stages::all();
        $projects = Projects::all();
        $tasks = Task::all();
        $hours = Hour::all();
        $subtasks = Subtask::all();



        return view('validated_hour.edit', compact('valid_hours', 'projects', 'teams', 'users', 'stages', 'tasks', 'hours', 'subtasks'));
    }

    public function update(UpdateValidatedHourRequest $request, int $valid_hour)
    {
        ValidatedHour::findOrFail($valid_hour)->update($request->validated());

        return redirect()->route("validated_hour.index");
    }

    public function destroy($valid_hours)
    {
        ValidatedHour::destroy($valid_hours);

        return redirect()->route("validated_hour.index");
    }
    public function exportToExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(30);
        $sheet->getColumnDimension('G')->setWidth(30);
        $sheet->getColumnDimension('H')->setWidth(30);
        $sheet->getColumnDimension('I')->setWidth(30);
        $sheet->getColumnDimension('J')->setWidth(30);
        $sheet->getColumnDimension('K')->setWidth(30);
        $sheet->getColumnDimension('L')->setWidth(30);
        $sheet->getColumnDimension('M')->setWidth(30);
        $sheet->getColumnDimension('N')->setWidth(30);
        $sheet->getColumnDimension('O')->setWidth(30);
        $sheet->getColumnDimension('P')->setWidth(30);
        $sheet->getColumnDimension('Q')->setWidth(30);
        $sheet->getColumnDimension('R')->setWidth(30);
        $sheet->getColumnDimension('T')->setWidth(30);
        $sheet->getColumnDimension('U')->setWidth(30);
        $sheet->getColumnDimension('V')->setWidth(30);
        $sheet->getColumnDimension('W')->setWidth(30);
        $sheet->getColumnDimension('X')->setWidth(30);
        $sheet->getColumnDimension('Y')->setWidth(30);
        $sheet->getColumnDimension('Z')->setWidth(30);
        $sheet->getColumnDimension('AA')->setWidth(30);
        $sheet->getColumnDimension('AB')->setWidth(30);
        $sheet->getColumnDimension('AC')->setWidth(30);
        $sheet->getColumnDimension('AD')->setWidth(30);
        $sheet->getColumnDimension('AE')->setWidth(30);
        $sheet->getColumnDimension('AF')->setWidth(30);
        $sheet->getColumnDimension('AG')->setWidth(30);
        $sheet->getColumnDimension('AH')->setWidth(30);
        // Add header row
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'User ID');
        $sheet->setCellValue('C1', 'Hours');
        $sheet->setCellValue('D1', 'Date');

        // Add data rows
        $valid_hours = ValidatedHour::all();
        $row = 2;
        foreach ($valid_hours as $valid_hour) {
            $sheet->setCellValue('A' . $row, $valid_hour->id); #id
            $sheet->setCellValue('D' . $row, $valid_hour->date);#date
            $sheet->setCellValue('C' . $row, $valid_hour->hour->name);#poste
            $sheet->setCellValue('B' . $row, $valid_hour->user->name); #nom
            $sheet->setCellValue('E' . $row, $valid_hour->user->team->name); #equipe

            $sheet->setCellValue('F' . $row, $valid_hour->timer_one);#temps tache 1
            $sheet->setCellValue('G' . $row, $valid_hour->taskOne->name);#tache 1
            $sheet->setCellValue('H' . $row, $valid_hour->subtaskOne->name);#sous tache 1
            $sheet->setCellValue('I' . $row, $valid_hour->number_one);#OP 1
            $sheet->setCellValue('J' . $row, $valid_hour->projectOne->name);#projet 1
            $sheet->setCellValue('K' . $row, $valid_hour->stageOne->name);#stade 1
            $sheet->setCellValue('L' . $row, $valid_hour->coment_one);#commentaire 1

            $sheet->setCellValue('M' . $row, $valid_hour->timer_two);#temps tache 1
            $sheet->setCellValue('N' . $row, $valid_hour->taskTwo->name);#temps tache 1
            $sheet->setCellValue('O' . $row, $valid_hour->subtaskTwo->name);#temps tache 1
            $sheet->setCellValue('P' . $row, $valid_hour->number_two);#temps tache 1
            $sheet->setCellValue('Q' . $row, $valid_hour->projectTwo->name);#temps tache 1
            $sheet->setCellValue('R' . $row, $valid_hour->stageTwo->name);#temps tache 1
            $sheet->setCellValue('T' . $row, $valid_hour->coment_two);#temps tache 1

            $sheet->setCellValue('U' . $row, $valid_hour->timer_three);#temps tache 1
            $sheet->setCellValue('V' . $row, $valid_hour->taskThree->name);#temps tache 1
            $sheet->setCellValue('W' . $row, $valid_hour->subtaskThree->name);#temps tache 1
            $sheet->setCellValue('X' . $row, $valid_hour->number_three);#temps tache 1
            $sheet->setCellValue('Y' . $row, $valid_hour->projectThree->name);#temps tache 1
            $sheet->setCellValue('Z' . $row, $valid_hour->stageThree->name);#temps tache 1
            $sheet->setCellValue('AA' . $row,$valid_hour->coment_three);#temps tache 1

            $sheet->setCellValue('AB' . $row, $valid_hour->timer_four);#temps tache 1
            $sheet->setCellValue('AC' . $row, $valid_hour->taskFour->name);#temps tache 1
            $sheet->setCellValue('AD' . $row, $valid_hour->subtaskFour->name);#temps tache 1
            $sheet->setCellValue('AE' . $row, $valid_hour->number_four);#temps tache 1
            $sheet->setCellValue('AF' . $row, $valid_hour->projectFour->name);#temps tache 1
            $sheet->setCellValue('AG' . $row, $valid_hour->stageFour->name);#temps tache 1
            $sheet->setCellValue('AH' . $row, $valid_hour->coment_four);#temps tache 1
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        $response = new StreamedResponse(function() use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="Tableau MOD.xlsx"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }
}
