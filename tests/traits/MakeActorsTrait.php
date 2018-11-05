<?php

use Faker\Factory as Faker;
use App\Models\Actors;
use App\Repositories\ActorsRepository;

trait MakeActorsTrait
{
    /**
     * Create fake instance of Actors and save it in database
     *
     * @param array $actorsFields
     * @return Actors
     */
    public function makeActors($actorsFields = [])
    {
        /** @var ActorsRepository $actorsRepo */
        $actorsRepo = App::make(ActorsRepository::class);
        $theme = $this->fakeActorsData($actorsFields);
        return $actorsRepo->create($theme);
    }

    /**
     * Get fake instance of Actors
     *
     * @param array $actorsFields
     * @return Actors
     */
    public function fakeActors($actorsFields = [])
    {
        return new Actors($this->fakeActorsData($actorsFields));
    }

    /**
     * Get fake data of Actors
     *
     * @param array $postFields
     * @return array
     */
    public function fakeActorsData($actorsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'idade' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $actorsFields);
    }
}
