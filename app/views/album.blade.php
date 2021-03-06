@extends('layouts.main')

@section('body')


    <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
          <div class="container">

            <form class="" role="form" method="post" action="{{route('generate')}}">

                <label>Album: </label>


                <!-- Hidden -->
                <div class="form-group hidden indent-0">
                  <input type="text"
                         required
                         class="form-control"
                         placeholder="Album Name"
                         name="[language]"
                         value="en"
                      >
                </div>
                <!-- Hidden -->



                <div class="form-group indent-0">
                  <input type="text"
                         required
                         class="form-control"
                         placeholder="Provider"
                         name="[provider]"
                         >
                </div>

                <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Vendor ID"
                         name="album[vendor_id]"
                         >
                </div>

               <div class="form-group indent-1">
                  <input type="text"
                         required
                         class="form-control"
                         placeholder="UPC (Universal Product Code)"
                         name="album[upc]"
                         >
                </div>

               <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Album GRID"
                         name="album[grid]"
                      >
                </div>

               <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Vendor Offer Code"
                         name="album[vendor_offer_code]"
                         >
                </div>

               <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Album Title"
                         name="album[title]"
                         >
                </div>

               <div class="form-group indent-1">
                  <input type="text"
                         required
                         class="form-control"
                         placeholder="Original Album Release Date (YYYY-MM-DD)"
                         name="album[original_release_date]"
                         >
                </div>

               <div class="form-group indent-1">
                  <input type="text"
                         required
                         class="form-control"
                         placeholder="Album Label Name"
                         name="album[label_name]"
                         >
                </div>

                 <!-- Genre Duplicable Field -->
                <div class="duplicable-wrapper">
                    <label>Album Genre:</label>
                    <div class="multiple genre-group"></div>
                    <button type="button" class="btn btn-primary duplicable-btn" section="genre">
                          Add Album Genre
                    </button>
                </div>
                <!--/ Genre Duplicable Field -->

              <div class="form-group indent-1 related-form-group">
                  <input type="text"
                         class="form-control"
                         placeholder="Album Copyright P-Line"
                         name="album[copyright_pline]"
                         >

                  <input type="text"
                         class="form-control"
                         placeholder="Album Copyright © Line"
                         name="album[copyright_cline]"
                         >
                </div>

              <div class="form-group indent-1 related-form-group">
                  <input type="text"
                         class="form-control"
                         placeholder="Album Artwork (File Name)"
                         name="album[artwork_files][file][file_name]"
                         >

                  <input type="text"
                         class="form-control"
                         placeholder="Album Artwork (File Size)"
                         name="album[artwork_files][file][size]"
                         >

                  <input type="text"
                         class="form-control"
                         placeholder="Album Artwork (Checksum)"
                         name="album[artwork_files][file][checksum]"
                      >
              </div>

              <div class="form-group indent-1">
                  <input type="text"
                         class="form-control"
                         placeholder="Album Track Count"
                         name="album[track_count]"
                      >
                </div>

                <!-- Product Duplicable Field -->
                <div class="duplicable-wrapper">
                    <label>Products:</label>
                    <div class="multiple product-group"></div>
                    <button type="button" class="btn btn-primary duplicable-btn" section="product">
                        Add Products
                    </button>
                </div>
                <!--/ Product Duplicable Field -->


                <!-- Artist Duplicable Field -->
                <div class="duplicable-wrapper">
                    <label>Artists:</label>
                    <div class="multiple artist-group"></div>
                    <button type="button" class="btn btn-primary duplicable-btn" section="artist">
                        Add Artists
                    </button>
                </div>
                <!--/ Artist Duplicable Field -->


                <!-- Track Duplicable Field -->
                <div class="duplicable-wrapper track-duplicable-wrapper">
                    <label>Tracks:</label>
                    <div class="multiple track-group"></div>
                    <button type="button" class="btn btn-primary duplicable-btn" section="track">
                        Add Tracks
                    </button>
                </div>
                <!--/ Track Duplicable Field -->

                <button type="submit" class="btn btn-lg btn-success pull-right">Download XML</button>

            </form>


          </div>
        </div>



@stop
