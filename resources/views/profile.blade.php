<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#fff7fa">
        <meta name="description" content="{{ $profile?->tagline ?: 'Kenali lebih dekat cerita, karya, dan perjalanan saya.' }}">
        <title>djeliweb</title>

        @fonts
        <link rel="stylesheet" href="{{ asset('profile.css') }}">
        @vite('resources/js/app.jsx')
    </head>
    <body>
        <header class="site-header page-shell" id="top">
            <a class="brand" href="#top" aria-label="Kembali ke atas">
                {{ collect(explode(' ', trim($profile?->name ?: 'Jelita Agustin')))->filter()->take(2)->map(fn ($part) => mb_substr($part, 0, 1))->implode('') }}
            </a>
            <nav class="main-nav" aria-label="Navigasi utama">
                <a href="#tentang">Tentang</a>
                <a href="#keahlian">Keahlian</a>
                <a href="#karya">Karya</a>
                <a class="nav-contact" href="#kontak">
                    Hubungi saya
                    <svg viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h10M8 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </nav>
        </header>

        <main>
            <section
                id="hero-root"
                class="hero page-shell"
                aria-labelledby="hero-title"
                data-name="{{ $profile?->name ?: 'Jelita Agustin' }}"
                data-tagline="{{ $profile?->tagline ?: 'Ceritakan hal yang kamu sukai, nilai yang kamu pegang, dan apa yang membuatmu terus melangkah.' }}"
                data-avatar-url="{{ $profile?->avatar_url ?: asset('profile-jelita.png') }}"
                data-location="{{ $profile?->location ?: 'Jakarta, Indonesia' }}"
            ></section>

            <section class="content-section page-shell" id="tentang" aria-labelledby="about-title">
                <div class="section-heading">
                    <div>
                        <p class="section-index">01 / Tentang saya</p>
                        <h2 id="about-title">Sedikit tentang saya</h2>
                    </div>
                    <p class="section-aside">Hal-hal kecil yang membentuk siapa diriku hari ini.</p>
                </div>
                <div class="about-grid">
                    <p class="about-copy">{{ $profile?->about ?: 'Bagian ini bisa kamu isi dengan cerita singkat tentang dirimu: apa yang kamu kerjakan, hal yang kamu sukai, dan perjalanan yang membawamu ke sini.' }}</p>
                    <dl class="detail-list">
                        <div class="detail-row">
                            <dt>Nama</dt>
                            <dd>{{ $profile?->name ?: 'Jelita Agustin' }}</dd>
                        </div>
                        <div class="detail-row">
                            <dt>Aktivitas</dt>
                            <dd>{{ $profile?->headline ?: 'Belajar koding' }}</dd>
                        </div>
                        <div class="detail-row">
                            <dt>Domisili</dt>
                            <dd>{{ $profile?->location ?: 'Jakarta, Indonesia' }}</dd>
                        </div>
                        <div class="detail-row">
                            <dt>Email</dt>
                            <dd>{{ $profile?->email ?: 'email@kamu.com' }}</dd>
                        </div>
                        @foreach ($profile?->social_links ?? [] as $social)
                            @if (($social['label'] ?? null) === 'Instagram' && ! empty($social['url']))
                                <div class="detail-row">
                                    <dt>Instagram</dt>
                                    <dd><a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer">{{ $social['handle'] ?? $social['label'] }}</a></dd>
                                </div>
                            @endif
                        @endforeach
                    </dl>
                </div>
            </section>

            <section class="skills-section" id="keahlian" aria-labelledby="skills-title">
                <div class="page-shell">
                    <div class="skills-top">
                        <h2 id="skills-title">Hal yang saya suka kerjakan</h2>
                        <p>Keahlian, minat, atau hal yang sedang dipelajari</p>
                    </div>
                    <div class="skill-list">
                        @forelse ($profile?->skills ?? ['Keahlian pertamamu', 'Minat yang sedang ditekuni', 'Hal baru yang dipelajari'] as $skill)
                            <span class="skill-chip">{{ $skill }}</span>
                        @empty
                            <span class="skill-chip">Tambahkan keahlianmu di database</span>
                        @endforelse
                    </div>
                </div>
            </section>

            <section class="content-section projects-section page-shell" id="karya" aria-labelledby="projects-title">
                <div class="section-heading">
                    <div>
                        <p class="section-index">02 / Pilihan saya</p>
                        <h2 id="projects-title">Karya &amp; cerita.</h2>
                    </div>
                    <p class="section-aside">Proyek, pengalaman, atau pencapaian yang ingin saya bagikan.</p>
                </div>
                <div class="project-grid">
                    @forelse ($profile?->projects ?? [] as $index => $project)
                        <article class="project-card">
                            <span class="project-number">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                            <p class="project-category">{{ $project['category'] ?? 'Cerita pilihan' }}</p>
                            <h3>{{ $project['title'] ?? 'Judul ceritamu' }}</h3>
                            <p>{{ $project['description'] ?? 'Tambahkan deskripsi singkat tentang cerita atau karya ini.' }}</p>
                            @if (! empty($project['url']))
                                <a class="project-link" href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer">
                                    Lihat selengkapnya
                                    <svg viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M9 3h4v4M13 3 7 9M12 9v4H3V4h4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </a>
                            @endif
                        </article>
                    @empty
                        <article class="project-card">
                            <span class="project-number">01</span>
                            <p class="project-category">Cerita pilihan</p>
                            <h3>Pengembangan web tahun 2026</h3>
                            <p>Proyek pertama saya di bidang pengembangan web pada tahun 2026.</p>
                        </article>
                    @endforelse
                </div>
            </section>

            <section class="contact-card page-shell" id="kontak" aria-labelledby="contact-title">
                <div>
                    <p class="section-index">03 / Mari terhubung</p>
                    <h2 id="contact-title">Punya cerita untuk dibagikan?</h2>
                    <p>Sampaikan cara terbaikmu untuk menghubungi atau temukan saya di media sosial.</p>
                    @if ($profile?->social_links)
                        <div class="social-list" aria-label="Media sosial">
                            @foreach ($profile->social_links as $social)
                                @if (! empty($social['url']))
                                    <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer">{{ $social['label'] ?? 'Media sosial' }} ↗</a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
                @if ($profile?->email)
                    <a class="button-primary" href="mailto:{{ $profile->email }}">
                        Kirim email
                        <svg viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="m2 4 6 5 6-5M3 3h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                @else
                    <a class="button-primary" href="#tentang">
                        Isi detail kontakmu
                        <svg viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h10M8 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                @endif
            </section>
        </main>

        <footer class="site-footer page-shell">
            <p class="footer-note">Dibuat dengan cerita &amp; sedikit rasa penasaran.</p>
            <a class="back-to-top" href="#top">
                Kembali ke atas
                <svg viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M8 13V3m-5 5 5-5 5 5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </footer>
    </body>
</html>
