@extends('layout.layout')


@section('content')
    <div id="ecommerceCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
  {{-- Indicators --}}
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#ecommerceCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#ecommerceCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#ecommerceCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  {{-- Slides --}}
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('image/slide.1.webp') }}" class="d-block w-100" alt="Slide 1">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('image/slide.2.webp') }}" class="d-block w-100" alt="Slide 2">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('image/slide.3.webp') }}" class="d-block w-100" alt="Slide 3">
    </div>
    
  </div>

  {{-- Controls --}}
  <button class="carousel-control-prev" type="button" data-bs-target="#ecommerceCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#ecommerceCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


{{-- products  --}}
<div class="container py-4">
  <div class="row">
    <!-- Product Card with 4 Images -->
    <div class="col-md-4">
     
      <div class="product-card">
        <h3 class="py-3">Appliances for your home | Up to 55% off</h3>
        <div class="product-images">
          <div>
            
          <img src="{{ asset('product_img/p1.jpg') }}" alt="Image 1">
          <p>Air conditioners</p>
          
        </div>
        <div>
          <img src="{{ asset('product_img/p2.jpg') }}" alt="Image 2">
          <p>Refrigerators</p>
          </div>
          <div>
          <img src="{{ asset('product_img/p3.jpg') }}" alt="Image 3">
              <p>Microwaves</p>
          </div>
           <div>
          <img src="{{ asset('product_img/p4.jpg') }}" alt="Image 4">
              <p>Washing machines</p>
          </div>
        </div>
        
        <a href="{{ route('product3') }}" class="text-decoration-none">see more</a>
        <div class="product-title">Shoe Rack</div>
        <div class="product-tag">Min. 50% Off</div>
      </div>
    </div>
      <div class="col-md-4">
      <div class="product-card">
         <h3 class="py-3">Revamp your home in style</h3>
        <div class="product-images">
         
           <div>
          <img src="{{ asset('product_img/p5.jpg') }}" alt="Image 1">
            <p>Cushion covers </p>

          </div>
           <div>
          <img src="{{ asset('product_img/p6.jpg') }}" alt="Image 2">
          <p>Figurines, vases </p>
           </div>
           
           <div>

          <img src="{{ asset('product_img/p7.jpg') }}" alt="Image 3">
          <p>Home storage</p>
          </div>
           <div>
          <img src="{{ asset('product_img/p8.jpg') }}" alt="Image 4">
          <p>Lighting solutions</p>

           </div>
        </div>
                <a href="{{ route('product4') }}" class="text-decoration-none">see more</a>

        <div class="product-title">Shoe Rack</div>
        <div class="product-tag">Min. 50% Off</div>
      </div>
    </div>
      <div class="col-md-4">
      <div class="product-card">
         <h3 class="py-3"> Up to 60% off | Styles for women</h3>
       
        <div class="product-images">
          <div>
          <img src="{{ asset('product_img/p9.jpg') }}" alt="Image 1">
          <p>Women's Clothing</p>
          </div>
          <div>
          <img src="{{ asset('product_img/p10.jpg') }}" alt="Image 2">
          <p>Footwear+Handbags</p>
          </div>
          <div>
          <img src="{{ asset('product_img/p11.jpg') }}" alt="Image 3">
              <p>Watches</p>
          </div>
          <div>
          <img src="{{ asset('product_img/p12.jpg') }}" alt="Image 4">
             <p>Fashion jewellery</p>
          </div>
        </div>
                <a href="{{ route('product5') }}" class="text-decoration-none">see more</a>

        <div class="product-title">Shoe Rack</div>
        <div class="product-tag">Min. 50% Off</div>
      </div>
    </div>
  </div>
</div>


{{-- next products --}}


