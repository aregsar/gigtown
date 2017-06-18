@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Gig Form</div>

                    @if (count($errors->all()) > 0)
                            <div class="alert alert-danger" style="display:inline-block">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif

                    <form method="POST" action="{{route('gig.add')}}">
                        {{ csrf_field() }}
                        <input type="text" name="desc" value="{{ old('desc') }}">
                        @if (count($errors->get('desc')) > 0)
                            <div class="alert alert-danger" style="display:inline-block">
                                <ul>
                                    @foreach ($errors->get('desc') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- @if (count($descErrors) > 0)
                            <div class="alert alert-danger" style="display:inline-block">
                                <ul>
                                    @foreach ($descErrors as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                     
                        <br /><input type="date" name="gigday" value="{{ old('gigday') }}">
                        @if (count($errors->get('gigday')) > 0)
                            <div class="alert alert-danger" style="display:inline-block">
                                <ul>
                                    @foreach ($errors->get('gigday') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- @if (count($gigdayErrors) > 0)
                            <div class="alert alert-danger" style="display:inline-block">
                                <ul>
                                    @foreach ($gigdayErrors as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                       

                        <br /><button type="submit" >Add</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection