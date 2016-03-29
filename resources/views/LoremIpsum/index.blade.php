@extends('layouts.master')

@section('title')
    Lorem Ipsum Generator
@stop

@section('content')

    <br><a href='/'>&larr; Home</a>

    <h1>Lorem Ipsum Generator</h1>

    <form method='POST' action='/lorem-ipsum'>

    	{{ csrf_field() }}

        <div class='form-group'>
           <label for='number_of_paragraphs'>How many paragraphs do you want?</label><br>
           <label for='number_of_paragraphs'>Number of paragraphs (Max: 99)</label>
           <input
               type='text'
               id='number_of_paragraphs'
               name='number_of_paragraphs'
               value='<?php if(isset($_POST['number_of_paragraphs'])) echo $_POST['number_of_paragraphs']; else echo old('number_of_paragraphs') ?>'
               maxlength='2'
           >
           {{ $errors->first('number_of_paragraphs') }}
        </div>

        <button type="submit" class="btn btn-primary">Generate text!</button>

        <br>

        <?php echo $paragraphs ?>

        {{-- <ul class='errors'>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> --}}

    </form>

@stop
