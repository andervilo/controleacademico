<?php

use Faker\Factory as Faker;
use App\Models\Participantes;
use App\Repositories\ParticipantesRepository;

trait MakeParticipantesTrait
{
    /**
     * Create fake instance of Participantes and save it in database
     *
     * @param array $participantesFields
     * @return Participantes
     */
    public function makeParticipantes($participantesFields = [])
    {
        /** @var ParticipantesRepository $participantesRepo */
        $participantesRepo = App::make(ParticipantesRepository::class);
        $theme = $this->fakeParticipantesData($participantesFields);
        return $participantesRepo->create($theme);
    }

    /**
     * Get fake instance of Participantes
     *
     * @param array $participantesFields
     * @return Participantes
     */
    public function fakeParticipantes($participantesFields = [])
    {
        return new Participantes($this->fakeParticipantesData($participantesFields));
    }

    /**
     * Get fake data of Participantes
     *
     * @param array $postFields
     * @return array
     */
    public function fakeParticipantesData($participantesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'filme_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $participantesFields);
    }
}
