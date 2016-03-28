@extends('layouts.master')

@section('title')
    Lorem Ipsum Generator
@stop

@section('content')
    
    <h1>Lorem Ipsum Generator</h1>

    <form method='POST' action='/lorem-ipsum'>

    	{{ csrf_field() }}

        <div class='form-group'>
           <label for='number_of_paragraphs'>How many paragraphs do you want?</label><br>
           <label for='number_of_paragraphs'>Number of paragraphs</label>
           <input
               type='text'
               id='number_of_paragraphs'
               name='number_of_paragraphs'
               value='{{ old('number_of_paragraphs') }}'
               maxlength='2'
           >(Max: 99)
           {{ $errors->first('number_of_paragraphs') }}
        </div>

        <button type="submit" class="btn btn-primary">Generate text!</button>

        <br><br>

        <?php echo $paragraphs ?>
        
        {{-- <ul class='errors'>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> --}}
        
        @if(count($errors) > 0)
            Please correct the errors above and try again.
        @endif
        
    </form>

@stop
