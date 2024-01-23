<?php

namespace Tests\Unit;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\Maintenance;
use App\Models\Tool;
use App\Models\User;
use http\QueryString;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UnitTest extends TestCase
{
    // Before unit testing, make sure the database is blank with a migrate:fresh command

    public function test_bearer_token(): string
    {
        $response = $this->post('api/v1/login',
            [
                'email' => 'brgn.alex@test.fr',
                'password' => '12345678'
            ]
        );

        $response->assertStatus(200);
        return($response->original['success']['token']);
    }

    public function test_get_maintenance(): void
    {
        $response = $this->withHeaders([
            "Authorization" => "Bearer ".$this->test_bearer_token()
        ])->get('api/v1/maintenance');

        $response->assertStatus(200);
    }

    public function test_post_category(): void
    {
        $response = $this->withHeaders([
            "Authorization" => "Bearer ".$this->test_bearer_token()
        ])->post('api/v1/category',
        [
            'name' => 'Extincteurs',
            'isLegal' => '1'
        ]);

        $response->assertStatus(201);
    }

    public function test_post_tool(): void
    {
        $response = $this->withHeaders([
            "Authorization" => "Bearer ".$this->test_bearer_token()
        ])->post('api/v1/tool',
            [
                'number' => "73",
                'serialId' => "2024379413",
                'isActive' => true,
                'localisation' => "Bâtiment A",
                'dateNextOperation' => fake()->date("2024-12-24 10:20:20"),
                'toDo' => false,
                'category_id' => 1,
            ]);

        $response->assertStatus(201);
    }

    public function test_post_maintenance_and_tool_nextdateoperation_changement($id_tool = '1', $id_user = '1'): void
    {
        $dateNextOperation = '2030-06-20 10:00:00';

        $request = $this->withHeaders(
            ['Authorization' =>'Bearer '.$this->test_bearer_token()]
        )->post('/api/v1/maintenance?id_tool='.$id_tool.'&id_user='.$id_user,
            [
                'date' => '2023-10-03 21:13:26',
                'report' => 'test_the_form_maintenance_finished()',
                'dateNextOperation' => $dateNextOperation
            ]
        );

        $tool = Tool::find($id_tool);
        $nextDateOperationAfterCreation = $tool->getDateNextOperation();

        if ($nextDateOperationAfterCreation != $dateNextOperation)
            $request->setStatusCode(400);

        $request->assertStatus(201);
    }

    public function test_relation_between_tool_and_category(): void
    {
        $tool = Tool::find('1');

        $toolCategoryName = $tool->category->name;
        self::assertSame('Extincteurs', $toolCategoryName);
    }

    public function test_relation_between_maintenance_and_tool(): void
    {
        $maintenance = Maintenance::find('1');
        $toolLocalisation = $maintenance->tool->localisation;

        self::assertSame('Bâtiment A', $toolLocalisation);
    }

    public function test_relation_between_maintenance_category_through_tool(): void
    {
        $maintenance = Maintenance::find('1');
        $categoryName = $maintenance->tool->category->name;

        self::assertSame('Extincteurs', $categoryName);
    }
}
