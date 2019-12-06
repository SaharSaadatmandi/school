<?php

namespace Tests\Browser;

use App\Models\Classroom;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Teacher;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class OfficerTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_as_officer_want_enroll_students()
    {
        $user = factory(User::class)->create(['roleId'=>1]);
        Classroom::save(['id'=>'1A','capacity'=>25,'description'=>'molto bella']);


        $this->browse(function ($browser) use ($user){
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/home');
            $browser->visit('/student/add')
                ->type('frm[firstName]', 'Giorgio')
                ->type('frm[lastName]', 'Santangelo')
                ->type('frm[birthPlace]', 'Catania')
                ->type('frm[birthday]', '10/02/2005')
                ->type('frm[address]', 'null')
                ->type('frm[phone]', 'null')
                ->type('frm[postCode]', 'null')
                ->type('frm[fiscalCode]', 'null')
                ->type('frm[email]', 'test@test.com')
                ->type('frm[description]', 'null')
                ->press('Submit')
                ->type('parentName1','Gastani Frinzi')
                ->type('parentEmail1','gastani@test.com')
                ->press('Submit')
                ->assertPathIs('/student/list')
                ->logout();
        });
        $this->assertDatabaseHas('student', [
            'firstName' => 'Giorgio',
            'lastName' => 'Santangelo'
        ]);
    }

    public function test_as_officer_want_import_timetable()
    {
        $user = factory(User::class)->create(['roleId'=>1]);
        Classroom::save(['id'=>'1A','capacity'=>25,'description'=>'molto bella']);


        $this->browse(function ($browser) use ($user){
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/home');
            $browser->visit('/timetable/add')
                ->select('frm[classId]','1A')
                ->attach('timetable',public_path('timetable.csv'))
                ->press('Submit')
                ->assertPathIs('/timetable/list')
                ->logout();
        });
        $this->assertDatabaseHas('timetable', [
            'idClass' => '1A'
        ]);
    }

    public function test_as_officer_want_add_communications()
    {
        $user = factory(User::class)->create(['roleId'=>1]);


        $this->browse(function ($browser) use ($user){
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/home');
            $browser->visit('/communications/add')
                ->type('frm[description]','Some communication')
                ->press('Submit')
                ->assertPathIs('/communications/list')
                ->logout();
        });
        $this->assertDatabaseHas('communications', [
            'description' => 'Some communication'
        ]);
    }

    /*
        public function test_as_officer_want_compose_classrooms()
        {
            $user = factory(User::class)->create(['roleID'=>1]);
            Classroom::save(['id'=>'1A','capacity'=>25,'description'=>'molto bella']);
            $studentid = Student::save(['firstName'=>'Giorgio', 'lastName'=>'Santangelo', 'mailParent1'=>'parent@test.com']);
            Student::saveStudParent(['idParent'=>$user->id,'idStudent'=>$studentid]);


            $this->browse(function ($browser) use ($user){
                $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home');
                $browser->visit('/classroom/composition/1A')
                    ->press('Move all')
                    ->select('frm[]','Giorgio Santagnelo')
                    ->press('Submit')
                    ->assertPathIs('/classroom/list')
                    ->assertSee('No student selected!')
                    ->logout();
            });

            $this->assertDatabaseHas('student', [
                'firstName' => 'Giorgio',
                'lastName' => 'Santangelo',
                'classId' =>   '1A'
            ]);

    }*/



}
