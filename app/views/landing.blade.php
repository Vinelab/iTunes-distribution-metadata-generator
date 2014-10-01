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


            <div class="form-group">
                <a href="{{route('select', array('album'))}}" class="btn btn-lg btn-select btn-primary">Add Tracks Album</a>
            </div>

            <div class="form-group">
                <a href="{{route('select', array('track'))}}" class="btn btn-lg btn-select btn-primary">Add Single Track</a>
            </div>


          </div>
        </div>

@stop
