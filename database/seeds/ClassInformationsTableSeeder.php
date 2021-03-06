<?php

use Illuminate\Database\Seeder;

class ClassInformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patients = \App\Models\Painel\Patient::all();
        $psychoanalysts = \App\Models\Painel\Psychoanalyst::all();
        $subjects = \App\Models\Painel\Subject::all();
        factory(\App\Models\Painel\ClassInformation::class,50)
            ->create()
            ->each(function (\App\Models\Painel\ClassInformation $model) use ($patients, $psychoanalysts, $subjects){
                /** @var Illuminate\Support\Collection $patients */
                $patientsCol = $patients->random(10);
                $model->patients()->attach($patientsCol->pluck('id'));

                $meeting = rand(3,9);

                $psychoanalystCol = $psychoanalysts->random($meeting);
                $subjectsCol = $subjects->random($meeting);
                foreach (range(1,$meeting) as $value){
                    $model->meetings()->create([
                        'subject_id' => $subjectsCol->get($value-1)->id,
                        'psychoanalyst_id' => $psychoanalystCol->get($value-1)->id,
                    ]);
                }
        });
    }
}
