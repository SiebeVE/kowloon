@extends('layouts.app')

@section('content')
	<div class="header">
		<img src="/images/headers/about-us.jpg" alt="Laughing brunette girl with white dog">
	</div>
	<span class="title-with-heart">Kowloon</span>
	<div class="inner-content about-us">
		<div class="tags">
			<div class="tag">
				about us
			</div>
		</div>
		<h1 class="bold size-1">About us</h1>
		<section class="info-contact">
			<article class="info">
				<h2 class="bold size-3">Kowloon</h2>
				<p>Pet Concept, active since 1998, is developing, importing and exporting products for pets
					worldwide.</p>
				<p>natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
					illo
					inventore veritatis et quasi architecto beatae vitae sequi nesciunt.</p>
			</article>
			<article class="contact">
				<h2 class="bold size-3">Contact</h2>
				<ul>
					<li>Deckx Johan</li>
					<li>Bosdreef 7</li>
					<li>2200 Herentals</li>
				</ul>
			</article>
		</section>
		<section>
			<h2 class="bold size-3">Leave us a message</h2>
			<form>
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="email" id="email" name="email" placeholder="name@domain.com">
				</div>
				<div class="form-group">
					<label for="message">Your message</label>
					<textarea id="message" name="message" placeholder="Write your message here"></textarea>
				</div>
				<button type="submit" class="submit">Send</button>
			</form>
		</section>
		<section class="faqs">
			<h2 class="bold size-3">Frequently asked questions</h2>
			<article class="faq">
				<h3 class="faq-title">Dit is een vraag</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit..Lorem ipsum dolor sit amet, consectetur
					adipisicing elit..Lorem ipsum dolor sit amet, consectetur adipisicing elit..Lorem ipsum dolor sit
					amet, consectetur adipisicing elit..Lorem ipsum dolor sit amet, consectetur adipisicing elit..</p>
			</article>
			<article class="faq opened">
				<h3 class="faq-title">Dit is een vraag</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit..Lorem ipsum dolor sit amet, consectetur
					adipisicing elit..Lorem ipsum dolor sit amet, consectetur adipisicing elit..Lorem ipsum dolor sit
					amet, consectetur adipisicing elit..Lorem ipsum dolor sit amet, consectetur adipisicing elit..Lorem ipsum dolor sit amet, consectetur adipisicing elit..Lorem ipsum dolor sit amet, consectetur
					adipisicing elit..Lorem ipsum dolor sit amet, consectetur adipisicing elit..Lorem ipsum dolor sit
					amet, consectetur adipisicing elit..Lorem ipsum dolor sit amet, consectetur adipisicing elit..Lorem ipsum dolor sit amet, consectetur adipisicing elit..Lorem ipsum dolor sit amet, consectetur
					adipisicing elit..Lorem ipsum dolor sit amet, consectetur adipisicing elit..Lorem ipsum dolor sit
					amet, consectetur adipisicing elit..Lorem ipsum dolor sit amet, consectetur adipisicing elit..</p>
			</article>
		</section>
	</div>
@endsection