<div class="container py-4">
  <div class="row">
    <!-- Product Card with 4 Images -->
    <div class="col-md-4">
      <div class="product-card">
         <h3 class="py-3"> Under ₹499 | Deals on home improvement</h3>
        <div class="product-images">
          <div>
          <img src="{{ asset('product_img/p13.jpg') }}" alt="Image 1">
            <p>Under ₹199 | Cleaning supplies</p>
          </div>
           <div>
          <img src="{{ asset('product_img/p14.jpg') }}" alt="Image 2">
             <p>Under ₹399 | Bathroom accessories</p>
          </div>
           <div>
          <img src="{{ asset('product_img/p15.jpg') }}" alt="Image 3">
             <p>Under ₹499 | Home tools</p>
          </div>
           <div>
          <img src="{{ asset('product_img/p16.jpg') }}" alt="Image 4">
             <p>Under ₹299 | Wallpapers</p>
          </div>
        </div>
                <a href="{{ route('product6') }}" class="text-decoration-none">see more</a>

        <div class="product-title">Shoe Rack</div>
        <div class="product-tag">Min. 50% Off</div>
      </div>
    </div>
      <div class="col-md-4">
      <div class="product-card">
         <h3 class="py-3"> Min. 40% off | Fun toys & games | Amazon Brands</h3>
        <div class="product-images">
           <div>
          <img src="{{ asset('product_img/p17.jpg') }}" alt="Image 1">
             <p>Min. 40% off | soft toys</p>
          </div>
             <div>
          <img src="{{ asset('product_img/p18.jpg') }}" alt="Image 2">
               <p>Min. 40% off | Indoor games</p>
          </div>
           <div>
          <img src="{{ asset('product_img/p19.jpg') }}" alt="Image 3">
             <p>Min. 50% off | Ride ons</p>
          </div>
           <div>
          <img src="{{ asset('product_img/p20.jpg') }}" alt="Image 4">
             <p>Min. 50% off | outdoor games</p>
          </div>
        </div>
                <a href="{{ route('product7') }}" class="text-decoration-none">see more</a>

        <div class="product-title">Shoe Rack</div>
        <div class="product-tag">Min. 50% Off</div>
      </div>
    </div>
      <div class="col-md-4">
      <div class="product-card">
        <h3 class="py-3">  Starting ₹199 | Amazon Brands & more</h3>
       
        <div class="product-images">
           <div>
          <img src="{{ asset('product_img/p21.jpg') }}" alt="Image 1">
             <p>Starting ₹199 | Bedsheets</p>
          </div>
           <div>
          <img src="{{ asset('product_img/p22.jpg') }}" alt="Image 2">
             <p>Starting ₹199 | Curtains</p>
          </div>
           <div>
          <img src="{{ asset('product_img/p23.jpg') }}" alt="Image 3">
             <p>Minimum 40% off | Ironing board & more</p>
          </div>
           <div>
          <img src="{{ asset('product_img/p24.jpg') }}" alt="Image 4">
             <p>Up to 60% off | Home decor</p>
          </div>
        </div>
                <a href="{{ route('product8') }}" class="text-decoration-none">see more</a>

        <div class="product-title">Shoe Rack</div>
        <div class="product-tag">Min. 50% Off</div>
      </div>
    </div>
  </div>
</div>



{{-- second slider  --}}

<div class="container my-4 ">
          <a href="{{ route('product9') }}" class="text-decoration-none">-


  <h4 class="mb-3 text-dark">Up to 70% off | Kitchen essentials from Small Businesses</h4>
  <div class="slider-wrapper">
    <button class="slider-btn left" onclick="scrollDeals(-300)">‹</button>
    <div class="scroll-container" id="dealSlider">
      <!-- Deal Item 1 -->
      <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s1.jpg') }}" alt="iPad">
       
      </div>

      <!-- Deal Item 2 -->
      <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s2.jpg') }}" alt="Camera">
       
      </div>

      <!-- Deal Item 3 -->
      <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s3.jpg') }}" alt="Charger">
       
      </div>

      <!-- Deal Item 4 -->
      <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s4.jpg') }}" alt="Heels">
       
      </div>

      <!-- Deal Item 5 -->
      <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s5.jpg') }}" alt="Heels2">
       
      </div>

      <!-- Deal Item 6 -->
      <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s6.jpg') }}" alt="Cable">
   
      </div>
       <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s7.jpg') }}" alt="Cable">
       
      </div>
       <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s8.jpg') }}" alt="Cable">
        
      </div>
       <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s9.jpg') }}" alt="Cable">
        
      </div>
         <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s10.jpg') }}" alt="Cable">
       
      </div>
        <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s11.jpg') }}" alt="Cable">
       
      </div>
        <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s12.jpg') }}" alt="Cable">
        
      </div>
        <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s13.jpg') }}" alt="Cable">
 
      </div>
        <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s14.jpg') }}" alt="Cable">
      
      </div>
        <div class="deal-card">
        <img src="{{ asset('slick.slide.img/s15.jpg') }}" alt="Cable">
        
      </div>

    </div>
    <button class="slider-btn right" onclick="scrollDeals(300)">›</button>
  </div>
