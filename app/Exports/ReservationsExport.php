<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ReservationsExport implements FromCollection, WithHeadings
{
    protected $reservations;

    public function __construct($reservations)
    {
        $this->reservations = $reservations;
    }

    public function collection()
    {
        // dd($this->reservations)
        return collect($this->reservations);
    }

    public function headings(): array
    {
        return [
            'User Name',
            'Start Date',
            'End Date',
            'Status',
            'Room Name',
            'Floor Name',
            'Price Per Night',
            'Total Price',
        ];
    }
}


