@extends('layouts.main')

@section('body')

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">iTunes distribution metadata generator</a>
            </div>
            <div class="navbar-collapse collapse">

            </div><!--/.navbar-collapse -->
          </div>
        </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
          <div class="container">

            <form class="" role="form" action="{{route('generate')}}">
 
                <!-- Hidden -->
                <div class="form-group hidden indent-0">
                  <input type="text"
                         required
                         class="form-control"
                         placeholder="Album Name"
                         name="package[language]"
                         value="en"
                      >
                </div>

                <div class="form-group indent-0">
                  <input type="text"
                         required
                         class="form-control"
                         placeholder="Provider"
                         name="package[provider]"
                         value="Mega Production XXX"
                      >
                </div>

                <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Vendor ID"
                         name="package[album][vendor_id]"
                         value="12345 XXX"
                      >
                </div>

               <div class="form-group indent-1">
                  <input type="text"
                         required
                         class="form-control"
                         placeholder="UPC (Universal Product Code)"
                         name="package[album][upc]"
                         value="5099749642829 XXX"
                      >
                </div>

               <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Album GRID"
                         name="package[album][grid]"
                         value="A10302B0000114391R XXX"
                      >
                </div>

               <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Vendor Offer Code"
                         name="package[album][vendor_offer_code]"
                         value="408CH98720X103 XXX"
                      >
                </div>

               <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Album Title"
                         name="package[album][title]"
                         value="Medulla (Remastered) XXX"
                      >
                </div>

               <div class="form-group indent-1">
                  <input type="text"
                         required
                         class="form-control"
                         placeholder="Original Album Release Date (YYYY-MM-DD)"
                         name="package[album][original_release_date]"
                         value="2014-07-07 XXX"
                      >
                </div>

               <div class="form-group indent-1">
                  <input type="text"
                         required
                         class="form-control"
                         placeholder="Album Label Name"
                         name="package[album][label_name]"
                         value="SUPER ALBUM XXX"
                      >
                </div>

               <div class="form-group indent-2">
                  <input type="text"
                         required
                         class="form-control"
                         placeholder="Album Genres"
                         name="package[album][genres][0]"
                         value="ALTERNATIVE-00 XXX"
                      >
                </div>

               <div class="form-group indent-2">
                  <input type="text"
                         required
                         class="form-control"
                         placeholder="Album Genres"
                         name="package[album][genres][1]"
                         value="WORLD-00 XXX"
                      >
                </div>

              <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Album Copyright P-Line"
                         name="package[album][copyright_pline]"
                         value="2014 Mega Production XXX"
                      >
                </div>

              <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Album Copyright © Line"
                         name="package[album][copyright_cline]"
                         value="2015 Gega Production XXX"
                      >
                </div>







                <button type="submit" class="btn btn-lg btn-success">Generate</button>

            </form>


          </div>
        </div>



@stop
