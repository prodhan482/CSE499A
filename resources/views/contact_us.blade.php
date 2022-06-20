@extends('layouts.web')

@section('custom_styles')

@endsection

@section('content')

<style>
    @import url('https://fonts.goggleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

    .contactUs {
        position: relative;
        width: 100%;
        padding: 40px, 100px;
    }

    .contactUs .title {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2em;
    }

    .contactUs .title h2 {
        color: #fff;
        font-weight: 500;
    }

    .form {
        grid-area: form;
    }

    .info {
        grid-area: info;
    }

    .map {
        grid-area: map;
    }

    .contact {
        padding: 40px;
        background: #fff;
        box-shadow: 0 5px 35px rgba(0, 0, 0, 0.15);
    }

    .box {
        position: relative;
        display: grid;
        grid-template-columns: 2fr 1fr;
        grid-template-rows: 5fr 4fr;
        grid-template-areas:
            "form info"
            "form map";
        grid-gap: 20px;
        margin-top: 20px;
    }

    .contact h3 {
        color: #0e3959;
        font-weight: 500;
        font-size: 1.4em;
        margin-bottom: 10px;
    }

    /* form */
    .formBox {
        position: relative;
        width: 100%;
    }

    .formBox .row50 {
        display: flex;
        gap: 20px;
    }

    .inputBox {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
        width: 50%;
    }

    .formBox .row100 .inputBox {
        width: 100%;
    }

    .inputBox span {
        color: #18b7ff;
        margin-top: 10px;
        margin-bottom: 5px;
        font-weight: 500;
    }

    .inputBox input {
        padding: 10px;
        font-size: 1.1em;
        outline: none;
        border: 1px solid #333;
    }

    .inputBox textarea {
        padding: 10px;
        font-size: 1.1em;
        outline: none;
        border: 1px solid #333;
        resize: none;
        min-height: 220px;
        margin-bottom: 10px;
    }

    .inputBox input[type="submit"] {
        background: #ff578f;
        color: #fff;
        border: none;
        font-size: 1.1em;
        max-width: 120px;
        font-weight: 500;
        cursor: pointer;
        padding: 14px 15px;
    }

    .inputBox ::placeholder {
        color: #999;
    }

    /* INFO */

    .info {
        background: #0e3959;
    }

    .info h3 {
        color: #fff;
    }

    .info .infoBox div {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .info .infoBox div span {
        min-width: 40px;
        height: 40px;
        color: white;
        background: #18b7ff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5em;
        border-radius: 50%;
        margin-right: 15px;
    }

    .info .infoBox div p {
        color: #fff;
        font-size: 1.1em;
    }

    .info .infoBox div a {
        color: #fff;
        text-decoration: none;
        font-size: 1.1em;
    }

    .sci {
        margin-top: 40px;
        display: flex;
    }

    .sci li {
        list-style: none;
        margin-right: 15px;
    }

    .sci li a {
        color: #fff;
        font-size: 2em;
        color: #ccc;
    }

    .sci li a:hover {
        color: #fff;
    }

    .map {
        padding: 0;
    }

    .map iframe {
        width: 100%;
        height: 100%;
    }


    @media(max-width: 991px) {
        body {
            background: #03a9f5;
        }

        .contactUs {
            padding: 20px;
        }

        .box {
            position: relative;
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: auto;
            grid-template-areas:
                "form"
                "info"
                "map";
        }

        .map {
            min-height: 300px;
        }

        .formBox .row50 {
            display: flex;
            gap: 0;
            flex-direction: column;
        }

        .inputBox {
            width: 100%;
        }

        .contact {
            padding: 30px;
        }
    }
</style>


<body>
    {{-- <section class="page-title title-bg13">
                <h2>Contact Us</h2>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Contact Us</li>
                </ul>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section> --}}
    <div class="signup-section ptb-100">
        <div class="container">
            <div class="contactUs">
                <div class="box">
                    <div class="contact form">
                        <h3>Contact Us</h3>
                        <form class="basic-info needs-validation" action="{{ route('contact_us') }}" method="POST">
                            
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="formBox">
                                <div class="row50">
                                    <div class="inputBox">
                                        <span>First Name</span>
                                        <input type="text" placeholder="First Name" name="fname" required/>
                                    </div>
                                    <div class="inputBox">
                                        <span>Last Name</span>
                                        <input type="text" placeholder="Last Name" name="lname" required/>
                                    </div>
                                </div>
                                <div class="row50">
                                    <div class="inputBox">
                                        <span>Email</span>
                                        <input type="email" placeholder="example@mail.com" name="email" required/>
                                    </div>
                                    <div class="inputBox">
                                        <span>Mobile</span>
                                        <input type="text" placeholder="+880 1X1235678" name="phone" required/>
                                    </div>
                                </div>
                                <div class="row100">
                                    <div class="inputBox">
                                        <span>Message</span>
                                        <textarea placeholder="Write Your Message....." name="message" required></textarea>
                                    </div>
                                </div>

                                <div class="row100">
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="contact map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111239.729762746!2d90.42243546382743!3d23.82359779597969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c62fce7d991f%3A0xacfaf1ac8e944c05!2sBasundhara%20Residential%20Area%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1649259192946!5m2!1sen!2sbd"
                            style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="contact info">
                        <h3>Contact Info</h3>
                        <div class="infoBox">
                            <div>
                                <span>
                                    <ion-icon name="location-outline"></ion-icon>
                                </span>
                                <p>Basundhara R/A, Dhaka <br />Bangladesh</p>
                            </div>
                            <div>
                                <span>
                                    <ion-icon name="mail-outline"></ion-icon>
                                </span>
                                <a href="mailto:contact@hilinkz.com">contact@hilinkz.com</a>
                            </div>
                            <div>
                                <span>
                                    <ion-icon name="call-outline"></ion-icon>
                                </span>
                                <a href="tel:+88 01749 117117">+88 01749 117117</a>
                            </div>
                            <ul class="sci">
                                <a href="https://www.facebook.com/hilinkz">
                                    <li>
                                        <ion-icon name="logo-facebook"></ion-icon><a href="#"></a>
                                    </li>
                                </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/company/hilinkz/">
                                        <ion-icon name="logo-linkedin"></ion-icon>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    @endsection

    @section('custom_js')

    @endsection
</body>