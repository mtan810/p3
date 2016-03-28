@extends('layouts.master')

@section('title')
    Developer's Best Friend
@stop

@section('content')

    <h1>Developer's Best Friend</h1>

    <h2>Lorem Ipsum Generator</h2>
    <blockquote>
        In publishing and graphic design, lorem ipsum (derived from Latin dolorem ipsum, translated as "pain itself") is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation.
        Replacing meaningful content with placeholder text allows viewers to focus on graphic aspects such as font, typography, and page layout without being distracted by the content.
        For more information, check the Wikipedia article <a href='https://en.wikipedia.org/wiki/Lorem_ipsum'>here</a>.
    </blockquote>

    <p>Create random filler text for your applications.</p>

    <a href='/lorem-ipsum'>Click here to generate text!</a>

    <br>

    <h2>Random User Generator</h2>

    <p>Create random user data for your applications. Like Lorem Ipsum, but for people.</p>

    <a href='/random-user'>Click here to generate users!</a>

@stop