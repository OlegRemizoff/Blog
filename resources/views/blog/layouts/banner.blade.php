
    <header class="head-image">
        <!-- Фоновое изображение -->
        @if (isset($heroimage->image)) 
            <img src="{{ $heroimage->getImage() }}" alt="...">
        @else 
            <img src="{{ asset('index_background.jpg') }}" alt="...">
        @endif
        <!-- Контент поверх -->
        <div class="content">
            <h1>Welcome to Our Website</h1>
            <p>Your tagline or description goes here.</p>
            <!-- <a href="#cta" class="btn btn-primary">Learn More</a> -->
        </div>
    </header>
     

    








<!-- <div class="container container-fullwidth">
    <div class="hero-section">
        <div class="box-center v2">
            <h1 class="page-title">Blog Classic</h1>
            <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href="">Elements</a></li>
                <li><a href="">Banner</a></li>
            </ul>
        </div>
    </div>
</div> -->