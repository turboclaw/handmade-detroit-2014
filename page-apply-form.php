<?php
/*
Template Name: Application Form
*/
?>
<?php get_header(); ?>
<main role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( "article article--full" ); ?>>
        <header class="article__header">
            <h1 class="article__title"><?php the_title(); ?></h1>
        </header>
        <div class="article__body cf">
            <p>Are you a crafty maker and seller? We want you! Please take a moment to read through our <a href="/faq/">Vendor FAQs</a> before applying.</p>
            <form action="/apply-processing.php" method="post" enctype="multipart/form-data" id="apply_form" class="grid form form--apply">
                <div class="form__control-group grid__cell--one">
                    <label for="business_name">Business Name</label>
                    <input type="text" name="business_name" id="business_name" required />
                </div>
                <div class="form__control-group grid__cell--one">
                    <label for="contact_name">Your Name</label>
                    <input type="text" name="contact_name" id="contact_name" required />
                </div>
                <div class="form__control-group grid__cell--one-third">
                    <label for="website_url">Website</label>
                    <input type="url" name="website_url" id="website_url" />
                </div>
                <div class="form__control-group grid__cell--one-third">
                    <label for="email_address">Email</label>
                    <input type="email" name="email_address" id="email_address" required />
                </div>
                <div class="form__control-group grid__cell--one-third">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" />
                </div>
                <div class="form__control-group grid__cell--one">
                    <label for="address_street">Street Address</label>
                    <input type="text" name="address_street" id="address_street" />
                </div>
                <div class="form__control-group grid__cell--one-third">
                    <label for="address_city">City</label>
                    <input type="text" name="address_city" id="address_city" />
                </div>
                <div class="form__control-group grid__cell--one-third">
                    <label for="address_state">State/Province</label>
                    <select name="address_state">
                        <option value="" selected="selected">--</option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District Of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option><option value"">------</option><option value="AB">Alberta</option><option value="BC">British Columbia</option><option value="MB">Manitoba</option><option value="NB">New Brunswick</option><option value="NL">Newfoundland</option><option value="NT">NW Territories</option><option value="NS">Nova Scotia</option><option value="NU">Nunavut</option><option value="ON">Ontario</option><option value="PE">Prince Edward Island</option><option value="QC">Quebec</option><option value="SK">Saskatchewan</option><option value="YT">Yukon</option>
                    </select>
                </div>
                <div class="form__control-group grid__cell--one-third">
                    <label for="address_zip" class="short">Postal Code</label>
                    <input type="text" name="address_zip" id="address_zip" />
                </div>
                <div class="form__control-group grid__cell--one-half">
                    <label for="craft_id">What type of crafts do you primarily sell?</label>
                    <select name="craft_id" id="craft_id">
                        <option value="" selected="selected">Select One</option>
                        <option value="11">Bath Products</option>
                        <option value="9">Childrens' Items</option>
                        <option value="3">Clothing or T-shirts</option>
                        <option value="6">Handbags</option>
                        <option value="8">Housewares</option>
                        <option value="4">Jewelry</option>
                        <option value="12">Kits/Patterns</option>
                        <option value="1">Knit Items</option>
                        <option value="2">Papergoods</option>
                        <option value="10">Pet Items</option>
                        <option value="5">Plush</option>
                        <option value="7">Sewn Accessories</option>
                        <option value="14">Food</option>
                        <option value="13">Other (please specify in the comments below)</option>
                    </select>
                    <label><small>If you wish to specify multiple categories, let us know in the comments below.</small></label>
                </div>
                <div class="form__control-group grid__cell--one-half">
                    <label for="pricerange">What is the price range of your items?</label>
                    <input type="text" name="pricerange" id="pricerange" />
                </div>
                <div class="form__control-group grid__cell--one">
                    <label for="howmade">How are your crafts made?</label>
                    <textarea name="howmade" id="howmade" rows="4" cols="40"></textarea>
                </div>
                <div class="form__control-group grid__cell--one">
                    <label for="materials">What materials are used in your crafts?</label>
                    <input type="text" name="materials" id="materials" />
                </div>
                <div class="form__control-group grid__cell--one">
                    <label for="photos_0">The Detroit Urban Craft Fair is a juried event. Please submit up to five images of the work you plan to sell.</label>
                    <label class="note">The filesize of each photo <em>must</em> be less than 500kb. Your application may not process successfully if your images are too large.</label>
                    <div id="photo_uploads" class="grid">
                        <div class="grid__cell--one-third"><input type="file" name="photos_0" id="photos_0" /></div>
                        <div class="grid__cell--one-third"><input type="file" name="photos_1" id="photos_1" /></div>
                        <div class="grid__cell--one-third"><input type="file" name="photos_2" id="photos_2" /></div>
                        <div class="grid__cell--one-third"><input type="file" name="photos_3" id="photos_3" /></div>
                        <div class="grid__cell--one-third"><input type="file" name="photos_4" id="photos_4" /></div>
                    </div>
                </div>
                <div class="form__control-group grid__cell--one-half">
                    <label for="speak_press">Are you willing to speak to the press in regards to the promotion of the Detroit Urban Craft Fair?</label>
                    <select name="speak_press" id="speak_press">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div>
                <div class="form__control-group grid__cell--one">
                    <label for="why_special">Tell us in 1-2 sentences what makes your work special! (This may be used along with images of your work for press, Handmade Detroit website, etc.)</label>
                    <textarea name="why_special" id="why_special" rows="4" cols="40"></textarea>
                </div>
                <div class="form__control-group grid__cell--one">
                    <label for="comments">Comments</label>
                    <textarea name="comments" id="comments" rows="6" cols="40"></textarea>
                </div>
                <div class="grid__cell--one">
                    <p><strong>Applications are due by Midnight, September 25th.</strong></p>
                    <p>All applicants will be notified of status (acceptance, waiting list or rejection) by October 6th.</p>
                    <h3>Application Fee</h3>
                    <p>The application fee is $10 and is non-refundable. <span class="note">Be sure to enter your business name<span class="js-businessName"></span> on the PayPal checkout page. Your application will be rejected if we can't match up paid fees to submitted apps.</p>
                    <p><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KN8C7YPLSCG2J" target="_blank" class="button">Pay Application Fee on PayPal.com</a></p>
                    <div class="form__control-group--toggle">
                        <input type="checkbox" name="name_on_apps" value="" id="name_on_apps" required /><label for="name_on_apps">Yes, I entered my business name<span class="js-businessName"></span> with my application fee on PayPal.</label>
                    </div>
                    <h3>Vendor Fee</h3>
                    <p>$175 due upon acceptance. For an additional $75 ($250 total), you may request a corner space. For more info on fees and payment, please see the <a href="/faq/">FAQs</a>.</p>
                    <h3>Vendor Policies</h3>
                    <div class="app_policies">
                        <p>PLEASE READ THE FOLLOWING TERMS AND CONDITIONS VERY CAREFULLY.</p>
                        <ul>
                            <li>Detroit Urban Craft Fair is a &quot;juried event&quot;. Hereinafter &quot;juried event&quot; shall be used to reference a sales based event that requires advanced vendor application, screening and acceptance by Handmade Detroit. Vendors who fulfill Detroit Urban Craft Fair application requirements, are screened and accepted by Handmade Detroit will hereinafter be known as &quot;Accepted Vendors&quot;.</li>
                            <li>Accepted Vendors may only bring, sell, promote and display original work shown or described in the Detroit Urban Craft Fair Application submitted by Accepted Vendors and approved by Handmade Detroit.</li>
                            <li>Accepted Vendors who wish to bring, sell, promote or display additional original work not shown or described in the Detroit Urban Craft Fair Application must contact Handmade Detroit no later than seven (7) business days prior to the date of the event for Handmade Detroit approval. All Accepted Vendors, Accepted Vendor employees, family members and guests found violating this provision will be removed from Detroit Urban Craft Fair and banned from future Handmade Detroit events.</li>
                            <li>Accepted Vendors who change their business or personal name, website, contact information or any other information from that submitted in the Detroit Urban Craft Fair Application before the event date must contact Handmade Detroit with updated information.</li>
                            <li>Accepted Vendor display space is assigned prior to the event date. Upon arrival, all Accepted Vendors must check in with a Handmade Detroit member at the Handmade Detroit table.   </li>
                            <li>Accepted Vendor displays must remain set up in their space until the close of the Detroit Urban Craft Fair.</li>
                            <li>Accepted Vendors are responsible for their own clean up.</li>
                            <li>Music of any sort is prohibited.</li>
                            <li>Accepted Vendors consent to being photographed and recorded for publicity and promotion purposes.</li>
                            <li>Accepted Vendors may not sell merchandise that contains the words &quot;Detroit Urban Craft Fair&quot;; &quot;Handmade Detroit&quot;; &quot;Craft Revival&quot; or depicting Handmade Detroit; Craft Revival or Detroit Urban Craft Fair logos (including the mitten pin or similar likeness), slogans or sinage unless specifically authorized by Handmade Detroit.</li>
                            <li>Mass-produced merchandise is prohibited at all Handmade Detroit events.</li>
                            <li>Accepted Vendors are solely responsible for collection and payment of their own taxes (all applicable city, county, state and federal sales and other taxes), licenses, personal and business liabilities and insurance.</li>
                            <li>Accepted Vendors agree to accept full responsibility for any damage caused by the negligence or volition of the Accepted Vendor, Accepted Vendor family members, employees or guests during event setup, tear down or event hours. Accepted Vendor responsibility specifically includes payment of all damages and indemnification of Handmade Detroit from any such liability.</li>
                            <li>Handmade Detroit and Detroit Urban Craft Fair representatives and agents shall not be responsible for or liable to Accepted Vendors for any loss or damage that may result to Accepted Vendors or Accepted Vendor property from any source or any cause whatsoever.</li>
                            <li>Handmade Detroit and Detroit Urban Craft Fair representatives and agents make no guarantees of any sort to Accepted Vendors including guarantees of Accepted Vendor profit, sales, business, promotion, or advertisement opportunities.</li>
                            <li>Application fees and other related costs are NONREFUNDABLE. NO EXCEPTIONS.</li>
                            <li>Handmade Detroit and the Detroit Urban Craft Fair reserve the right to reject any applicant for any reason whatsoever.</li>
                            <li>If any provision of these terms and conditions is held to be unlawful, void, or for any reason unenforceable, the unlawful, void, or unenforceable provision shall be severable and shall not affect the validity or enforceability of the remaining provisions.</li>
                        </ul>
                    </div>
                    <div class="form__control-group--toggle">
                        <input type="checkbox" name="accept_policy" value="" id="accept_policy" required /><label for="accept_policy">I have read and understood the Vendor Policies; and agree that violation of any of these policies will give DUCF the right to remove me from the Fair, without refund of the Vendor Fee.</label>
                    </div>
                    <div class="form__control-group">
                        <button type="submit" data-icon="michigan">Submit your Application to DUCF 2014</button>
                    </div>
                    <p class="note">Please click the submit button only once and wait for a confirmation page. Do not close your browser window. The application may take a little while to process, especially if you're uploading images too.</p>
                </div>
            </form>
        </div>
    </article>

    <?php endwhile; ?>
    <?php else : ?>
    <article id="post-not-found" class="article">
        uh
    </article>

    <?php endif; ?>
</main>
<script src="<?php bloginfo("template_directory");?>/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php bloginfo("template_directory");?>/bower_components/parsleyjs/dist/parsley.min.js"></script>
<script type="text/javascript">
$("#apply_form").parsley();
$("#business_name").on("blur", function() {
    $(".js-businessName").text(', "' + $(this).val() + '",');
});
</script>
<?php get_footer(); ?>
