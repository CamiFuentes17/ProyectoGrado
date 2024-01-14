<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisition extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
    'name',
    'user_id',
    'status',
    'area',
    'requisition_type',
    'deliverable_type',
    'deliverable_date',
    'safety_approval_file',
    'safety_approval_file_detail',
    'periodicity',
    'database',
    'report_fields',
    'description',
    'active',
    'created_at',
    'updated_at',
    ];

    public function userRequisition()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

