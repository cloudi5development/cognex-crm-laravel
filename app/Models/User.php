<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Casts\DateTimeCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use HasFactory, Notifiable;

	protected $casts = [
		'role_id' => 'int',
		'is_verified_access_code' => 'int',
		'is_mobile_verified' => 'int',
		'is_email_verified' => 'int',
		'last_login_at' => DateTimeCast::class,
		'password_expire_at' => DateTimeCast::class,
		'status' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'mobile',
		'email',
		'password',
		'image',
		'password_expire_at',
		'email_verified_at',
		'token',
		'token_expire_at',
		'fcm_device_token',
		'last_login_at',
		'status',
		'remember_token',

	];

	public function isSuperAdmin()
	{
		if ($this->id == 1) {
			return true;
		}
	}

	public function permissions()
	{
		return $this->belongsToMany(Permission::class)->withTimestamps();
	}
}
