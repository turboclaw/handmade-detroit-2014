<?php
/*
Template Name: Page - Panels
*/
?>
<?php get_header(); ?>
<main role="main">
	<section class="panel panel--calendar calendar">
	    <ol>
	        <li class="calendar__event">
	            <a href="#">
	            <date>
	            <span class="month">May</span>
	            <span class="day">3</span>
	            </date>
	            <h4 class="calendar__event__title">Flint Handmade Spring Craft Market</h4>
	            <div class="calendar__event__location">Flint, MI</div>
	            </a>
	        </li>
	        <li class="calendar__event calendar__event--highlight">
	            <a href="#">
	            <date>
	            <span class="month">May</span>
	            <span class="day">10</span>
	            </date>
	            <h4 class="calendar__event__title">Small Craft</h4>
	            <div class="calendar__event__location">Detroit, MI</div>
	            </a>
	        </li>
	        <li class="calendar__event">
	            <a href="#">
	            <date>
	            <span class="month">May</span>
	            <span class="day">16-17</span>
	            </date>
	            <h4 class="calendar__event__title">Spring Fabric Sale</h4>
	            <div class="calendar__event__location">Detroit, MI</div>
	            </a>
	        </li>
	        <li class="calendar__event">
	            <a href="#">
	            <date>
	            <span class="month">Jun</span>
	            <span class="day">7</span>
	            </date>
	            <h4 class="calendar__event__title">Yarn Bomb the Garden</h4>
	            <div class="calendar__event__location">Ann Arbor, MI</div>
	            </a>
	        </li>
	        <li class="calendar__event">
	            <a href="#">
	            <date>
	            <span class="month">Jun</span>
	            <span class="day">14</span>
	            </date>
	            <h4 class="calendar__event__title">Berkley Art Bash</h4>
	            <div class="calendar__event__location">Berkley, MI</div>
	            </a>
	        </li>
	    </ol>
	</section>

	<section class="panel">
	    <div class="panel__header">
	        <p class="panel__tagline">The latest from the <a href="#">HD blog</a></p>
	        <h1 class="panel__title"><a href="#">The Craft Circle Keeps on Turning…</a></h1>
	    </div>
	    <div class="panel__body">
	        <span>Lots of changes and shakeups going on in the metro Detroit craft world lately, but one thing you can always count on is artists adapting and continuing on with new opportunities!</span>
	    </div>
	</section>
	<section class="panel panel--ducf">
	    <div class="panel__header">
	        <h1 class="panel__title">Detroit Urban Craft Fair</h1>
	    </div>
	    <div class="panel__body">
	        <span>Michigan's largest collection of whatever it is, or something good about the fair. I don't know. Applications are open now!</span>
	    </div>
	</section>
</main>
<?php get_footer(); ?>