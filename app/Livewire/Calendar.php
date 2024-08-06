<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Calendar extends Component
{
    public $weekDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

    public $currentMonth;
    public $currentYear;
    public $currentDay;
    public $currentMonthName;
    public $daysInMonth;
    public $firstDayOfMonth;
    public $date;

    public function mount()
    {
        $this->setDateProperties(Carbon::now());
    }

    public function setDateProperties($date)
    {
        $this->date = $date;
        $this->currentMonth = $this->date->month;
        $this->currentYear = $this->date->year;
        $date = new Carbon("{$this->currentYear}-{$this->currentMonth}-01");
        $this->currentDay = $this->date->day;
        $this->currentMonthName = $this->date->format('F');
        $this->daysInMonth = $this->date->daysInMonth;
        $this->firstDayOfMonth = $this->date->copy()->startOfMonth()->dayOfWeekIso;
    }

    public function previous()
    {
        $this->setDateProperties($this->date->subMonth());
        // dd(
        //     $this->currentMonth,
        //     $this->currentYear,
        //     $this->currentDay,
        //     $this->currentMonthName,
        //     $this->daysInMonth,
        //     $this->firstDayOfMonth,
        //     $this->date,
        // );
    }

    public function next()
    {
        $this->setDateProperties($this->date->addMonth());
        // dd(
        //     $this->currentMonth,
        //     $this->currentYear,
        //     $this->currentDay,
        //     $this->currentMonthName,
        //     $this->daysInMonth,
        //     $this->firstDayOfMonth,
        //     $this->date,
        // );
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}

// class Calendar extends Component
// {
//     public $weekDays = [
//         'Mon',
//         'Tue',
//         'Wed',
//         'Thu',
//         'Fri',
//         'Sat',
//         'Sun',
//     ];
//     // public $data;
//     public $currentMonth;
//     public $currentYear;
//     public $currentDay;
//     public $currentMonthName;
//     public $daysInMonth;
//     public $firstDayOfMonth;
//     public $date;

//     public function __construct()
//     {
//         $this->currentMonth = Carbon::now()->format('m');
//         $this->currentYear = Carbon::now()->format('Y');
//         $this->currentDay = Carbon::now()->format('d');

//         $this->date = Carbon::create($this->currentYear, $this->currentMonth);

//         $this->currentMonthName = $this->date->format('F');

//         $this->daysInMonth = $this->date->daysInMonth;
//         $this->firstDayOfMonth = $this->date->copy()->startOfMonth()->dayOfWeek;
//     }

//     public function previous()
//     {
//         // --$this->data['currentMonth'];
//         --$this->currentMonth;
//         $this->date = Carbon::create($this->currentYear, $this->currentMonth);

//         $this->currentMonthName = $this->date->format('F');

//         $this->daysInMonth = $this->date->daysInMonth;
//         $this->firstDayOfMonth = $this->date->copy()->startOfMonth()->dayOfWeek;
//     }

//     public function next()
//     {
//         dd(3);
//     }

//     public function render()
//     {
//         return view('livewire.calendar');
//     }
// }
