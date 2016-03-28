@extends('layouts.master')

@section('title')
    Random User Generator
@stop

@section('content')
    
    <h1>Random User Generator</h1>

    <form method='POST' action='/random-user'>

    	{{ csrf_field() }}

        <div class='form-group'>
           <label for='number_of_users'>How many users do you want?</label><br>
           <label for='number_of_users'>Number of users (Max: 99)</label>
           <input
               type='text'
               id='number_of_users'
               name='number_of_users'
               value='<?php if(isset($_POST['number_of_users'])) echo $_POST['number_of_users']; else echo old('number_of_users') ?>'
               maxlength='2'
           >
           {{ $errors->first('number_of_users') }}

           <br>
           <br>
           <input
               type='checkbox'
               id='birthdate'
               name='birthdate'
               <?php if(isset($_POST['birthdate'])) echo 'checked'; ?>
           >
           <label for='birthdate'>Check if you want to add a birthdate</label>

           <br>
           <input
               type='checkbox'
               id='profile'
               name='profile'
               <?php if(isset($_POST['profile'])) echo 'checked'; ?>
           >
           <label for='profile'>Check if you want to add a profile</label>
         </div>

        <button type="submit" class="btn btn-primary">Generate users!</button>

        <br>

        <?php echo $users ?>
        
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
