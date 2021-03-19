<?php

namespace Acme\Infrastructure\Eloquent\Repositories;

use Acme\Domain\Contracts\Repository\IProfileRepository;
use Acme\Infrastructure\Eloquent\Models\City;
use Acme\Infrastructure\Eloquent\Models\DocumentType;
use Acme\Infrastructure\Eloquent\Models\Profile;
use Acme\Infrastructure\Eloquent\Models\ProfileType;

class ProfileRepository implements IProfileRepository
{
    public function __construct(
        private Profile $profileModel,
        private DocumentType $documentTypeModel,
        private City $cityModel,
        private ProfileType $profileTypeModel
    )
    {
    }

    public function createNewProfile(array $data): array
    {
        $documentType = $this->documentTypeModel->find($data['document_type_id']);
        \Log::info(sprintf('CityId: [%s]', $data['city_id']));
        $city = $this->cityModel->find($data['city_id']);
        $profileType = $this->profileTypeModel->find($data['profile_type_id']);

        $profile = $this->profileModel->fill($data);
        $profile->documentType()->associate($documentType);
        $profile->city()->associate($city);
        $profile->profileType()->associate($profileType);

        $profile->save();

        return $profile->load(['documentType', 'profileType', 'city.state.country'])->toArray();
    }

    public function getProfilesByType(int $profile_type_id): array
    {
        return $this->profileModel->where('profile_type_id', '=', $profile_type_id)
            ->with(['documentType', 'profileType', 'city.state.country'])->get()->toArray();
    }
}
