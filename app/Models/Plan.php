<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model {

	protected $table = "plans";

	/**
	 * Query scope for user plan
	 *
	 * @return void
	 */
	public static function scopeUsersPlan(Builder $builder) {

		return $builder->where('teams_enabled', false);
	}

	/**
	 * Query scope for excluding Current Plan
	 *
	 * @return void
	 */
	public static function scopeExcept(Builder $builder,$planId) {

		return $builder->where('id','!=',$planId);
	}

	/**
	 * Query scope for Excluding current plan
	 *
	 * @return void
	 */
	public static function scopeTeamsPlan(Builder $builder) {

		return $builder->where('teams_enabled',true);
	}

	/**
	 * Active plans
	 *
	 * @return void
	 */
	public static function scopeActive(Builder $builder) {

		return $builder->where('status', 1);
	}

	/**
	 * Checking is plan is for team
	 *
	 * @return void
	 */
	public function isTeamEnabled(){
		
		return $this->teams_enabled == true;
	}

	/**
	* Checking if the plan
	* is not for team
	*
	* @return void
	*/
	public function isNotForTeam(){
		
		return !$this->isTeamEnabled();
	}

	/**
	* Checking the teamLimit of Plan
	*
	* @return void
	*/
	public function PlanTeamLimit(){
		
		return $this->team_limit;
	}
}
