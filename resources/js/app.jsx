import { useEffect, useRef } from 'react';
import { createRoot } from 'react-dom/client';
import { motion, useReducedMotion } from 'framer-motion';
import { gsap } from 'gsap';

function Hero({ profile }) {
    const portraitRef = useRef(null);
    const photoRef = useRef(null);
    const locationRef = useRef(null);
    const prefersReducedMotion = useReducedMotion();

    useEffect(() => {
        if (prefersReducedMotion) {
            return undefined;
        }

        const context = gsap.context(() => {
            gsap.fromTo(
                photoRef.current,
                { scale: 1.06, opacity: 0.65 },
                { scale: 1, opacity: 1, duration: 1.2, ease: 'power3.out' },
            );
            gsap.fromTo(
                locationRef.current,
                { autoAlpha: 0, y: 8 },
                { autoAlpha: 1, y: 0, duration: 0.65, delay: 0.4, ease: 'power2.out' },
            );
        }, portraitRef);

        return () => context.revert();
    }, [prefersReducedMotion]);

    const initialReveal = prefersReducedMotion ? false : { opacity: 0, y: 22 };
    const revealTransition = prefersReducedMotion
        ? { duration: 0 }
        : { duration: 0.75, ease: [0.22, 1, 0.36, 1] };

    return (
        <>
            <motion.div
                className="hero-copy"
                initial={initialReveal}
                animate={{ opacity: 1, y: 0 }}
                transition={revealTransition}
            >
                <p className="eyebrow">Halo, Kenali Saya</p>
                <h1 id="hero-title">{profile.name}</h1>
                <p className="hero-description">{profile.tagline}</p>
                <div className="button-row">
                    <motion.a
                        className="button-primary"
                        href="#karya"
                        whileHover={prefersReducedMotion ? undefined : { y: -2 }}
                        transition={{ duration: 0.2 }}
                    >
                        Lihat karya saya
                        <svg viewBox="0 0 16 16" fill="none" aria-hidden="true">
                            <path d="M3 8h10M8 3l5 5-5 5" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round" />
                        </svg>
                    </motion.a>
                    <a className="text-link" href="#tentang">
                        Kenali saya
                        <svg viewBox="0 0 16 16" fill="none" aria-hidden="true">
                            <path d="M8 3v10m-5-5 5 5 5-5" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round" />
                        </svg>
                    </a>
                </div>
            </motion.div>

            <motion.div
                ref={portraitRef}
                className="portrait-wrap"
                aria-label="Foto profil"
                initial={prefersReducedMotion ? false : { opacity: 0, y: 18 }}
                animate={{ opacity: 1, y: 0 }}
                transition={prefersReducedMotion ? { duration: 0 } : { ...revealTransition, delay: 0.12 }}
            >
                <img ref={photoRef} className="portrait-image" src={profile.avatarUrl} alt={`Foto ${profile.name}`} />
                <div ref={locationRef} className="location-pill">
                    <svg viewBox="0 0 16 16" fill="none" aria-hidden="true">
                        <path d="M13 6.7c0 3.2-5 7.3-5 7.3S3 9.9 3 6.7a5 5 0 1 1 10 0Z" stroke="currentColor" strokeWidth="1.4" />
                        <circle cx="8" cy="6.5" r="1.5" stroke="currentColor" strokeWidth="1.4" />
                    </svg>
                    {profile.location}
                </div>
            </motion.div>
        </>
    );
}

const heroRoot = document.getElementById('hero-root');

if (heroRoot) {
    createRoot(heroRoot).render(
        <Hero
            profile={{
                name: heroRoot.dataset.name || 'Jelita Agustin',
                tagline: heroRoot.dataset.tagline || 'Ceritakan hal yang kamu sukai dan apa yang membuatmu terus melangkah.',
                avatarUrl: heroRoot.dataset.avatarUrl || '/profile-jelita.png',
                location: heroRoot.dataset.location || 'Jakarta, Indonesia',
            }}
        />,
    );
}
