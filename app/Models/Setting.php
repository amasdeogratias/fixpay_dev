<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Config;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['key', 'value'];

    //query setting value by key
    public function get($key)
    {
        $setting = new self();
        $entry = $setting->where('key', $key)->first();
        if(!$entry){
            return;
        }
        return $entry->value;
    }

    //update existing key value
    public function set($key, $value=null)
    {
        $setting = new self();
        $entry = $setting->where('key', $key)->firstOrFail();
        $entry->value = $value;
        $entry->saveOrFail();
        Config::set('key', $value);
        if (Config::get($key) == $value) {
            return true;
        }
        return false;
    }
}
