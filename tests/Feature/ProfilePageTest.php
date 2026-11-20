<?php

namespace Tests\Feature;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfilePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_displays_profile_content_from_sqlite(): void
    {
        $this->withoutVite();

        Profile::factory()->create([
            'name' => 'Dina Pratama',
            'headline' => 'Desainer',
            'tagline' => 'Saya adalah siswa yang sedang belajar untuk menjadi programmer.',
            'avatar_url' => '/profile-jelita.png',
            'skills' => ['Desain visual'],
            'social_links' => [
                [
                    'label' => 'Instagram',
                    'handle' => '@oseanwoonie',
                    'url' => 'https://www.instagram.com/oseanwoonie/',
                ],
            ],
            'projects' => [
                [
                    'category' => 'Portofolio',
                    'title' => 'Identitas visual',
                    'description' => 'Proyek pilihan saya.',
                    'url' => null,
                ],
            ],
        ]);

        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('DP')
            ->assertSee('Dina Pratama')
            ->assertSee('Saya adalah siswa yang sedang belajar untuk menjadi programmer.')
            ->assertSee('data-name="Dina Pratama"', false)
            ->assertSee('data-avatar-url=', false)
            ->assertSee('profile-jelita.png')
            ->assertDontSee('profile-jelita-2.jpeg')
            ->assertSee('Desainer')
            ->assertSee('Desain visual')
            ->assertSee('@oseanwoonie')
            ->assertSee('https://www.instagram.com/oseanwoonie/')
            ->assertSee('Identitas visual');
    }

    public function test_it_displays_editable_placeholders_when_no_profile_exists(): void
    {
        $this->withoutVite();

        $this->get('/')
            ->assertOk()
            ->assertSee('Nama Kamu')
            ->assertSee('Karya & cerita.');
    }
}
