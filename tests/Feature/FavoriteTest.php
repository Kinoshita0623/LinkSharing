<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use PHPUnit\Framework\Assert;
use App\Models\Note;
use DB;

class FavoriteTest extends TestCase
{

    use RefreshDatabase;
    
    private $targetNote = null;


    

    function testFavorite()
    {

        $users = User::factory()->count(100)->create();

        foreach($users as $user){
            $this->targetNote->favorite($user);
        }


        $note = Note::withFavoriteCount()->find($this->targetNote->id);
        Assert::assertNotNull($note);

        Assert::assertEquals($note->favorite_count, 100);


        foreach($users as $user){
            $note->unfavorite($user);
        }

        $note = Note::withFavoriteCount()->find($this->targetNote->id);
        Assert::assertEquals($note->favorite_count, 0);



        
        
    }
}
