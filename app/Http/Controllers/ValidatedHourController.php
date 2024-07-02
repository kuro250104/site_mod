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

        // Définir les largeurs des colonnes de manière optimisée
        $columns = range('A', 'AH');
        foreach ($columns as $column) {
            $sheet->getColumnDimension($column)->setWidth(60);
        }
        $sheet->getColumnDimension('A')->setWidth(20);

        // Ajouter la ligne d'en-tête
        $headers = [
            'A1' => 'ID', 'B1' => 'User ID', 'C1' => 'Hours', 'D1' => 'Date',
            'E1' => 'Team', 'F1' => 'Timer One', 'G1' => 'Task One', 'H1' => 'Subtask One',
            'I1' => 'Number One', 'J1' => 'Project One', 'K1' => 'Stage One', 'L1' => 'Comment One',
            'M1' => 'Timer Two', 'N1' => 'Task Two', 'O1' => 'Subtask Two', 'P1' => 'Number Two',
            'Q1' => 'Project Two', 'R1' => 'Stage Two', 'T1' => 'Comment Two', 'U1' => 'Timer Three',
            'V1' => 'Task Three', 'W1' => 'Subtask Three', 'X1' => 'Number Three', 'Y1' => 'Project Three',
            'Z1' => 'Stage Three', 'AA1' => 'Comment Three', 'AB1' => 'Timer Four', 'AC1' => 'Task Four',
            'AD1' => 'Subtask Four', 'AE1' => 'Number Four', 'AF1' => 'Project Four', 'AG1' => 'Stage Four',
            'AH1' => 'Comment Four'
        ];

        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }

        // Récupérer les données par lots
        $batchSize = 1000; // Taille du lot, ajustez selon vos besoins
        $totalRecords = ValidatedHour::count();
        $row = 2;

        for ($offset = 0; $offset < $totalRecords; $offset += $batchSize) {
            $valid_hours = ValidatedHour::skip($offset)->take($batchSize)->get();

            foreach ($valid_hours as $valid_hour) {
                $user = $valid_hour->user;
                $team = $user->team;
                $hour = $valid_hour->hour;

                $sheet->setCellValue('A' . $row, $valid_hour->id);
                $sheet->setCellValue('B' . $row, $user->name);
                $sheet->setCellValue('C' . $row, $hour->name);
                $sheet->setCellValue('D' . $row, $valid_hour->date);
                $sheet->setCellValue('E' . $row, $team->name);

                $tasks = [
                    ['F', 'G', 'H', 'I', 'J', 'K', 'L', 'timer_one', 'taskOne', 'subtaskOne', 'number_one', 'projectOne', 'stageOne', 'coment_one'],
                    ['M', 'N', 'O', 'P', 'Q', 'R', 'T', 'timer_two', 'taskTwo', 'subtaskTwo', 'number_two', 'projectTwo', 'stageTwo', 'coment_two'],
                    ['U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'timer_three', 'taskThree', 'subtaskThree', 'number_three', 'projectThree', 'stageThree', 'coment_three'],
                    ['AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'timer_four', 'taskFour', 'subtaskFour', 'number_four', 'projectFour', 'stageFour', 'coment_four']
                ];

                foreach ($tasks as $task) {
                    $sheet->setCellValue($task[0] . $row, $valid_hour->{$task[7]});
                    $sheet->setCellValue($task[1] . $row, $valid_hour->{$task[8]}->name);
                    $sheet->setCellValue($task[2] . $row, $valid_hour->{$task[9]}->name);
                    $sheet->setCellValue($task[3] . $row, $valid_hour->{$task[10]});
                    $sheet->setCellValue($task[4] . $row, $valid_hour->{$task[11]}->name);
                    $sheet->setCellValue($task[5] . $row, $valid_hour->{$task[12]}->name);
                    $sheet->setCellValue($task[6] . $row, $valid_hour->{$task[13]});
                }
                $row++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        $response = new StreamedResponse(function() use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="Tableau_MOD.xlsx"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }


}
