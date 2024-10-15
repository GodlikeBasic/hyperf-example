<?php

declare(strict_types=1);

namespace App\Model;

use Carbon\Carbon;
use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property int $country_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Guest extends Model
{
    public string $name;

    public string $last_name;

    public string $phone;

    public string $email;

    /**
     * The table associated with the model.
     */
    protected ?string $table = 'guests';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['name', 'last_name', 'phone', 'email'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'country_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    public static function create($attributes = []): Guest|\Hyperf\Database\Model\Model
    {


        return parent::create($attributes);
    }
}
