@extends('layouts.web')

@section('custom_styles')

@endsection

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
*
{
margin: 0;
padding:0;
box-sizing: border-box;
font-family: 'Montserrat', sans-serif;
}
body
{
    background-color: #eeeeee;
    justify-content: center;

}
.contact-container
{margin: 10% 0;
    display: flex;
    flex-direction: row;
    width: 900px;
    max-width: 90%;
    box-shadow:  9px 9px 18px #cdcdcd,              -9px -9px 18px #ffffff;
    margin-left:20%; 

}
/* Left side Design*/
.contact-left
{
    width: 60%;
    padding: 20px;
    color: #52565e;
}
.contact-form
{
    margin-top: 10px;
    width: 100%;
}
.single-row
{
    display: flex;
    justify-content: space-between;
}
.form-in
{
    padding: 0.5em;
    font-size: 14px;
    width: 100%;
    resize: vertical;
    margin-top: 1em;
    background: #eeeeee;
    border: none;
    box-shadow: inset 5px 5px 12px #e0e0e0, 
            inset -5px -5px 12px #fcfcfc;
            outline: none;
    color: #52565e;
}
.single-row + input
{
margin: 0 10px;
}
.ml
{
    margin-left: 10px;
}
.mr
{
    margin-right: 10px;
}

.multiple-row
{
    position: relative;
}
#submit
{
    display: none;
}
#submit + label
{
    position: absolute;
    font-size: 14px;
    bottom: 20px;
    right: 20px;
    padding: 10px;
    background-color: #001935 ;
    background-color: ;
    border-radius: 100%;
    color: #eeeeee;
    box-shadow:  6px 6px 12px #bebebe, 
             -6px -6px 12px #ffffff;
    cursor: pointer;
}

#submit + label:hover
{
    box-shadow: inset 6px 6px 12px #2954b9, 
            inset -6px -6px 12px #3d7eff;
}
/* Right side Design*/
.contact-right
{
    padding: 20px;
    width: 40%;
    background: linear-gradient(#3369e798,#001935),url('https://images.unsplash.com/photo-1597773026935-df49538167e4?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80');
    color: #eeeeee;
}
textarea
{
    min-height: 200px;
}

.contact-info,.social-links
{
font-size: 14px;
margin-top: 40px;
}
.contact-info p
{
    margin-bottom: 20px;
    color: #cdcdcd;
}
.contact-info p  i
{
    margin-right: 20px;
}

.social-links a
{
    font-size: 20px;
    cursor: pointer;
    text-decoration: none;
    color: #eeeeee;
    margin-right: 20px;
    transition: 0.3s;
}
.social-links a:hover
{
margin-left: 10px;
}


@media only screen and (max-width: 770px)
{
    .contact-container
    {
        flex-direction: column;
    }
    .contact-right,.contact-left
    {
        width: 100%;
    }
}
</style>

    <section class="page-title title-bg13">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Contact Us</h2>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>

    <div class="contact-container">
      <div class="contact-left">
        <h2>Send Message</h2>
        <form class="contact-form" method="POST" action="sendMessage">
            @csrf
          <div class="single-row">
              <input type="name" placeholder="Name" class="form-in mr" required>
              <input type="phone" placeholder="Phone Number"class="form-in ml" required>
          </div>
          <div class="multiple-row">
              <input type="email" placeholder="Email" class="form-in" required>
              <textarea placeholder="Your Message" class="form-in" required></textarea>
              <input type="submit" id="submit"><label for="submit"><i class="fas fa-paper-plane"></i></label>
          </div>
                    
        </form>
      </div>
      <div class="contact-right">
        <h2>Contact Informations</h2>
        <div class="contact-info">
          <p><i class="fas fa-phone-alt"></i> +88 01749 117117 </p>
          <p><i class="fas fa-envelope"></i> contact@hilinkz.com </p>
          <p><i class="fas fa-map-marker-alt"></i> Basundhara R/A, Dhaka, Bangladesh</p>
        </div>
    
        
      </div>
    </div>
    
    <section class="subscribe-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="section-title">
                        <h2>Get New Scholarship Notifications</h2>
                        <p>Subscribe & get all related scholarships notification</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="newsletter-form" data-toggle="validator">
                        <input type="email" class="form-control" placeholder="Enter your email" name="EMAIL" required
                            autocomplete="off">
                        <button class="default-btn sub-btn" type="submit">
                            Subscribe
                        </button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('custom_js')

@endsection
