@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                Gigs List

                </div>
                <ul>
                @foreach ($gigs as $gig)
                    <li>{{ $gig->desc }}{{ $gig->date }}</li>
                @endforeach
                </ul>
             </div>
        </div>
    </div>
@endsection