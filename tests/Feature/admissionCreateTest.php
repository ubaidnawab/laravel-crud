<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class admissionCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_addmission()
    {
        $data = [
            'full_name' => 'ubaid nawab',
            'email'     => 'ubaid.nawab@cc.co',
            'address_1' => 'address 1',
            'address_2' => 'address 2',
            'city'      => 'karachi',
            'state'     => 'sindh',
            'zip'       => '75300',
            'profile_image' => UploadedFile::fake()->image('myimages404.jpg')
        ];

        $response = $this->post('/admission', $data);

        $response->assertStatus(200);
    }
}
