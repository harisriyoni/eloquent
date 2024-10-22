<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
class Person extends Model
{
    protected $table = 'people';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;
    protected $cast =[
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    protected function fullname(){
        return Attribute::make(
            get: function (): string {
                return $this->first_name . '' . $this->lastname;

            },
            set: function (string $value): array{
                $names = explode(' ', $value);
                return [
                    'first_name' => $names[0],
                    'last_name' => $names[1] ?? ''
                ];
            }
        );
    }
}
