<?php namespace Blupl\Management\Model;

use Illuminate\Database\Eloquent\Model;

class Management extends Model {


    protected $table = 'bcb_managements';

    protected $morphClass = 'bcb_managements';

    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'role',
        'department',
        'organization',
        'mobile',
        'personal_id',
        'email',
        'present_address1',
        'present_address2',
        'present_district',
        'present_zip',
        'permanent_address1',
        'permanent_address2',
        'permanent_district',
        'permanent_zip',
        'workstation',
        'card_collection_point',
        'photo',
        'attachment',
        'status'
    ];


    public function zone()
    {
        return $this->morphMany('Blupl\PrintMedia\Model\Zone', 'zoneable');
    }

    public function grade()
    {
        return $this->morphMany('Blupl\PrintMedia\Model\Grade', 'gradeable');
    }

}
