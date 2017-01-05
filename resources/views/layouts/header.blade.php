<!-- Navigation -->
<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
        <li class="sidebar-brand">
            {!! link_to_route('homepage', config('app.name'), ['locale' => $locale]) !!}
        </li>
        <li>
            {!! link_to_route('homepage', __('Home'), ['locale' => $locale]) !!}
        </li>
        <li>
            {!! link_to_route('login', __('Login'), ['locale' => $locale]) !!}
        </li>
        <li>
            {!! link_to_route('register', __('Register'), ['locale' => $locale]) !!}
        </li>
        <li>
            <a href="#about" onclick=$("#menu-close").click();>About</a>
        </li>
        <li>
            <a href="#services" onclick=$("#menu-close").click();>Services</a>
        </li>
        <li>
            <a href="#portfolio" onclick=$("#menu-close").click();>Portfolio</a>
        </li>
        <li>
            {!! link_to_route('contact-page', __('Contact'), ['locale' => $locale]) !!}
        </li>
    </ul>
</nav>