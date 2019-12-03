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
class Config extends Model
{
	protected $table = 'config';
    protected $fillable = ['name', 'type', 'value'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function get_system()
    {
		if($list=$this->all()){
			$list=$list->toArray();
		}
		$system=[];
		foreach((array)$list as $v){
			if($v['type']=='text'){
				$system[$v['name']]=$v['value'];
			}else if($v['type']=='array'){
				$system[$v['name']]=unserialize($v['value']);
			}
		}
        return $system;
    }
	
}
