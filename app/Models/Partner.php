<?php

namespace App\Models;

use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    protected $fillable = [
        'name', 'type_code', 'level_code', 'phone', 'work', 'address', 'description', 'is_active', 'creator_id',
        'gender_code',
    ];

    public function getStatusAttribute()
    {
        return $this->is_active == 1 ? __('app.active') : __('app.inactive');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getGenderAttribute(): ?string
    {
        if ($this->gender_code == 'm') {
            return __('app.gender_male');
        }
        if ($this->gender_code == 'f') {
            return __('app.gender_female');
        }

        return $this->gender_code;
    }

    public function getTypeAttribute(): string
    {
        return $this->getAvailableTypes()[$this->type_code] ?? $this->type_code;
    }

    public function getLevelAttribute(): ?string
    {
        return $this->getAvailableLevels($this->type_code)[$this->level_code] ?? $this->level_code;
    }

    public function getAvailableTypes(): array
    {
        $partnerTypesConfig = config('partners.partner_types');
        if (!$partnerTypesConfig) {
            return ['partner' => __('partner.partner')];
        }
        $partnerTypes = [];
        // dump($partnerTypesConfig);
        $rawPartnerTypes = explode(',', $partnerTypesConfig);
        // dump($rawPartnerTypes);
        foreach ($rawPartnerTypes as $rawPartnerType) {
            $partnerType = explode('|', $rawPartnerType);
            // dd($partnerType);
            $partnerTypes[$partnerType[0]] = $partnerType[1];
        }
        // dd($partnerTypes);

        return $partnerTypes;
    }

    public function getAvailableLevels(string $typeCode): array
    {
        $partnerLevelsConfig = config('partners.partner_levels');
        if (!$partnerLevelsConfig) {
            return [];
        }
        $partnerLevels = [];
        $rawPartnerLevels = explode(',', $partnerLevelsConfig);
        foreach ($rawPartnerLevels as $rawPartnerLevelArray) {
            $rawPartnerLevel = explode(':', $rawPartnerLevelArray);
            $partnerLevelCode = $rawPartnerLevel[0];
            if ($partnerLevelCode != $typeCode) {
                continue;
            }
            $singlePartnerLevels = [];
            $partnerLevelCodeNames = explode('|', $rawPartnerLevel[1]);
            foreach ($partnerLevelCodeNames as $key => $partnerLevelCodeName) {
                if ($key % 2 == 0) {
                    $singlePartnerLevels[$partnerLevelCodeNames[$key]] = $partnerLevelCodeNames[$key + 1];
                }
            }
            $partnerLevels = $singlePartnerLevels;
        }

        return $partnerLevels;
    }
}
