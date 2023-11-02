<?php

namespace App\Imports;

use App\Models\Member;
use App\Models\Organisme;
use Maatwebsite\Excel\Concerns\ToModel;

class MembersImport implements ToModel
{
    public function model(array $row)
    {
        if (!$row[0] || $row[0] === '') {
            // Gérer l'absence de valeur pour last_name
            return null;
        }

        if (!$row[1] || $row[1] === '') {
            // Gérer l'absence de valeur pour first_name
            return null;
        }

        $organisme = Organisme::where('name', $row[3])->first();

        if (!$organisme) {
            $organisme = Organisme::create(['name' => $row[3]]);
        }

        $email = $row[2] ?? ''; // Utilisez une valeur par défaut si le champ est nul
        $phone = $row[4] ?? ''; // Utilisez une valeur par défaut si le champ est nul
        $fix_phone = $row[5] ?? ''; // Utilisez une valeur par défaut si le champ est nul

        return new Member([
            'first_name' => $row[1],
            'last_name' => $row[0],
            'email' => $email,
            'organisme_id' => $organisme->id,
            'phone' => $phone,
            'fix_phone' => $fix_phone,
        ]);
    }
}





