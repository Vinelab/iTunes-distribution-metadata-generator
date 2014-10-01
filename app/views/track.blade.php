@extends('layouts.main')

@section('body')


    <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
          <div class="container">


            <form class="" role="form" method="post" action="{{route('generate')}}">

                <label>Track: </label>


                <!-- Track Duplicable Field -->
                <div class="multiple track-group">
                    <label>Tracks:</label>
                     <button type="button" class="btn btn-info btn-circle pull-right duplicable-btn" section="track">
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </div>
                <!--/ Track Duplicable Field -->

                <button type="submit" class="btn btn-lg btn-success pull-right">Download XML</button>

              </form>

          </div>
        </div>



@stop
