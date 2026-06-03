(function () {
	'use strict';

	const nav = document.querySelector('.primary-navigation');
	const toggle = document.querySelector('.menu-toggle');
	const header = document.querySelector('.site-header');

	if (!nav || !toggle) {
		return;
	}

	const updateHeaderState = function () {
		if (!header) {
			return;
		}

		header.classList.toggle('is-scrolled', window.scrollY > 24);
	};

	updateHeaderState();
	window.addEventListener('scroll', updateHeaderState, { passive: true });

	toggle.addEventListener('click', function () {
		const expanded = toggle.getAttribute('aria-expanded') === 'true';

		toggle.setAttribute('aria-expanded', String(!expanded));
		nav.classList.toggle('is-open', !expanded);
	});

	nav.querySelectorAll('a').forEach(function (link) {
		link.addEventListener('click', function () {
			toggle.setAttribute('aria-expanded', 'false');
			nav.classList.remove('is-open');
		});
	});

	const glow = document.querySelector('.pointer-glow');

	if (glow && window.matchMedia('(pointer: fine)').matches) {
		window.addEventListener('mousemove', function (event) {
			glow.style.transform = 'translateX(' + (event.clientX - 250) + 'px) translateY(' + (event.clientY - 250) + 'px)';
		});
	}

	const canvas = document.querySelector('.hero-canvas');

	if (canvas) {
		const context = canvas.getContext('2d');
		const hero = canvas.closest('.home-hero');

		if (!context || !hero) {
			return;
		}

		const pointer = {
			active: false,
			x: 0,
			y: 0,
		};
		let particles = [];
		let width = 0;
		let height = 0;
		let animationFrame = 0;

		const createParticles = function () {
			const count = Math.min(90, Math.max(42, Math.floor(width / 18)));

			particles = Array.from({ length: count }, function (_, index) {
				return {
					x: Math.random() * width,
					y: Math.random() * height,
					baseSize: 1 + (index % 3) * 0.45,
					vx: (Math.random() - 0.5) * 0.35,
					vy: (Math.random() - 0.5) * 0.35,
				};
			});
		};

		const resizeCanvas = function () {
			const bounds = hero.getBoundingClientRect();
			const ratio = Math.min(window.devicePixelRatio || 1, 2);

			width = Math.max(1, bounds.width);
			height = Math.max(1, bounds.height);
			canvas.width = Math.floor(width * ratio);
			canvas.height = Math.floor(height * ratio);
			canvas.style.width = width + 'px';
			canvas.style.height = height + 'px';
			context.setTransform(ratio, 0, 0, ratio, 0, 0);
			createParticles();
		};

		const draw = function () {
			context.clearRect(0, 0, width, height);

			particles.forEach(function (particle, index) {
				if (pointer.active) {
					const dx = particle.x - pointer.x;
					const dy = particle.y - pointer.y;
					const distance = Math.sqrt(dx * dx + dy * dy);

					if (distance < 140 && distance > 0) {
						const force = (140 - distance) / 140;
						particle.vx += (dx / distance) * force * 0.045;
						particle.vy += (dy / distance) * force * 0.045;
					}
				}

				particle.x += particle.vx;
				particle.y += particle.vy;
				particle.vx *= 0.985;
				particle.vy *= 0.985;

				if (particle.x < 0 || particle.x > width) {
					particle.vx *= -1;
				}

				if (particle.y < 0 || particle.y > height) {
					particle.vy *= -1;
				}

				particle.x = Math.max(0, Math.min(width, particle.x));
				particle.y = Math.max(0, Math.min(height, particle.y));

				for (let nextIndex = index + 1; nextIndex < particles.length; nextIndex++) {
					const next = particles[nextIndex];
					const dx = particle.x - next.x;
					const dy = particle.y - next.y;
					const distance = Math.sqrt(dx * dx + dy * dy);

					if (distance < 115) {
						context.beginPath();
						context.moveTo(particle.x, particle.y);
						context.lineTo(next.x, next.y);
						context.strokeStyle = 'rgba(83, 177, 255, ' + ((1 - distance / 115) * 0.22) + ')';
						context.lineWidth = 1;
						context.stroke();
					}
				}

				context.beginPath();
				context.arc(particle.x, particle.y, particle.baseSize, 0, Math.PI * 2);
				context.fillStyle = 'rgba(83, 177, 255, 0.55)';
				context.fill();
			});

			animationFrame = window.requestAnimationFrame(draw);
		};

		hero.addEventListener('mousemove', function (event) {
			const bounds = canvas.getBoundingClientRect();

			pointer.active = true;
			pointer.x = event.clientX - bounds.left;
			pointer.y = event.clientY - bounds.top;
		});

		hero.addEventListener('mouseleave', function () {
			pointer.active = false;
		});

		window.addEventListener('resize', resizeCanvas);
		resizeCanvas();
		draw();

		window.addEventListener('pagehide', function () {
			window.cancelAnimationFrame(animationFrame);
		});
	}
})();
