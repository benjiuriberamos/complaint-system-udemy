<?php

namespace App\Exports;

use App\Models\Complaints;
use Maatwebsite\Excel\Concerns\FromArray;

class ReportsExport implements FromArray
{

    protected $complaints;

    public function __construct(array $complaints)
    {
        $this->complaints = $complaints;
    }

    public function array(): array
    {
        return $this->complaints;
    }


}
