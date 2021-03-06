<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rule
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rule public()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rule query()
 * @mixin \Eloquent
 */
class Speech extends Model
{
    protected $table = 'speech';
    protected $fillable = ['speech_title', 'rusn_id', 'route', 'created_at', 'is_hidden', 'sort', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_auth')->withTimestamps();
    }

    public function hasOneRushThrough(){
        
        return $this->hasOne(RusnThrough::class,'id','rusn_id');
    }


    /**
     * 只获取显示的数据
     * @param $query
     * @return mixed
     */
    public function scopePublic($query)
    {
        return $query->where('is_hidden', 0);
    }
}
