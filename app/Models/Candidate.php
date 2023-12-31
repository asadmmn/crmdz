<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Candidate extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'full_name', 'picture', 'email', 'resume', 'phone_number', 'gender',
        'birth_date', 'address', 'zipcode', 'latest_degree', 'latest_university',
        'current_company', 'current_department', 'current_position', 'description',
    ];

}
    
