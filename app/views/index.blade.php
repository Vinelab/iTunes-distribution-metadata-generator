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

                <label>Album: </label>
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

                 <!-- Genre Duplicable Field -->


                <div class="multiple genre-group">
                     <button type="button" class="btn btn-info btn-circle pull-right duplicable-btn" section="genre">
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </div>
                <!--/ Genre Duplicable Field -->

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

              <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Album Artwork (File Name)"
                         name="package[album][artwork_files][file][file_name]"
                         value="cover.jpg XXX"
                      >

                  <input type="text"
                         class="form-control"
                         placeholder="Album Artwork (File Size)"
                         name="package[album][artwork_files][file][size]"
                         value="57591649 XXX"
                      >

                  <input type="text"
                         class="form-control"
                         placeholder="Album Artwork (Checksum)"
                         name="package[album][artwork_files][file][checksum]"
                         value="ffa9327b444559d4d72312b2c7d660ff XXX"
                      >
              </div>

              <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Album Track Count"
                         name="package[album][track_count]"
                         value="3"
                      >
                </div>

                <!-- Product Duplicable Field -->
                <div class="multiple product-group">
                    <button type="button" class="btn btn-info btn-circle pull-right duplicable-btn" section="product">
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </div>
                <!--/ Product Duplicable Field -->



                <!-- Artist Duplicable Field -->
                <div class="multiple artist-group" >
                    <button type="button" class="btn btn-info btn-circle pull-right duplicable-btn" section="artist">
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </div>
                <!--/ Artist Duplicable Field -->


                <!-- Track Duplicable Field -->

                <div class="multiple track-group">
                     <button type="button" class="btn btn-info btn-circle pull-right duplicable-btn" section="track">
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </div>

                <!--/ Track Duplicable Field -->


                <button type="submit" class="btn btn-lg btn-success pull-right">Generate</button>

            </form>


          </div>
        </div>



@stop
