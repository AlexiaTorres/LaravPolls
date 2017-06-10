<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Question extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'questions';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function chart()
    {
        $chart = \Charts::multi('bar', 'material')
            ->title(false)
            ->dimensions(0, 200) // Width x Height
            ->template("material")
            ->colors(['#169196', '#8f5093', '#b69578', '#46ed94', '#ec8caa', '#626262'])
            ->responsive(true);

        foreach ($this->options as $option){
            $chart->dataset($option->option, [$option->users->count()]);
        }

        $chart->labels([$this->question]);

        return $chart;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
    public function options()
    {
        return $this->hasMany(Option::class);
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
