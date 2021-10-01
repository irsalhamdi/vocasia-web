<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrolModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'enrol';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['user_id', 'course_id', 'payment_id', 'last_modified', 'finish_date'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'create_at';
    protected $updatedField         = 'update_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function get_list_enrol($id = null)
    {
        if (!empty($id)) {
            return $this->db->table('enrol')->select(
                "enrol.*,concat(users.first_name,' ',users.last_name)
                as Name,
                courses.title as Title,
                courses.description as Course Description,
                courses.short_description as Short Description,
                courses.bio_instructor as Instructor Biography,
                courses.outcomes as Outcomes,
                courses.section as Section,
                courses.requirement as Requirement,
                courses.level_course as Course Level, 
                courses.price as Price,
                courses.discount_price as Discount,
                courses.language as Languange,
                courses.status_course as Course Status"
            )
                ->join('users', 'users.id = enrol.user_id')
                ->join('courses', 'courses.id = enrol.course_id')
                ->where('enrol.id', $id)
                ->get()
                ->getRow();
        }
        return $this->db->table('enrol')->select(
            "enrol.*,concat(users.first_name,' ',users.last_name)
        as Name,
        courses.title as Title,
        courses.description as Course Description,
        courses.short_description as Short Description,
        courses.bio_instructor as Instructor Biography,
        courses.outcomes as Outcomes,
        courses.section as Section,
        courses.requirement as Requirement,
        courses.level_course as Course Level, 
        courses.price as Price,
        courses.discount_price as Discount,
        courses.language as Languange,
        courses.status_course as Course Status"
        )
            ->join('users', 'users.id = enrol.user_id')
            ->join('courses', 'courses.id = enrol.course_id')
            ->get()
            ->getResult();
    }
}