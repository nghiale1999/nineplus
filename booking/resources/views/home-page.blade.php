<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/home-page.css')}}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="sidebar-container">
      <div class="sidebar-logo">
        <img class="logo" src="{{asset('img/logo.png')}}" alt="">
      </div>
      <ul class="sidebar-navigation">
        <li class="header"></i>FACILITIES</li>
        <li>
          <a href="#">
            <i class="fa fa-home" aria-hidden="true"></i> Meeting rooms
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Help guide
          </a>
        </li>
        <li class="header">COMMUNITY</li>
        <li>
          <a href="#">
            <i class="fa fa-users" aria-hidden="true"></i> Members
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-cog" aria-hidden="true"></i> Newsfeed
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-info-circle" aria-hidden="true"></i> Local area guide
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-info-circle" aria-hidden="true"></i> Benefits
          </a>
        </li>
      </ul>
    </div>
    
    <div class="content-container">
      <div class="row ml-5" id="mtr">
        <div >Meeting rooms</div>
      </div>

      <!-- Nav tabs -->
      <ul class=" ml-5 nav nav-tabs" id="navId">
        <li class="nav-item">
          <a href="#" class="nav-link disabled">Book</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link disabled">All rooms</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link disabled">Bookings</a>
        </li>
      </ul>
      <div class="row mt-5">
        <div class="col-sm-2"></div>
        <div class="col-sm-4 ">
          <div class="col-sm-8 search"> Mon,28 june 2022</div>
        </div>
        <div class="col-sm-4 ">
          <div class="col-sm-8 search"> 10:00 AM</div>
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="row ml-2 mt-3 room">
        
        
          <div class="col-sm-2"></div>
          <div class="col-sm-8 mt-3">
            <div class="row">
              <div class="col-sm-8">
                <div class="tr mb-2"> Meeting room 1</div>
                <img src="{{ asset('./img/screenshot_1.png') }}" alt="" style="width: 100%">
              </div>
              <div class="col-sm-4 gio">
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                
              </div>
            </div>
            
          </div>
          <div class="col-sm-2"></div>
        </div>
      <div class="row ml-2 mt-3 room">
        
        
          <div class="col-sm-2"></div>
          <div class="col-sm-8 mt-3">
            <div class="row">
              <div class="col-sm-8">
                <div class="tr mb-2"> Meeting room 2</div>
                <img src="{{ asset('./img/room_2.png') }}" alt="" style="width: 100%">
              </div>
              <div class="col-sm-4 gio">
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                <div class="giocon">10:00</div>
                
              </div>
            </div>
            
          </div>
          <div class="col-sm-2"></div>
        </div>
      
   
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>