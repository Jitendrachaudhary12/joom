<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Session;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

class TaskExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */



    public function collection()
    {

        $tasks = Task::select('start_time','stop_time','notes','description')->get();
              foreach ($tasks as $key => $task)
             {
            $task['start_time'] = $task['start_time'];
            $task['stop_time'] = $task['stop_time'];
            $task['notes'] = $task['notes'];
            $task['description'] = $task['description'];
            
        }
        // dd($tasks);
        return $tasks;
       
    }
     public function headings(): array
    {
         return [
                'Start Time',
                'Stop Time',
                'Notes',
                'Description',
                ];
    }
}
