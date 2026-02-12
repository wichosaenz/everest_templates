/**
 * SaaS Flow — Main JavaScript
 *
 * Handles:
 * 1. Sticky / Glassmorphism Navbar on scroll
 * 2. Mobile menu toggle
 * 3. IntersectionObserver scroll animations
 *
 * @package SaaS_Flow
 * @since   1.0.0
 */

'use strict';

( function () {

	/* =========================================================================
	   1. STICKY NAVBAR — Transparent → Glassmorphism on scroll
	   ========================================================================= */

	const navbar = document.getElementById( 'sf-navbar' );

	if ( navbar ) {
		const SCROLL_THRESHOLD = 50;

		const handleScroll = () => {
			if ( window.scrollY > SCROLL_THRESHOLD ) {
				navbar.classList.add( 'is-scrolled' );
			} else {
				navbar.classList.remove( 'is-scrolled' );
			}
		};

		// Debounce with requestAnimationFrame for performance.
		let ticking = false;
		window.addEventListener( 'scroll', () => {
			if ( ! ticking ) {
				window.requestAnimationFrame( () => {
					handleScroll();
					ticking = false;
				} );
				ticking = true;
			}
		}, { passive: true } );

		// Run once on load in case user refreshes mid-page.
		handleScroll();
	}

	/* =========================================================================
	   2. MOBILE MENU TOGGLE
	   ========================================================================= */

	const menuToggle = document.getElementById( 'sf-navbar-toggle' );
	const mobileMenu = document.getElementById( 'sf-navbar-menu' );

	if ( menuToggle && mobileMenu ) {
		menuToggle.addEventListener( 'click', () => {
			const isOpen = mobileMenu.classList.toggle( 'is-open' );
			menuToggle.classList.toggle( 'is-active' );
			menuToggle.setAttribute( 'aria-expanded', String( isOpen ) );

			// Prevent body scroll when menu is open.
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

	const animatedElements = document.querySelectorAll( '.sf-animate' );

	if ( animatedElements.length > 0 && 'IntersectionObserver' in window ) {
		const observerOptions = {
			root: null,
			rootMargin: '0px 0px -60px 0px',
			threshold: 0.15,
		};

		const observerCallback = ( entries, observer ) => {
			entries.forEach( ( entry ) => {
				if ( entry.isIntersecting ) {
					entry.target.classList.add( 'is-visible' );
					observer.unobserve( entry.target );
				}
			} );
		};

		const observer = new IntersectionObserver( observerCallback, observerOptions );

		animatedElements.forEach( ( el ) => {
			observer.observe( el );
		} );
	} else {
		// Fallback: make everything visible immediately.
		animatedElements.forEach( ( el ) => {
			el.classList.add( 'is-visible' );
		} );
	}

	/* =========================================================================
	   4. SMOOTH SCROLL for anchor links
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
				const targetPosition = targetEl.getBoundingClientRect().top + window.scrollY - navHeight;

				window.scrollTo( {
					top: targetPosition,
					behavior: 'smooth',
				} );
			}
		} );
	} );

} )();
