@extends('layouts.app')

@section('content')
 
    <!-- ***** Send The Order ***** -->
    
    <section class="clearfix section_padding_100 bg-white" style="height: 654px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2>Choose The Name of Restaurant</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>
            <?php $results = DB::select('select * from restaurants'); ?>
            @foreach($results as $result)
                <div class="row">
                    <div class="col-md-4">
                        <img style="border-radius: 10px" width="250px" src="{{ $result->r_image }}">
                    </div>
                    <div class="col-md-4">
                        <h2>{{ $result->r_name }}</h2>
                        <hr>
                        <p>{{ $result->r_description }}</p>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 offset-md-8" style="margin-top: 80px">
                            <form method="post" action="/item">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $result->id }}">
                                <button type="submit" class="btn btn-outline-success">View Menu</button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </section>
    
    <!-- ***** Send The Order ***** -->


@endsection
