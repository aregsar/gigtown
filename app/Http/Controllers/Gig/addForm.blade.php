@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                  
                  <div class="panel-heading">
                      <div class="alert alert-success">
                        {{ session('status') }}
                      </div>
                  </div>

                 {{-- 
                    <div class="panel-heading">{{ $status }}</div>
                 --}}

                    <div class="panel-heading">Add a Gig</div>
                    <div class="panel-heading">All fields are required</div>

                    {{--

                    @if (count($errors->all()) > 0)
                            <div class="alert alert-danger" style="display:inline-block">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    <br />
                    <br />
                    --}}

                  
                    <form method="POST" action="{{route('gig.add')}}">
                        {{ csrf_field() }}

                        Artist, Place and Time:<br />
                        @if(config('app.client_validation'))            
                            <textarea name="desc" id="text" maxlength="100" rows="4" cols="20" autofocus required>{{ old('desc') }}</textarea>                   
                        @else           
                            <textarea name="desc" id="text" maxlength="100" rows="4" cols="20" autofocus>{{ old('desc') }}</textarea>                                 
                        @endif
                        <br />
                        @if (count($errors->get('desc')) > 0)
                            <div class="alert alert-danger" style="display:inline-block">
                                <ul>
                                    @foreach ($errors->get('desc') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                       <br />
                        Date: (non Chrome browsers type YYYY-MM-DD)<br />  
                        @if(config('app.client_validation'))         
                            <input type="date" name="date" value="{{ old('date') }}" placeholder="2017-07-24" required>
                        @else           
                            <input type="date" name="date" value="{{ old('date') }}" placeholder="2017-07-24">                       
                        @endif
                        <br />
                        @if (count($errors->get('date')) > 0)
                            <div class="alert alert-danger" style="display:inline-block">
                                <ul>
                                    @foreach ($errors->get('date') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <br /><button type="submit" >Add</button>
                    </form>
                

                     {{--
                    <form method="POST" action="{{$gig_add_url}}">
                        {{ csrf_field() }}
                        Artist, Place and Time:<br />
                        <textarea name="desc" id="text" maxlength="100" rows="4" cols="20" autofocus>{{ $oldDesc  }}</textarea>
                        @if (count($descErrors) > 0)
                            <div class="alert alert-danger" style="display:inline-block">
                                <ul>
                                    @foreach ($descErrors as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif 
                      
                        <br />
                        Date:<br />
                        <input type="date" name="date" value="{{ $oldDate }}">
                        @if (count($dateErrors) > 0)
                            <div class="alert alert-danger" style="display:inline-block">
                                <ul>
                                    @foreach ($dateErrors as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif 
                        
                        <br /><button type="submit" >Add</button>
                    </form>
                        --}}
                    
                </div>
            </div>
        </div>
    </div>
@endsection