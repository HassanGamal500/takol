@extends('layouts.app')

@section('content')


    <!-- ***** Send The Order ***** -->
    
    <section class="clearfix section_padding_100 bg-white" style="height: 654px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2>Request The Order</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>
            <?php
                //$restid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
                //echo $restid;
                //echo $_SERVER['REQUEST_URI'];
                //echo $order;
            ?>

            <?php

            //$items = DB::select('select * from items where r_id = "' . $id . '"');

                use Illuminate\Support\Facades\Auth;
                $joins = DB::table('items')
                    ->join('item_has_size', 'item_has_size.item_id', 'items.id')
                    ->join('size', 'size.id', 'item_has_size.size_id')
                    ->select('item_has_size.*','items.*', 'size.*')
                    ->get();
                $user = Auth::user();
            if (isset($user)){


            ?>
            <div class="table">
                <div class="col-md-12">
                    <table border='2' style="margin: auto">
                        <tr>
                            <th>Item ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Price</th>
                            <td>Cart</td>
                        </tr>

                        @foreach($joins as $join)
                            <tr style="padding: 50px">
                                <td>{{ $join->id }}</td>
                                <td>{{ $join->i_name }}</td>
                                <td>{{ $join->i_description }}</td>
                                <td>{{ $join->s_name }}</td>
                                <td>{{ $join->itemPrice }}</td>
                                <td style="background-color: #50ff30; border-radius: 50%;text-align: center"> + </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>



            <?php } else { ?>

                <div class="row">
                    <div class="col-12">
                        <!-- Section Heading Area -->
                        <div class="section-heading text-center">
                            <h2>You Must Login To Order The Item --> <a href="{{ route('login') }}">Link</a></h2>

                        </div>
                    </div>
                </div>

            <?php } ?>


        </div>
    </section>
    
    <!-- ***** Send The Order ***** -->


@endsection
