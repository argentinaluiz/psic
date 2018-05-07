<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        $this->call(CitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(SheetsTableSeeder::class);
        $this->call(SubSheetsTableSeeder::class);
        $this->call(ClassInformationsTableSeeder::class);
        $this->call(ClassTestsTableSeeder::class);
        $this->call(PatientClassTestTableSeeder::class);
        $this->call(ListChoicesTableSeeder::class);
        $this->call(TypeChoicesTableSeeder::class);
        $this->call(ResearchesTableSeeder::class);
        $this->call(RanksTableSeeder::class);
        $this->call(SubRanksTableSeeder::class);
        $this->call(SubSubRanksTableSeeder::class);
        $this->call(ToolsTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
