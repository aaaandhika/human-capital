<?php

class Jobtitle extends Morphaworks\Database\Model {
    /**
     * white list column for mass asignment
     * ref : http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = ['jobprefix_id', 'functionalscope_id', 'title'];

    /**
     * Model validation rules
     * ref : app\Morphaworks\Database\Model.php
     *       http://laravel.com/docs/validation
     * @var array
     */
    public static $rules = array(
        // Validation rule: jobprefix is required and must exist in jobprefixes
        // table on column id
        'jobprefix_id' => 'required|exists:jobprefixes,id',
        'functionalscope_id' => 'required|exists:functionalscopes,id',
        'title' => 'required|unique:jobprefixes,title,:id',
    );

    /**
     * Many-to-One relation with Jobprefix
     * @return Jobprefix
     */
    public function jobprefix()
    {
        return $this->belongsTo('Jobprefix');
    }

    /**
     * Many-to-One relation with Functionalscope
     * @return Functionalscope
     */
    public function functionalscope()
    {
        return $this->belongsTo('Functionalscope');
    }

}