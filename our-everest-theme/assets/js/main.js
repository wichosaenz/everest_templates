/**
 * Our Everest Theme — Main JavaScript
 *
 * Handles:
 * 1. Sticky navbar shadow on scroll
 * 2. Mobile menu toggle
 * 3. IntersectionObserver scroll animations
 * 4. Smooth anchor scrolling
 *
 * @package Our_Everest_Theme
 * @since   2.0.0
 */

'use strict';

( function () {

	/* =========================================================================
	   1. STICKY NAVBAR — Add shadow on scroll
	   ========================================================================= */

	const navbar = document.getElementById( 'oet-navbar' );

	if ( navbar ) {
		const SCROLL_THRESHOLD = 10;
		let ticking = false;

		const handleScroll = () => {
			if ( window.scrollY > SCROLL_THRESHOLD ) {
				navbar.classList.add( 'is-scrolled' );
			} else {
				navbar.classList.remove( 'is-scrolled' );
			}
		};

		window.addEventListener( 'scroll', () => {
			if ( ! ticking ) {
				window.requestAnimationFrame( () => {
					handleScroll();
					ticking = false;
				} );
				ticking = true;
			}
		}, { passive: true } );

		handleScroll();
	}

	/* =========================================================================
	   2. MOBILE MENU TOGGLE
	   ========================================================================= */

	const menuToggle = document.getElementById( 'oet-navbar-toggle' );
	const mobileMenu = document.getElementById( 'oet-navbar-menu' );

	if ( menuToggle && mobileMenu ) {
		menuToggle.addEventListener( 'click', () => {
			const isOpen = mobileMenu.classList.toggle( 'is-open' );
			menuToggle.classList.toggle( 'is-active' );
			menuToggle.setAttribute( 'aria-expanded', String( isOpen ) );
			document.body.style.overflow = isOpen ? 'hidden' : '';
		} );

		// Close menu when a link is clicked.
		mobileMenu.querySelectorAll( 'a' ).forEach( ( link ) => {
			link.addEventListener( 'click', () => {
				mobileMenu.classList.remove( 'is-open' );
				menuToggle.classList.remove( 'is-active' );
				menuToggle.setAttribute( 'aria-expanded', 'false' );
				document.body.style.overflow = '';
			} );
		} );
	}

	/* =========================================================================
	   3. INTERSECTION OBSERVER — Scroll Animations
	   ========================================================================= */

	const animatedElements = document.querySelectorAll( '.oet-animate' );

	if ( animatedElements.length > 0 && 'IntersectionObserver' in window ) {
		const observer = new IntersectionObserver(
			( entries, obs ) => {
				entries.forEach( ( entry ) => {
					if ( entry.isIntersecting ) {
						entry.target.classList.add( 'is-visible' );
						obs.unobserve( entry.target );
					}
				} );
			},
			{
				root: null,
				rootMargin: '0px 0px -50px 0px',
				threshold: 0.12,
			}
		);

		animatedElements.forEach( ( el ) => observer.observe( el ) );
	} else {
		// Fallback: show everything immediately.
		animatedElements.forEach( ( el ) => el.classList.add( 'is-visible' ) );
	}

	/* =========================================================================
	   4. SMOOTH ANCHOR SCROLL
	   ========================================================================= */

	document.querySelectorAll( 'a[href^="#"]' ).forEach( ( anchor ) => {
		anchor.addEventListener( 'click', ( e ) => {
			const targetId = anchor.getAttribute( 'href' );
			if ( ! targetId || targetId === '#' ) {
				return;
			}

			const targetEl = document.querySelector( targetId );
			if ( targetEl ) {
				e.preventDefault();
				const navHeight = navbar ? navbar.offsetHeight : 0;
				const top = targetEl.getBoundingClientRect().top + window.scrollY - navHeight;

				window.scrollTo( { top, behavior: 'smooth' } );
			}
		} );
	} );

} )();
