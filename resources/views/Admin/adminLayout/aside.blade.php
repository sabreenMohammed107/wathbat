<!-- Sidebar Navigation Left -->
<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn >
      <a class=" pl-0 ml-0 text-center" href="home.html"> <img src="{{ asset('adminasset/img/logo (1).jpeg')}}" alt="logo">
      </a>
    </div>
    <!-- main left  -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
      <!-- Home -->
      <li class="menu-item ">
        <a class="active" href="home.html">
          <span><i class="material-icons fs-16">home</i>Home </span>
        </a>
      </li>
      <!-- /Home -->
             <!-- Setup  -->
             <li class="menu-item">
              <a href="#" class="has-chevron" data-toggle="collapse" data-target="#create" aria-expanded="false"
                  aria-controls="tables">
                  <span><i class="material-icons fs-16">build</i>Setup</span>
              </a>
              <ul id="create" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">
                  <li> <a href="{{ route('home-slider.index') }}">Home slider</a> </li>
                  <li> <a href="{{ route('social-media.index') }}">Social Media</a> </li>
                  <li> <a href="{{ route('wathbat-number.index') }}">Wathbat in Numbers</a> </li>
                  <li> <a href="{{ route('portfolio.index') }}">Portfolio</a> </li>
                  <li> <a href="{{ route('wathbat_data.index') }}">Wathbat Data</a> </li>
                  <li> <a href="{{ route('quate-type.index') }}">Quotation Type</a> </li>
                  <li> <a href="{{ route('quate.index') }}">Quotation Data</a> </li>
        
                 
              </ul>
          </li>

          <!--  media center  -->
          <li class="menu-item">
              <a href="#" class="has-chevron" data-toggle="collapse" data-target="#contactsdropdown" aria-expanded="false" aria-controls="contactsdropdown">
              <span><i class="material-icons fs-16">build</i>Clients</span>
            </a>
              <ul id="contactsdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
                  <li> <a href="{{ route('contact_messege.index') }}">Contacts Messages</a> </li>
                  <li> <a href="{{ route('client.index') }}">Clients page</a> </li>
                  <li> <a href="{{ route('client-review.index') }}">Clients Reviews</a> </li>
               
              </ul>
            </li>
            <!-- end -->

             <!-- Chamber pages   -->
          <li class="menu-item">
              <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Usersdropdown" aria-expanded="false" aria-controls="contactsdropdown">
              <span><i class="material-icons fs-16">build</i>Projects</span>
            </a>
              <ul id="Usersdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
                  <li> <a href="{{ route('wathbat_project.index') }}">Wathbat Projects</a> </li>
                 
                  
                 
               
              </ul>
            </li>
            <!-- end -->
       
        
     
    </ul>
  </aside>