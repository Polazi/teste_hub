<?php

namespace App\Exports;

use App\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ClientsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Client::get();
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            $row->galc,
            $row->port,
            $row->instalation_address,
            $row->speed 
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nome do Cliente',
            'Galc',
            'Porta',
            'Endereço de instalação',
            'Velocidade'
        ];
    }
}