</a>
</div>

{{-- banner --}}

  <div class="container p-0 my-3">
    <div class="banner">
     
    </div>
  </div>



  {{-- products --}}
  <div class="container py-4">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

    <!-- Card 1 -->
    <div class="col">
      <div class="product-card">
        <h5>Starting ₹99 | Start your fitness journey</h5>
        <img src="{{ asset('product_img/p01.webp') }}" alt="Product" class="product-image my-4">

        <a href="{{ route('product10') }}" class="d-block mt-2 text-primary">See all offers</a>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col">
      <div class="product-card">
        <h5>Best Sellers in Beauty</h5>
        <div class="row g-2">
          <div class="col-6">
            <img src="{{ asset('product_img/p06.webp') }}" class="product-image">
          </div>
          <div class="col-6">
            <img src="{{ asset('product_img/p07.webp') }}" class="product-image">
          </div>
        </div>
         <div class="row g-2 my-2">
          <div class="col-6">
            <img src="{{ asset('product_img/p08.webp') }}" class="product-image">
          </div>
          <div class="col-6">
            <img src="{{ asset('product_img/p09.webp') }}" class="product-image">
          </div>
        </div>
          <a href="{{ route('product1') }}" class="text-decoration-none">See more</a>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col">
      <div class="product-card">
        <h5>Starting ₹199 | Top rated toys</h5>
        <img src="{{ asset('product_img/p02.webp') }}" class="product-image mb-2">
        <p class="mb-1">SHINETOY® 40 Pcs Wooden Russian Blocks Puzzles...</p>
        <div class="price">₹195.00 <span class="mrp">₹999.00</span></div>
        <div class="d-flex gap-2 mt-2">
          <img src="{{ asset('product_img/p03.webp') }}" class="thumbnail-img">
          <img src="{{ asset('product_img/p04.webp') }}" class="thumbnail-img">
          <img src="{{ asset('product_img/p05.webp') }}" class="thumbnail-img">
        </div>
       <a href="{{ route('product2') }}" class="text-decoration-none ">See more</a>

      </div>
    </div>

    <!-- Card 4 -->
    <div class="col">
      <div class="product-card">
        <h5>Furniture Steals | Up to 50% Off</h5>
        <p>KARP Kitchen 4 Tier Plastic Trolley Spice Organizer...</p>
         <img src="{{ asset('product_img/pp1.webp') }}" class="product-image mb-2">
        <div class="price">₹1,469.00 <span class="mrp">₹2,599.00</span></div>
        <div class="d-flex gap-2 mt-2">
          <img src="{{ asset('product_img/pp2.webp') }}" class="thumbnail-img">
          <img src="{{ asset('product_img/pp3.webp') }}" class="thumbnail-img">
          <img src="{{ asset('product_img/pp4.webp') }}" class="thumbnail-img">
        </div>
               <a href="{{ route('product11') }}" class="text-decoration-none ">See more</a>

      </div>
    </div>

  </div>
</div>
 




@endsection



{{-- @foreach($products as $product)
        <h4>{{ $product->name }}</h4>
        <p>₹{{ $product->price }}</p>
        <img src="{{ asset($product->gallery) }}" alt="{{ $product->name }}" width="150">
        <p>{{ $product->description }}</p>
    @endforeach --}}
