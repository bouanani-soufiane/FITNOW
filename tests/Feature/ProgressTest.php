<?php

namespace Tests\Feature;

use App\Models\Progression;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProgressTest extends TestCase
{
    use RefreshDatabase;

    public function testApiReturnProgressList(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson("api/v1/progression");

        $response->assertStatus(200);
    }
    public function testCanStoreSession()
    {
        $user = User::factory()->create();
        $progress = [

            "title" => "sa",
            "poids" => "97",
            "weight" => 118,
            "height" => 168,
            "chest_Measurement" => 111,
            "biceps_Measurement" => 43,
            "waist_Measurement" => 89,
            "hip_Measurement" => 120,
            "squat" => 219,
            "deadlift" => 185,
            "pushUp" => 49,
            "status" => "non terminer",
            "date" => "2023-07-12"

        ];

        $response = $this->actingAs($user)->post('/api/v1/progression', $progress);

        $response->assertStatus(200);

        $this->assertDatabaseHas('progressions', [

            'title' => $progress['title'],
            'poids' => $progress['poids'],
            'weight' => $progress['weight'],
            'height' => $progress['height'],
            'chest_Measurement' => $progress['chest_Measurement'],
            'biceps_Measurement' => $progress['biceps_Measurement'],
            'waist_Measurement' => $progress['waist_Measurement'],
            'hip_Measurement' => $progress['hip_Measurement'],
            'squat' => $progress['squat'],
            'deadlift' => $progress['deadlift'],
            'pushUp' => $progress['pushUp'],
            'date' => $progress['date'],


        ]);
    }
    public function testCanShowSession()
    {
        $user = User::factory()->create();

        Progression::factory()->create([
            "title"=> "testings",
            "poids"=> "97",
            "weight"=> 118,
            "height"=> 168,
            "chest_Measurement"=> 111,
            "biceps_Measurement"=> 43,
            "waist_Measurement"=> 89,
            "hip_Measurement"=> 120,
            "squat"=> 219,
            "deadlift"=> 185,
            "pushUp"=> 49,
            "status"=> "non terminer",
            "date"=> "2023-07-12",

            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get('/api/v1/progression/testings');

        $response->assertStatus(200);

    }
    public function testCanUpdateProgression()
    {
        $user = User::factory()->create();

        $progression = Progression::factory()->create(['user_id' => $user->id]);

        $updatedData = [
            "title" => "Updated Title",
            "poids" => 97,
            "weight" => 118,
            "height" => 168,
            "chest_Measurement" => 111,
            "biceps_Measurement" => 43,
            "waist_Measurement" => 89,
            "hip_Measurement" => 120,
            "squat" => 219,
            "deadlift" => 185,
            "pushUp" => 49,
            "status" => "non terminer",
            "date" => "2023-07-12"
        ];

        $response = $this->actingAs($user)->patch('api/v1/progression/' . $progression->slug, $updatedData);

        $response->assertStatus(200);
    }
    public function testCanDeleteProgression()
    {
        $user = User::factory()->create();

        $progression = Progression::factory()->create(['user_id' => $user->id]);



        $response = $this->actingAs($user)->delete('api/v1/progression/' . $progression->slug);

        $response->assertStatus(200);
    }
    public function testSessionCanChangeStatus()
    {
        $user = User::factory()->create();
        Progression::factory()->create([
            "title"=> "wow",
            "poids"=> "97",
            "weight"=> 118,
            "height"=> 168,
            "chest_Measurement"=> 111,
            "biceps_Measurement"=> 43,
            "waist_Measurement"=> 89,
            "hip_Measurement"=> 120,
            "squat"=> 219,
            "deadlift"=> 185,
            "pushUp"=> 49,
            "status"=> "non terminer",
            "date"=> "2023-07-12",
            'user_id' => $user->id]);

        $response = $this->actingAs($user)->post('/api/v1/progression/wow/toggleStatus');

        $response->assertStatus(200);
    }
}
