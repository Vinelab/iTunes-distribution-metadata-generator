@extends('layouts.main')

@section('body')


    <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
          <div class="container">


            <form class="" role="form" method="post" action="{{route('generate')}}">

                <label>Single Track: </label>

                <!-- Track Field -->
                <div class="multiple track-group">

                </div>
                <!--/ Track Field -->

                <button type="submit" class="btn btn-lg btn-success pull-right">Download XML</button>

              </form>


          </div>
        </div>


@stop
