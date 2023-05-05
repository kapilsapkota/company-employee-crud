<?php

namespace Tests\Feature;

use App\Mail\CompanyCreated;
use App\Models\Company;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;

    /**
     * Test the creation of a company and check if an email notification is sent.
     *
     * @return void
     */
    public function testCompanyCreationWithNotification()
    {
        Mail::fake();

        $response = $this->post('/companies', [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'logo' => UploadedFile::fake()->image('logo.png', 100, 100),
            'website' => $this->faker->url,
        ]);

        $response->assertRedirect('/companies');
        $response->assertSessionHas('success');

        $company = Company::latest()->first();

        Mail::assertSent(CompanyCreated::class, function ($mail) use ($company) {
            return $mail->company->id === $company->id;
        });
    }
}
